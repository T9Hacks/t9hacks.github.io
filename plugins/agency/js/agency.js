/*!
 * Modified from: 
 * Start Bootstrap - Agency Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
	var navHeight = $("#navigation").innerHeight();
	
    $('a.pageScroll').bind('click', function(event) {
    	event.preventDefault();
    	
    	// offset by height 
        var $anchor = $(this);
		var pageOffset = $($anchor.attr('href')).offset().top;
        if(! $anchor.hasClass("navigationBrand")) { pageOffset -= navHeight; }
		
        // scroll to that point in the page
        $('html, body').stop().animate({
            scrollTop: pageOffset
        }, 1500, 'easeInOutExpo');
        
    });
});

// Highlight the top nav as scrolling occurs
/*$('body').scrollspy({
    target: '#navigation'
});*/

// Closes the Responsive Menu on Menu Item Click
$('.navigation-links ul li a').click(function() {
    $('.navigation-toggle:visible').click();
});