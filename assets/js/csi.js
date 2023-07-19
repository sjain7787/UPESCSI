/*!
=========================================================

* Copyright: 2022 UPESCSI (https://upescsi.in)
* Coded by Somya Jain And Harsh

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

// smooth scroll
// smooth scroll
$("#navbarSupportedContent").on('show.bs.collapse', function() {
    $('a.nav-link').click(function() {
        $("#navbarSupportedContent").collapse('hide');
    });
});

// portfolio carousel
$('#owl-portfolio').owlCarousel({
    margin:30,
    dots: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:false,
            loop:false
        }
    }
});

// testmonial carousel
$('#owl-testmonial').owlCarousel({
    center: true,
    items:1,
    loop:true,
    nav: true,
    dots: false
})



