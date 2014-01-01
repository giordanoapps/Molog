function Template(){
	this.settings;
};

Template.prototype = {
	
	start : function()
	{
		this.scrollEvent();
		this.settings();

		$('.message').delay(2000).slideUp(1000);

		this.post();
		this.userSettings();
	},

	userSettings : function()
	{
		if($.cookie('molog-settings') == undefined)
		{
			$.cookie('molog-settings', JSON.stringify(settings));
		}
		else
		{
			this.settings = JSON.parse($.cookie('molog-settings'));
		}
	},

	post : function()
	{
		var $from	  = $('#post-preview');
		var $target = $('textarea[name="text"]');

		$('#post-area').on('keyup', function()
		{
			$target.html($from.html());

			console.log($from.html());
		});
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
			$('p').css({'font-family' : $(this).val()+', sans-serif' });
		});

		$('input[name="font_weight"]').on('change', function()
		{
			$('p').css({'font-weight' : $(this).val() });
		});

		$('input[name="font_color"]').on('change', function()
		{
			$('p').css({'color' : 'rgba(0,0,0,'+$(this).val()+')' });
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