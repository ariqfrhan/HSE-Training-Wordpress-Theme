/* particlesJS.load(@dom-id, @path-json, @callback (optional)); */

// $(window).scroll(function (){
//     var wScroll = $(this).scrollTop();
//     // Navbar
//     if(wScroll > $('.about').offset().top -660){
//         $('nav').css({
//             backgroundColor: 'white',
//             boxShadow: '0px 1px 15px rgba(1,1,1,.5)'
//         });
//         $('nav a').css('color','#009FFD');
//     }else{
//         $('nav').css({
//             background: 'transparent',
//             boxShadow: 'none'
//         });
//         $('nav a').css('color','white');
//         $('nav a:hover').css('color', '#2A2A72');
//     }
// });

// jQuery(function($){
//     $(document).ready(function () {
//         AOS.init()
        
//         $('#call').floatingWhatsApp({
//             phone: '6285774001563',
//             popupMessage: 'Halo, apakah ada yang bisa kami bantu?',
//             showPopup: true
//         });
    
//         $("#jakarta").click(function () {
//             $("iframe").attr("src", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1881447815845!2d106.87171221458888!3d-6.238915795483878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f30dab49c015%3A0x349b0f46ead9c6e4!2sJl.%20Cipinang%20Cempedak%20IV%20No.3%2C%20RT.10%2FRW.3%2C%20Cipinang%20Cempedak%2C%20Kecamatan%20Jatinegara%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013340!5e0!3m2!1sid!2sid!4v1673434921372!5m2!1sid!2sid");
//         });
//         $("#bekasi").click(function () {
//             $("iframe").attr("src", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1075867594395!2d106.94972526968398!3d-6.249551881007297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698cfea5186627%3A0x2ca01b360f900d6!2sRuko%20Caman%20Baru%2C%20Jl.%20KH.%20Noer%20Ali%2C%20RT.001%2FRW.016%2C%20Jakasampurna%2C%20Kec.%20Bekasi%20Bar.%2C%20Kota%20Bks%2C%20Jawa%20Barat%2017145!5e0!3m2!1sid!2sid!4v1673805826237!5m2!1sid!2sid").show('slow');
//         });
//         $("#bandung").click(function () {
//             $("iframe").attr("src", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0504585556077!2d107.6149082!3d-6.8845595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6f8d74ef6ad%3A0x46d852cef3ff8bb5!2sJl.%20Tubagus%20Ismail%20No.2F%2C%20RW.01%2C%20Lebakgede%2C%20Kecamatan%20Coblong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040134!5e0!3m2!1sid!2sid!4v1673805407438!5m2!1sid!2sid");
//         });
    
//     $('#tableKemnaker').DataTable({
//             dom: 'Blfrtip',
//             rowReorder:true,
//             "pagingType" :"simple"
//         });
//         $('.dataTables_length').addClass('bs-select');
    
//     $('#tableBNSP').DataTable({
//             dom: 'Blfrtip',
//             rowReorder:true,
//             "pagingType" :"simple"
//         });
//         $('.dataTables_length').addClass('bs-select');
    
//     $("#tableBNSP").ready(function () {
//         $('#tableBNSP').parents('div.dataTables_wrapper').first().hide();
//         $('#tableBNSP').hide();
//     })
    
//         $("#bnsp").click(function () {
//             var table = document.getElementById("tableBNSP");
//             $('#tableKemnaker').parents('div.dataTables_wrapper').first().hide('slow');
//             $('#tableKemnaker').hide('slow');
//             $('#tableBNSP').parents('div.dataTables_wrapper').first().show('slow');
//             $('#tableBNSP').show('slow');
//             console.log(table);
//         })
//         $("#kemnaker").click(function () {
//             var table = document.getElementById("tableKemnaker");
//             $('#tableBNSP').parents('div.dataTables_wrapper').first().hide('slow');
//             $('#tableBNSP').hide('slow');
//             $('#tableKemnaker').parents('div.dataTables_wrapper').first().show('slow');
//             $('#tableKemnaker').show('slow');
//             console.log(table);
//         })
//     })
    
    
//     $('.page-scroll').click(function (event) {
//         var tujuan = $(this).attr('href');
//         var elemenTujuan = $(tujuan).offset().top;
    
//         $('body, html').animate({
//             scrollTop: elemenTujuan
//         }, 1250, 'swing');
    
//         event.preventDefault();
//     })
    
// });

// $(document).ready(function () {
//     AOS.init()
    
//     $('#call').floatingWhatsApp({
//         phone: '6285774001563',
//         popupMessage: 'Halo, apakah ada yang bisa kami bantu?',
//         showPopup: true
//     });

//     $("#jakarta").click(function () {
//         $("iframe").attr("src", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1881447815845!2d106.87171221458888!3d-6.238915795483878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f30dab49c015%3A0x349b0f46ead9c6e4!2sJl.%20Cipinang%20Cempedak%20IV%20No.3%2C%20RT.10%2FRW.3%2C%20Cipinang%20Cempedak%2C%20Kecamatan%20Jatinegara%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2013340!5e0!3m2!1sid!2sid!4v1673434921372!5m2!1sid!2sid")
//     });
//     $("#bekasi").click(function () {
//         $("iframe").attr("src", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1075867594395!2d106.94972526968398!3d-6.249551881007297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698cfea5186627%3A0x2ca01b360f900d6!2sRuko%20Caman%20Baru%2C%20Jl.%20KH.%20Noer%20Ali%2C%20RT.001%2FRW.016%2C%20Jakasampurna%2C%20Kec.%20Bekasi%20Bar.%2C%20Kota%20Bks%2C%20Jawa%20Barat%2017145!5e0!3m2!1sid!2sid!4v1673805826237!5m2!1sid!2sid");
//     });
//     $("#bandung").click(function () {
//         $("iframe").attr("src", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.0504585556077!2d107.6149082!3d-6.8845595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6f8d74ef6ad%3A0x46d852cef3ff8bb5!2sJl.%20Tubagus%20Ismail%20No.2F%2C%20RW.01%2C%20Lebakgede%2C%20Kecamatan%20Coblong%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040134!5e0!3m2!1sid!2sid!4v1673805407438!5m2!1sid!2sid");
//     });

// $('#tableKemnaker').DataTable({
//         dom: 'Blfrtip',
//         rowReorder:true,
//         "pagingType" :"simple"
//     });
//     $('.dataTables_length').addClass('bs-select');

// $('#tableBNSP').DataTable({
//         dom: 'Blfrtip',
//         rowReorder:true,
//         "pagingType" :"simple"
//     });
//     $('.dataTables_length').addClass('bs-select');

// $("#tableBNSP").ready(function () {
//     $('#tableBNSP').parents('div.dataTables_wrapper').first().hide();
//     $('#tableBNSP').hide();
// })

//     $("#bnsp").click(function () {
//         var table = document.getElementById("tableBNSP");
//         $('#tableKemnaker').parents('div.dataTables_wrapper').first().hide('slow');
//         $('#tableKemnaker').hide('slow');
//         $('#tableBNSP').parents('div.dataTables_wrapper').first().show('slow');
//         $('#tableBNSP').show('slow');
//         console.log(table);
//     })
//     $("#kemnaker").click(function () {
//         var table = document.getElementById("tableKemnaker");
//         $('#tableBNSP').parents('div.dataTables_wrapper').first().hide('slow');
//         $('#tableBNSP').hide('slow');
//         $('#tableKemnaker').parents('div.dataTables_wrapper').first().show('slow');
//         $('#tableKemnaker').show('slow');
//         console.log(table);
//     })
// })


// $('.page-scroll').click(function (event) {
//     var tujuan = $(this).attr('href');
//     var elemenTujuan = $(tujuan).offset().top;

//     $('body, html').animate({
//         scrollTop: elemenTujuan
//     }, 1250, 'swing');

//     event.preventDefault();
// })
