(function($) {

	wp.customize('blogname', function(setting) {
		setting.bind(function(value) {
			$('.front_page.cover_block h1').text(value);
		});
	});
	wp.customize('blogdescription', function(setting) {
		setting.bind(function(value) {
			$('.evolutiondesuka--tagline').text(value);
		});
	});




   // 
   // cover block
   //
   wp.customize('te_cover_x_width', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 100) value =  100;
         $('.te-cover').css('width', value + '%');
      });
   });
   wp.customize('te_cover_y_margins',function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-cover').css({"margin-top":value + 'vh',"margin-bottom":value + 'vh'}); 
      });
   });


   // 
   // columns blocks
   //
   wp.customize('te_column_x_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-columns').css({"padding-left":value + '%',"padding-right":value + '%'}); 
      });
   });
   wp.customize('te_column_top_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-columns, .te-columns.has-background').css('padding-top', value + 'vh'); 
      });
   });
   wp.customize('te_column_bottom_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-columns, .te-columns.has-background').css('padding-bottom', value + 'vh');
      });
   });


   // 
   // text blocks
   //
   wp.customize('te_big_title_lead_x_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-big-title-lead').css({"padding-left":value + '%',"padding-right":value + '%'}); 
      });
   });
   wp.customize('te_big_title_lead_btwn_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-big-title-lead__title').css('padding-bottom', value + 'vh');
      });
   });
   wp.customize('te_big_title_lead_top_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-big-title-lead').css('padding-top', value + 'vh');
      });
   });
   wp.customize('te_big_title_lead_bottom_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-big-title-lead').css('padding-bottom', value + 'vh');
      });
   });
   
   wp.customize('te_big_title_lead_top_margin', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-big-title-lead').css('margin-top', value + 'vh');
      });
   });
   wp.customize('te_big_title_lead_bottom_margin', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-big-title-lead').css('margin-bottom', value + 'vh');
      });
   });




   // ----------------------------------------------------------------------------------------
   wp.customize('te_title_lead_x_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-title-lead').css({"padding-left":value + '%',"padding-right":value + '%'}); 
      });
   });
   wp.customize('te_title_lead_btwn_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-title-lead__title').css('padding-bottom', value + 'vh');
      });
   });
   wp.customize('te_title_lead_top_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-title-lead').css('padding-top', value + 'vh');
      });
   });
   wp.customize('te_title_lead_bottom_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-title-lead').css('padding-bottom', value + 'vh');
      });
   });
   
   wp.customize('te_title_lead_top_margin', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-title-lead').css('margin-top', value + 'vh');
      });
   });
   wp.customize('te_title_lead_bottom_margin', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-title-lead').css('margin-bottom', value + 'vh');
      });
   });
   wp.customize('te_text_x_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-text').css({"padding-left":value + '%',"padding-right":value + '%'}); 
      });
   });
   wp.customize('te_text_y_margins', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-text').css({"margin-top":value + 'vh',"margin-bottom":value + 'vh'}); 
      });
   });

   // te_text_text_align
   wp.customize('te_text_text_align', function(setting) {
      setting.bind( function(value) {
         $('.te-text').css({"text-align":value}); 
      });
   });


   // 
   // image block
   //
   wp.customize('te_image_x_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-image').css({"padding-left":value + '%',"padding-right":value + '%'}); 
      });
   });
   wp.customize('te_image_y_margins', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-image').css({"margin-top":value + 'vh',"margin-bottom":value + 'vh'}); 
      });
   });


   // 
   // gallery block
   //
     wp.customize('te_gallery_x_padding', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-gallery').css({"padding-left":value + '%',"padding-right":value + '%'}); 
      });
   });
   wp.customize('te_gallery_y_margins', function(setting) {
      setting.bind( function(value) {
         if(value < 0) value = 0;
         if(value > 25) value = 25;
         $('.te-gallery').css({"margin-top":value + 'vh',"margin-bottom":value + 'vh'}); 
      });
   });


   //
   // copyright notice
   //
   wp.customize('te_copyright',function(setting) {
      setting.bind( function(value) {
         $('.footer_copyright').text(value);
      });
   });

   
}) (jQuery);
