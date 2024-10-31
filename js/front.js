jQuery(document).ready(function(){

	function OCWQV_prettyPhoto_Load() {
	    jQuery("a.zoom").prettyPhoto({
	        hook: 'data-rel',
	        social_tools: false,
	        theme: 'pp_woocommerce',
	        horizontal_padding: 20,
	        opacity: 0.8,
	        deeplinking: false
	    });
	    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
	        hook: 'data-rel',
	        social_tools: false,
	        theme: 'pp_woocommerce',
	        horizontal_padding: 20,
	        opacity: 0.8,
	        deeplinking: false,
	    });
	}


	var qv_length = jQuery('.ocwqv_ocqkvwbtn').length;

	//find next previous id

    function find_nav_ids(p_id){
	
			var curr_index = jQuery("[ocwqv-id="+p_id+"]").index('.ocwqv_ocqkvwbtn');
			// alert(curr_index);

			var curr_length = curr_index + 1;
			var next_index,prev_index;
			var qv_btn = jQuery('.ocwqv_ocqkvwbtn');
				
			//Find next button
			if(curr_length == qv_length){
				next_index = 0;
				 
			}
			else{
				next_index = curr_index + 1;
			}


			//Find prev button
			if(curr_length == 1){
				prev_index = qv_length - 1;
			}
			else{
				prev_index = curr_index - 1;
			}

			var qv_next = qv_btn.eq(next_index).attr('ocwqv-id');
			var qv_prev = qv_btn.eq(prev_index).attr('ocwqv-id');

		return {'popup_id_pro': p_id , 'qv_next': qv_next , 'qv_prev': qv_prev};

	}

	// current Product
	jQuery('body').on('click','.ocwqv_ocqkvwbtn',function() {

		jQuery('body').addClass("ocwqv_qview_popup_body");
		jQuery('body').append('<div class="ocwqv_loading"><img src="'+ ocwqv_jsdata.object_name +'/images/'+ ocwqv_jsdata.ocwqv_qw_popup_loader +'" class="ocwqv_loader"></div>');
		var loading = jQuery('.ocwqv_loading');
		loading.show();
		var id = jQuery(this).data("id");
		var ajax_data = find_nav_ids(id);
		var current = jQuery(this);
		ocwqv_qv_ajax(ajax_data);
	
    });

    // Next Product
	jQuery('.ocwqv_qview_popup_class').on('click','.ocwqv-qv-nxt',function(){

		jQuery('body').addClass("ocwqv_qview_popup_body");
		jQuery('body').append('<div class="ocwqv_loading preves"><img src="'+ ocwqv_jsdata.object_name +'/images/'+ ocwqv_jsdata.ocwqv_qw_popup_loader +'" class="ocwqv_loader"></div>');
		var loading = jQuery('.ocwqv_loading');
		loading.show();
		jQuery("#ocwqv_qview_popup").html("");
		var next_id =jQuery(this).attr('ocwqv-nxt-id');
		var ajax_data = find_nav_ids(next_id);
		ocwqv_qv_ajax(ajax_data);

	})

	//Previous Product
	jQuery('.ocwqv_qview_popup_class').on('click','.ocwqv-qv-prev',function(){

		jQuery('body').addClass("ocwqv_qview_popup_body");
		jQuery('body').append('<div class="ocwqv_loading preves"><img src="'+ ocwqv_jsdata.object_name +'/images/'+ ocwqv_jsdata.ocwqv_qw_popup_loader +'" class="ocwqv_loader"></div>');
		var loading = jQuery('.ocwqv_loading');
		loading.show();
		jQuery("#ocwqv_qview_popup").html("");
		var prev_id = jQuery(this).attr('ocwqv-prev-id');
		var ajax_data = find_nav_ids(prev_id);
		ocwqv_qv_ajax(ajax_data);
		
	})

	//product id wise ajax
    function ocwqv_qv_ajax(ajax_data){

			ajax_data['action'] = 'ocwqv_productsquick';
			jQuery.ajax({
			url: ocwqv_jsdata.ajax_url,
			type: 'POST',
			data: ajax_data,
			success : function(response) {

				var loading = jQuery('.ocwqv_loading');
				loading.remove();
				jQuery("#ocwqv_qview_popup").css("display","flex");
				jQuery("#ocwqv_qview_popup").html(response);
				// Variation Form
                var form_variation = jQuery("#ocwqv_qview_popup").find('.variations_form');

                form_variation.each( function() {
                    jQuery( this ).wc_variation_form();
                });
                
                OCWQV_prettyPhoto_Load();
			},
			error: function() {
				alert('Error occured');
			}
		})
		return false;
	}


	
	var modal = document.getElementById("ocwqv_qview_popup");
	var span = document.getElementsByClassName("ocwqv_qview_close")[0];
	
	jQuery(document).on('click','.ocwqv_qview_close',function(){
		jQuery("#ocwqv_qview_popup").css("display","none");
		jQuery('body').removeClass("ocwqv_qview_popup_body");
	});



	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
			jQuery('body').removeClass("ocwqv_qview_popup_body");
		}
	}

});