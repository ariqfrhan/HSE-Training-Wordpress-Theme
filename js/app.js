// // $(window).scroll(function (){
// //     var wScroll = $(this).scrollTop();
// //     // Navbar
// //     if(wScroll > $('.about').offset().top -660){
// //         $('nav').css({
// //             backgroundColor: 'white',
// //             boxShadow: '0px 1px 15px rgba(1,1,1,.5)'
// //         });
// //         $('nav a').css('color','#009FFD');
// //     }else{
// //         $('nav').css({
// //             background: 'transparent',
// //             boxShadow: 'none'
// //         });
// //         $('nav a').css('color','white');
// //         $('nav a:hover').css('color', '#2A2A72');
// //     }
// // });

// const container = document.querySelector('.gallery');
// const jumbo = document.querySelector('.jumbo');
// const thumbs = document.querySelectorAll('.thumb');

// container.addEventListener('click', function(e){
//     if (e.target.className=='thumb') {
//         // Mengganti Gambar
//         jumbo.src = e.target.src;

//         //Efek FadeOut
//         jumbo.classList.add('fade');
//         setTimeout(function(){
//             jumbo.classList.remove('fade');
//         }, 500);

//         //Efek Aktif
//         thumbs.forEach(function(thumb){
//             thumb.classList.remove('active');
//         })
//         e.target.classList.add('active');
//     };
// });

// $('.page-scroll').click(function (event) {
//     var tujuan = $(this).attr('href');
//     var elemenTujuan = $(tujuan).offset().top;

//     $('body, html').animate({
//         scrollTop: elemenTujuan
//     }, 1250, 'swing');

//     event.preventDefault();
// })

// /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
// particlesJS.load('particles-js', './assets/js/particles.json', function() {
//     console.log('callback - particles.js config loaded');
// });