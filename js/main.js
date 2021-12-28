$(function(){
	var video = document.getElementById('bgVideo');
	var video_btn = document.getElementById('video-btn');
	var btn_status = 0;

	if(video == undefined || video_btn == undefined) {
		return;	
	}
	
	video_btn.addEventListener('click', function () {
		if(btn_status === 0) {
			video.play();
			btn_status = 1;
		}
	});
	
	var start = new Date();
	function d() {
		var end = new Date();
		var diff = end.getTime() - start.getTime();
		if(diff < 3000) {
			video.play();
			btn_status = 1;
		}
	}
	$(window).load(function(){
		d();
	});
});

(function($){
	$(window).load(function(){
		$(window).on("load scroll", function() {
			
			if ($(this).scrollTop() > 0) {
				$("header").addClass("not-top");
			} else {
				$("header").removeClass("not-top");
			}
		});

		$('#mnb > li').hover(function() {
			if($(this).hasClass('service')) {
				$('#header').addClass('not-top-simple');
			}
		}, function() {
			$('#header').removeClass('not-top-simple');
		});
	});
})(jQuery);

// main video
(function($){
	$(document).ready(function () {
		if($('#bgVideo').length <= 0) {
			return;
		}

		$(window).resize(function() {
			var w_height = $(window).height();
	    
		    if($(window).width() <= 767) {
		    	w_height = w_height * 0.66;
		    }

		    $('#top #spot .inner_static').css('height', w_height+'px');
		    $('#mv video').css('min-height', w_height+'px');
		});
		$(window).resize();

		$('.btn_scroll').click(function(e) {
	    	e.preventDefault();

	    	$('html,body').animate({scrollTop: w_height - 200}, 400, 'easeInOutQuart');
	    });
	});
})(jQuery);
