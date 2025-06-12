
		(function($){
			$.fn.scrollFixed = function(params){
			params = $.extend( {appearAfterDiv: 0, hideBeforeDiv: 0}, params);
			var element = $(this);

			if(params.appearAfterDiv)
				var distanceTop = element.offset().top + $(params.appearAfterDiv).outerHeight(true) + element.outerHeight(true);
			else
				var distanceTop = element.offset().top;

			if(params.hideBeforeDiv)
				var bottom = $(params.hideBeforeDiv).offset().top - element.outerHeight(true) - 10;
			else
				var bottom = 2000000000;				
			
				$(window).scroll(function(){	
					if( $(window).scrollTop() > distanceTop && $(window).scrollTop() < bottom ) 		
						element.css({'position':'fixed', 'top':'40px', 'left':'20px',});
					else
						element.css({'position':'absolute', 'top':'175px', 'left':'-70px', });				
				});			  
			};
		})(jQuery);
		
		function search(q) {
			var q;
			$("#mouse_music_search_value").val(q);
			$("form#mouse_music").submit();
		}
		function play(s1) {
			var s1;
			$('#player').css('display', 'block');
			$('#lean_overlay').css('display', 'block');
			
			$("#lean_overlay").fadeOut(200);
			
			$('#player').html('');
			$.ajax({
				type:'POST',
				url:'requests/mouse_play.php',
				data:'s1='+s1,
				success: function(rs) {
					$('#player').html(rs);
				}
			});
		}
		
		
		
function autoSubmit()
{
     var formObject = document.forms['LanguageSwitcher'];
     formObject.submit();
}