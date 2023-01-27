// dropdown menu
$(document).ready(function () {	

$('ul.dropdown ul').css('display', 'none');

	$('ul.dropdown li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(125);
		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(250);			
		}
	);
	
});

		
// jCarousel
$(document).ready(function(){
    $(".carousel").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
		visible: 6,
		scroll: 2
    });
});


// Image Magnifying Glass / Image Hovers
$(document).ready(function(){
//<![CDATA[
$(".mag a").append("<span></span>");
//]]>
$(".mag img, a.more-link").hover(function(){
$(this).fadeTo(150, 0.65); // This should set the opacity to 100% on hover
},function(){
$(this).fadeTo(150, 1.0); // This should set the opacity back to 60% on mouseout
});

$(".mag_blog img").hover(function(){
$(this).fadeTo(250, 0.90); // This should set the opacity to 100% on hover
},function(){
$(this).fadeTo(150, 1.0); // This should set the opacity back to 60% on mouseout
});

$(".thumblist li img, .fade, .button_header").hover(function(){
$(this).fadeTo(150, 0.70); // This should set the opacity to 100% on hover
},function(){
$(this).fadeTo(150, 1.0); // This should set the opacity back to 60% on mouseout
});

$("div.carousel li").hover(function(){
$(this).fadeTo(150, 0.80); // This should set the opacity to 100% on hover
},function(){
$(this).fadeTo(150, 1.0); // This should set the opacity back to 60% on mouseout
});

$("div.wp-pagenavi a").hover(function(){
$(this).fadeTo(150, 0.50); // This should set the opacity to 100% on hover
},function(){
$(this).fadeTo(150, 1.0); // This should set the opacity back to 60% on mouseout
});

});


// prettyphoto
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});