var width = jQuery(window).width();
jQuery(document).ready(function() {
    // menu primary dropdown
    jQuery('.navbar-nav > li.dropdown a,.caret.sparkling-dropdown').click(function(){
        jQuery(this).parent().siblings('li').removeClass('open');
    })
    // menu search
    jQuery(".search-header a").click(function() {
      jQuery('#searchform-header-replace').addClass("show");
    });
  
    jQuery("#searchform-header-replace-close").click(function() {
      jQuery('#searchform-header-replace').removeClass("show");
    });

    // home page banner slider
    jQuery('.banner-slider').slick({
      dots: true,
      arrows: false,
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      rows: 0,
      rtl: rtl_slick(),
      fade: true,
      cssEase: 'linear',
      draggable: true,
    });
    

    // home page news slider
    jQuery('.news-slider').slick({
      dots: true,
      arrows: false,
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      rows: 0,
      rtl: rtl_slick()
    });

    // home page testimonials slider
    jQuery('.testimonial-slider').slick({
      dots: false,
      arrows: true,
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      cssEase: 'linear',
      rows: 0,
      adaptiveHeight: true,
      rtl: rtl_slick()
    });
    // grid masonry
    jQuery('.grid .vc_single_image-wrapper').each(function () {
      var src = jQuery(this).attr("href");  
      var img_height = jQuery(this).children('img').attr("height");  
      jQuery(this).append('<div class="img-box"></div>');
      jQuery(this).children('.img-box').css({
        'background-image': 'url(' + src + ')',
        'minHeight': img_height + 'px'
      });
      var alt_text = jQuery(this).children('img').attr("alt");  
      jQuery(this).append('<div class="overlay">' + alt_text + '</div>');
      jQuery(this).children('img').hide();
    })
    //colleges cat
    // coll_cat();
    // jQuery(window).on('resize',function(){
    //   coll_cat();
    // })

    //Get Faculty profile
    jQuery('body').on('click', '.get-faculty', function(e){
        var post_id = jQuery(this).attr('id');
        var appDiv = jQuery(this).attr('data-id');
        var pappDiv = jQuery(this).attr('data-pid');
        var mappDiv = jQuery(this).attr('data-mid');
        jQuery.ajax({
            url : ajax_object.ajax_url,
            type : 'POST',
            data : { action : 'faculty_data', 'post_id' : post_id },
            context:this,
            success : function(data){
                jQuery('.get-faculty').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('.item-content').hide();
                var screen_width = jQuery(window).width();
                if(screen_width <= 767){
                    jQuery('.mob.item-content.content-' + mappDiv).html(data).show();
                    jQuery('html, body').animate({scrollTop: jQuery('.mob.item-content.content-' + mappDiv).offset().top});
                  // jQuery('.mob.item-content.content-' + mappDiv).html(data).slideDown(1000, function(){
                  // });
                  
                }else if(screen_width >= 768 && screen_width <= 1199){
                  jQuery('.pad.item-content.content-' + pappDiv).html(data).show();
                  jQuery('html, body').animate({scrollTop: jQuery('.pad.item-content.content-' + pappDiv).offset().top});
                }else{
                  jQuery('.lap.item-content.content-' + appDiv).html(data).show();
                  jQuery('html, body').animate({scrollTop: jQuery('.lap.item-content.content-' + appDiv).offset().top});
                }
            }
        });
    });

    jQuery('body').on('click', '.close-desc', function(){
      jQuery('.item-content').attr('style', 'display : none !important');
      jQuery('.get-faculty').removeClass('active');
    });

    // colleges banner tab
    var maxHeight = -1;
    jQuery('.banner-tabs li .tab h5').each(function() {
          maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
      });
    jQuery('.banner-tabs li .tab h5').each(function() {
        jQuery(this).height(maxHeight);
    });
    
    //tablepress
    jQuery('.tablepress').wrap('<div class="responsive-tablepress"></div>')

    // tab to accordion
    jQuery('.nav.nav-tabs.inner-tab').tabCollapse({
      accordionClass: 'inner-tab visible-xs'
    });
    // jQuery('.nav-tabs a').on('shown.bs.tab', function(event){
    //   jQuery('.nav.nav-tabs.inner-tab').tabCollapse({
    //     accordionClass: 'inner-tab visible-xs'
    //   });
    // }); 
   
   
    setTimeout(() => {
      jQuery('.panel-group .panel-collapse.in').prev().addClass('active');
    }, 700);
			
    jQuery(document).on("shown.bs.collapse", ".panel-collapse", function (e) {
      jQuery(this).siblings('.panel-heading').addClass('active');
      jQuery('html, body').animate({scrollTop: jQuery(e.target).offset().top}, 1000);
    });
    jQuery(document).on("hidden.bs.collapse", ".panel-collapse", function (e) {
      jQuery(this).siblings('.panel-heading').removeClass('active');
    });

    //other news
    jQuery('.other-news ul').slick({
      arrows: false,
      dots: true,
      slidesToScroll: 1,
      slidesToShow: 3,
      rtl: rtl_slick(),
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        }
      ]
    });   
  
    jQuery('body').on('click','.load-more-btn',function(){
        var form_data = jQuery("#load-more-form").serialize();
        var page_no = parseInt(jQuery('.page-no').val());
        var total_page = parseInt(jQuery('.total-pages').val());
        jQuery.ajax({
            type : 'post',
            url  :  ajax_object.ajax_url,
            data : form_data,
            success : function(response){
                jQuery('.news-content').append(response);
                if(page_no >= total_page){
                    jQuery('.load-more-btn').hide();
                }
                jQuery('.page-no').val(parseInt(page_no) + 1);
            }
        });
    });  

    // documents list scholarship form
    doc_list();
    jQuery(window).on('resize',function(){
      doc_list();
    })

    // cf7 repeater index loop
    jQuery( function( $ ) {
      $( '.wpcf7-field-groups' ).on( 'wpcf7-field-groups/change', function() {
          var $groups = $( this ).find( '.group-index' );
          $groups.each( function() {
              $( this ).text( $groups.index( this ) + 1 );
          } );
      } ).trigger( 'wpcf7-field-groups/change' );
    });

    jQuery( function($) {

      $(document).on('click', 'li.vc_tta-tab a', function(){
         $('.ultimate_google_map').css('width','100%');
      });
      
      });

});

jQuery(function(){
    var hash = window.location.hash;
    hash && jQuery('.scholarship-tab ul.nav a[href="' + hash + '"]').tab('show');

    jQuery('.scholarship-tab ul.nav-tabs a').click(function (e) {
        jQuery(this).tab('show');
        window.location.hash = this.hash;
    });
});

function coll_cat(){
    if(width > 767){
      setTimeout(function()
        { 
          var maxHeight = 50;
          
          jQuery('.cp-cat div[class*="col-"]').each(function() {
            maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
          });
          
          jQuery('.cp-cat div[class*="col-"]').each(function() {
            jQuery(this).height(maxHeight);
          });
        }, 1000);
    }
}
function doc_list(){
  if(width > 767){
    setTimeout(function()
      { 
        var maxHeight = -1;

        jQuery('.common-forms .form-content.documents-list').each(function() {
              maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
          });
        
          jQuery('.common-forms .form-content.documents-list').each(function() {
           jQuery(this).height(maxHeight);
        });
    }, 1000);
  }
}
function rtl_slick(){
  if (jQuery('body').hasClass("rtl")) {
     return true;
  } else {
     return false;
  }}
  

