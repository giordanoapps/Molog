function Template(){

};

Template.prototype = {
	
	start : function()
	{
		console.log('Hello World!');

		this.scrollEvent();
		this.settings();
	},

	scrollEvent : function()
	{
		var $progress = $('.progress');
		var $menu = $('.bt-menu-trigger span, .bt-menu-trigger span:before, .bt-menu-trigger span:after');

		$(window).on('scroll', function()
		{
			var scrollTop 		= $(window).scrollTop(),
					elementOffset = $('header').height(),
					distance      = (elementOffset - scrollTop);

			if(distance <= 0)
			{
				$progress.removeClass('opaque');
			}
			else
			{
				$progress.addClass('opaque');
			}

			var scrollTop 		= $(window).scrollTop(),
					elementHeight = $('section').height(),
					elementOffset = $('section').offset().top,
					percentage    = (scrollTop-elementOffset+$(window).height())*100/(elementHeight);
			
			console.log(percentage);
			$progress.css({'width':percentage+'%'});
		});
	},

	settings : function()
	{
		$('#active-settings').on('click', function()
		{
			$('#profile').slideUp();
			$('#settings').slideDown();
		});

		$('select[name="font_face"]').on('change', function()
		{
			var font = $(this).val();

			$('p').attr('class',font);
		});

		$('input[name="font_weight"]').on('change', function()
		{
			$('p').css({'font-weight' : $(this).val() });
		});

		$('input[name="font_size"]').on('change', function()
		{
			$('p').css({'font-size' : $(this).val()+'em' });
		});

		$('select[name="text_align"]').on('change', function()
		{
			$('p').css({'text-align' : $(this).val() });
		});
	}

};