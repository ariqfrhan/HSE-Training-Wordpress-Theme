<?php
/**
 * Theme setup and small native content system for HSE Training Indonesia.
 */

if (!defined('ABSPATH')) {
    exit;
}

function hse_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'hse-training'),
        'footer'  => __('Footer Navigation', 'hse-training'),
    ));
}
add_action('after_setup_theme', 'hse_theme_setup');

function hse_enqueue_assets() {
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('hse-bootstrap', get_theme_file_uri('/bootstrap/css/bootstrap.min.css'), array(), '5.3.0');
    wp_enqueue_style('hse-theme', get_stylesheet_uri(), array('hse-bootstrap'), $version);
    wp_enqueue_script('hse-bootstrap', get_theme_file_uri('/bootstrap/js/bootstrap.bundle.min.js'), array(), '5.3.0', true);
    wp_enqueue_script('hse-main', get_theme_file_uri('/js/main.js'), array(), $version, true);
}
add_action('wp_enqueue_scripts', 'hse_enqueue_assets');

function hse_register_content_types() {
    register_post_type('hse_training', array(
        'labels' => array(
            'name'               => __('Jadwal Training', 'hse-training'),
            'singular_name'      => __('Training', 'hse-training'),
            'add_new'            => __('Tambah Jadwal', 'hse-training'),
            'add_new_item'       => __('Tambah Jadwal Training', 'hse-training'),
            'edit_item'          => __('Edit Jadwal Training', 'hse-training'),
            'new_item'           => __('Jadwal Baru', 'hse-training'),
            'view_item'          => __('Lihat Training', 'hse-training'),
            'search_items'       => __('Cari Training', 'hse-training'),
            'not_found'          => __('Belum ada jadwal training.', 'hse-training'),
            'menu_name'          => __('Jadwal Training', 'hse-training'),
        ),
        'public'       => true,
        'show_in_rest' => true,
        'menu_icon'    => 'dashicons-welcome-learn-more',
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'training'),
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'taxonomies'   => array('category'),
    ));

    register_post_type('hse_registration', array(
        'labels' => array(
            'name'          => __('Pendaftaran', 'hse-training'),
            'singular_name' => __('Pendaftaran', 'hse-training'),
            'menu_name'     => __('Pendaftaran', 'hse-training'),
        ),
        'public'       => false,
        'show_ui'      => true,
        'show_in_rest' => false,
        'menu_icon'    => 'dashicons-forms',
        'supports'     => array('title'),
        'capabilities' => array('create_posts' => 'do_not_allow'),
        'map_meta_cap' => true,
    ));
}
add_action('init', 'hse_register_content_types');

function hse_flush_rewrites_on_theme_switch() {
    hse_register_content_types();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'hse_flush_rewrites_on_theme_switch');

function hse_blog_url() {
    $posts_page = absint(get_option('page_for_posts'));
    return $posts_page ? get_permalink($posts_page) : home_url('/?post_type=post');
}

function hse_training_meta_box() {
    add_meta_box('hse-training-details', __('Detail Jadwal', 'hse-training'), 'hse_training_meta_box_render', 'hse_training', 'normal', 'high');
}
add_action('add_meta_boxes', 'hse_training_meta_box');

function hse_training_meta_box_render($post) {
    wp_nonce_field('hse_save_training', 'hse_training_nonce');
    $fields = array(
        '_hse_certification' => array('label' => 'Sertifikasi', 'type' => 'select', 'options' => array('BNSP', 'KEMNAKER', 'Non-Sertifikasi')),
        '_hse_start_date'    => array('label' => 'Tanggal Mulai', 'type' => 'date'),
        '_hse_end_date'      => array('label' => 'Tanggal Selesai', 'type' => 'date'),
        '_hse_location'      => array('label' => 'Lokasi / Media', 'type' => 'text'),
        '_hse_duration'      => array('label' => 'Durasi', 'type' => 'text'),
        '_hse_price'         => array('label' => 'Harga', 'type' => 'number'),
        '_hse_status'        => array('label' => 'Status', 'type' => 'select', 'options' => array('Pendaftaran Dibuka', 'Segera Hadir', 'Kuota Penuh')),
    );

    echo '<div class="hse-admin-fields">';
    foreach ($fields as $key => $field) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<p><label for="' . esc_attr($key) . '"><strong>' . esc_html($field['label']) . '</strong></label><br>';
        if ($field['type'] === 'select') {
            echo '<select id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" class="widefat">';
            foreach ($field['options'] as $option) {
                echo '<option value="' . esc_attr($option) . '" ' . selected($value, $option, false) . '>' . esc_html($option) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<input class="widefat" type="' . esc_attr($field['type']) . '" id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" value="' . esc_attr($value) . '">';
        }
        echo '</p>';
    }
    echo '</div>';
}

function hse_save_training_meta($post_id) {
    if (!isset($_POST['hse_training_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hse_training_nonce'])), 'hse_save_training')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $text_fields = array('_hse_certification', '_hse_start_date', '_hse_end_date', '_hse_location', '_hse_duration', '_hse_status');
    foreach ($text_fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field(wp_unslash($_POST[$field])));
        }
    }
    if (isset($_POST['_hse_price'])) {
        update_post_meta($post_id, '_hse_price', absint($_POST['_hse_price']));
    }
}
add_action('save_post_hse_training', 'hse_save_training_meta');

function hse_training_columns($columns) {
    return array(
        'cb'            => $columns['cb'],
        'title'         => __('Program', 'hse-training'),
        'certification' => __('Sertifikasi', 'hse-training'),
        'training_date' => __('Tanggal', 'hse-training'),
        'location'      => __('Lokasi', 'hse-training'),
        'status'        => __('Status', 'hse-training'),
        'date'          => $columns['date'],
    );
}
add_filter('manage_hse_training_posts_columns', 'hse_training_columns');

function hse_training_column_content($column, $post_id) {
    $map = array(
        'certification' => '_hse_certification',
        'training_date' => '_hse_start_date',
        'location'      => '_hse_location',
        'status'        => '_hse_status',
    );
    if (isset($map[$column])) {
        echo esc_html(get_post_meta($post_id, $map[$column], true));
    }
}
add_action('manage_hse_training_posts_custom_column', 'hse_training_column_content', 10, 2);

function hse_registration_columns($columns) {
    return array(
        'cb'           => $columns['cb'],
        'title'        => __('Pendaftar dan Program', 'hse-training'),
        'email'        => __('Email', 'hse-training'),
        'phone'        => __('WhatsApp', 'hse-training'),
        'participants' => __('Peserta', 'hse-training'),
        'date'         => $columns['date'],
    );
}
add_filter('manage_hse_registration_posts_columns', 'hse_registration_columns');

function hse_registration_column_content($column, $post_id) {
    $map = array(
        'email'        => '_hse_email',
        'phone'        => '_hse_phone',
        'participants' => '_hse_participants',
    );
    if (isset($map[$column])) {
        echo esc_html(get_post_meta($post_id, $map[$column], true));
    }
}
add_action('manage_hse_registration_posts_custom_column', 'hse_registration_column_content', 10, 2);

function hse_registration_meta_box() {
    add_meta_box('hse-registration-details', __('Detail Pendaftaran', 'hse-training'), 'hse_registration_meta_box_render', 'hse_registration', 'normal', 'high');
}
add_action('add_meta_boxes_hse_registration', 'hse_registration_meta_box');

function hse_registration_meta_box_render($post) {
    $training_id = absint(get_post_meta($post->ID, '_hse_training_id', true));
    $details = array(
        'Program'        => $training_id ? get_the_title($training_id) : '',
        'Nama'           => get_post_meta($post->ID, '_hse_name', true),
        'Email'          => get_post_meta($post->ID, '_hse_email', true),
        'WhatsApp'       => get_post_meta($post->ID, '_hse_phone', true),
        'Perusahaan'     => get_post_meta($post->ID, '_hse_company', true),
        'Jumlah peserta' => get_post_meta($post->ID, '_hse_participants', true),
    );
    echo '<table class="widefat striped"><tbody>';
    foreach ($details as $label => $value) {
        echo '<tr><th style="width:160px">' . esc_html($label) . '</th><td>' . esc_html($value) . '</td></tr>';
    }
    echo '</tbody></table>';
}

function hse_format_training_date($post_id) {
    $start = get_post_meta($post_id, '_hse_start_date', true);
    $end   = get_post_meta($post_id, '_hse_end_date', true);
    if (!$start) {
        return __('Jadwal menyusul', 'hse-training');
    }
    $start_text = wp_date('j F Y', strtotime($start));
    if ($end && $end !== $start) {
        return $start_text . ' - ' . wp_date('j F Y', strtotime($end));
    }
    return $start_text;
}

function hse_price_text($post_id) {
    $price = absint(get_post_meta($post_id, '_hse_price', true));
    return $price ? 'Rp ' . number_format_i18n($price, 0) : __('Hubungi kami', 'hse-training');
}

function hse_whatsapp_url($message) {
    return 'https://wa.me/6285774001563?text=' . rawurlencode($message);
}

function hse_handle_registration() {
    $redirect = wp_get_referer() ? wp_get_referer() : home_url('/');
    if (!isset($_POST['hse_registration_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['hse_registration_nonce'])), 'hse_registration')) {
        wp_safe_redirect(add_query_arg('registration', 'invalid', $redirect));
        exit;
    }
    if (!empty($_POST['company_site'])) {
        wp_safe_redirect(add_query_arg('registration', 'success', $redirect));
        exit;
    }

    $training_id = isset($_POST['training_id']) ? absint($_POST['training_id']) : 0;
    $name        = isset($_POST['full_name']) ? sanitize_text_field(wp_unslash($_POST['full_name'])) : '';
    $email       = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone       = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $company     = isset($_POST['company']) ? sanitize_text_field(wp_unslash($_POST['company'])) : '';
    $participants = isset($_POST['participants']) ? max(1, absint($_POST['participants'])) : 1;

    if (get_post_type($training_id) !== 'hse_training' || get_post_status($training_id) !== 'publish' || !$name || !is_email($email) || strlen($phone) < 8) {
        wp_safe_redirect(add_query_arg('registration', 'invalid', $redirect));
        exit;
    }

    $registration_id = wp_insert_post(array(
        'post_type'   => 'hse_registration',
        'post_status' => 'private',
        'post_title'  => $name . ' - ' . get_the_title($training_id),
        'meta_input'  => array(
            '_hse_training_id' => $training_id,
            '_hse_name'        => $name,
            '_hse_email'       => $email,
            '_hse_phone'       => $phone,
            '_hse_company'     => $company,
            '_hse_participants'=> $participants,
        ),
    ), true);

    if (is_wp_error($registration_id)) {
        wp_safe_redirect(add_query_arg('registration', 'error', $redirect));
        exit;
    }

    $subject = 'Pendaftaran training: ' . get_the_title($training_id);
    $message = "Nama: {$name}\nEmail: {$email}\nTelepon: {$phone}\nPerusahaan: {$company}\nJumlah peserta: {$participants}\nProgram: " . get_the_title($training_id);
    wp_mail(get_option('admin_email'), $subject, $message, array('Reply-To: ' . $name . ' <' . $email . '>'));

    wp_safe_redirect(add_query_arg('registration', 'success', get_permalink($training_id)) . '#registration');
    exit;
}
add_action('admin_post_nopriv_hse_register', 'hse_handle_registration');
add_action('admin_post_hse_register', 'hse_handle_registration');

function hse_filter_training_archive($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('hse_training')) {
        $query->set('meta_key', '_hse_start_date');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'hse_filter_training_archive');

function hse_document_title_parts($parts) {
    if (is_front_page()) {
        $parts['title'] = 'Pelatihan dan Sertifikasi K3 BNSP';
        $parts['tagline'] = 'HSE Training Indonesia';
    }
    return $parts;
}
add_filter('document_title_parts', 'hse_document_title_parts');

function hse_front_page_seo_title($title) {
    if (is_front_page()) {
        return 'Pelatihan dan Sertifikasi K3 BNSP | HSE Training Indonesia';
    }
    return $title;
}
add_filter('wpseo_title', 'hse_front_page_seo_title');

function hse_front_page_seo_description($description) {
    if (is_front_page()) {
        return 'Pelatihan dan sertifikasi K3 BNSP untuk individu dan perusahaan. Public training, in-house training, dan konsultasi K3 oleh PT Triyasa Mitra Solusi.';
    }
    return $description;
}
add_filter('wpseo_metadesc', 'hse_front_page_seo_description');
add_filter('wpseo_opengraph_desc', 'hse_front_page_seo_description');
