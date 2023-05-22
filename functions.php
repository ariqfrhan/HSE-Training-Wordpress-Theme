<?php
 add_theme_support('menus');
 add_theme_support('post-thumbnails');
function hse_style(){
    wp_enqueue_style('bootstrap', get_theme_file_uri('/bootstrap/css/bootstrap.css'));
    wp_enqueue_style('style', get_theme_file_uri('/bootstrap/style-hp.css'));
    wp_enqueue_style('single', get_theme_file_uri('/bootstrap/style-single.css'));
    wp_enqueue_style('float', get_theme_file_uri('/bootstrap/floating-wpp.min.css'));
    wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    // wp_enqueue_style('dataTables-style', 'https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js',array(),'all');

    // Script
    // wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), false);
    // wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), array(), false);
    // wp_enqueue_script('datatables', 'https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js', array('jquery'), '1.10.24', false);
    // wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), false);
    // wp_enqueue_script('float', get_theme_file_uri('/js/floating-wpp.min.js'), array(), false);
    // wp_enqueue_script('pjs', get_theme_file_uri('/js/particles.json'));
    // wp_enqueue_script('particles', 'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js',array(),false);


    wp_enqueue_script('app', get_theme_file_uri('/js/app.js'), array(), false);
    
}
add_action('wp_enqueue_scripts', 'hse_style');

// <script src="./js/script.js" type="text/javascript"></script>
//     <script src="./js/particles.js" type="text/javascript"></script>
//     <script src="./js/app.js" type="text/javascript"></script>
//     <script
//       src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
//       integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
//       crossorigin="anonymous"
//     ></script>
//     <script
//       type="text/javascript"
//       src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"
//     ></script>
//     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

// <link href="./bootstrap/css/bootstrap.css" rel="stylesheet" />
//     <link rel="stylesheet" href="./bootstrap/floating-wpp.min.css">
//     <link
//       rel="stylesheet"
//       href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
//     />
//     <link
//       rel="stylesheet"
//       href="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"
//     />
//     <link
//       href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
//       rel="stylesheet"
//     />
//     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
//     <link rel="stylesheet" href="./style.css" />
//     <script
//       type="text/javascript"
//       src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
//     ></script>
//     <script
//       type="text/javascript"
//       src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"
//     ></script>
//     <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
//     <script type="text/javascript" src="./js/floating-wpp.min.js"></script>
//     <!-- Google tag (gtag.js) -->
//     <script async src="https://www.googletagmanager.com/gtag/js?id=G-P1C1L0ZS5J"></script>
//     <script>
//       window.dataLayer = window.dataLayer || [];
//       function gtag(){dataLayer.push(arguments);}
//       gtag('js', new Date());

//       gtag('config', 'G-P1C1L0ZS5J');
//     </script>