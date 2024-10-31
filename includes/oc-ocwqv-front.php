<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCWQV_front')) {

    class OCWQV_front {

        protected static $instance;
        function ocwqv_create_qv_btn() {
            global $ocwqv_comman;

            $ocwqv_shpg_shop = $ocwqv_comman['ocwqv_shpg_shop'];
            $ocwqv_shpg_cat = $ocwqv_comman['ocwqv_shpg_cat'];
            $ocwqv_shpg_tag = $ocwqv_comman['ocwqv_shpg_tag'];
            $ocwqv_single_related = $ocwqv_comman['ocwqv_single_related'];


            if($ocwqv_comman['ocwqv_quk_btn'] == "yes") {
                if(wp_is_mobile()) {
                    if($ocwqv_comman['ocwqv_mbl_btn'] == "yes") {
                        if( is_shop() && $ocwqv_shpg_shop == 'yes' ) {
                            if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                                add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                            } 
                        } elseif ( is_product_category() && $ocwqv_shpg_cat == 'yes' ) {
                            if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                                add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                            } 
                        } elseif ( is_product_tag() && $ocwqv_shpg_tag == 'yes') {
                            if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                                add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                            } 
                        } elseif ( is_product() && $ocwqv_single_related == 'yes') {
                            if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                                add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                            }
                        }
                    }
                } else {
                    if( is_shop() && $ocwqv_shpg_shop == 'yes' ) {
                        if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                            add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                        } 
                    } elseif ( is_product_category() && $ocwqv_shpg_cat == 'yes' ) {
                        if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                            add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                        } 
                    } elseif ( is_product_tag() && $ocwqv_shpg_tag == 'yes' ) {
                        if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                            add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                        } 
                    } elseif ( is_product() && $ocwqv_single_related == 'yes') {
                        if($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart" ) {
                            add_action('woocommerce_after_shop_loop_item', array( $this, 'ocwqv_create_button_shop' ), 11);
                        }
                    }
                }
            }
        }

      
        function ocwqv_create_button_shop() {
            global $ocwqv_comman;

            $proID = get_the_ID();
            $product = wc_get_product( $proID );
        
            ?>
            <div class="ocwqv_qview_btn_div" >
                <button class="ocwqv_ocqkvwbtn" title="Quick View" data-id="<?php echo $proID; ?>" ocwqv-id="<?php echo $proID; ?>" proname="<?php echo $product->get_title(); ?>" style="background-color: <?php echo $ocwqv_comman['ocwqv_btn_bg_clr']; ?>; color: <?php echo $ocwqv_comman['ocwqv_font_clr']; ?>; padding: <?php echo $ocwqv_comman['ocwqv_btn_padding'];?>; font-size: <?php echo $ocwqv_comman['ocwqv_font_size']."px" ?>;">
                    
                    <?php
                    if($ocwqv_comman['ocwqv_qvicon_enable'] == 'yes') {
                    ?>

                    <i class="<?php echo $ocwqv_comman['ocwqv_qvicon_choice']; ?>" style="color: <?php echo $ocwqv_comman['ocwqv_qvicon_clr']; ?>;" aria-hidden="true"></i>
                    
                    <?php
                    }
                    ?>

                    <?php echo $ocwqv_comman['ocwqv_head_title'];?>
                </button>
            </div>
            <?php
        }


        function ocwqv_popup_div_footer() {
            global $ocwqv_comman;

        	$ocwqv_qw_popup_bg = $ocwqv_comman['ocwqv_qw_popup_bg'];
            ?>
            <div id="ocwqv_qview_popup" class="ocwqv_qview_popup_class" style="background-color:<?php echo $ocwqv_qw_popup_bg; ?>;">
            </div>
            <style type="text/css">
	        .ocwqv_qview_popup_body:after {
	            background-color: <?php echo $ocwqv_qw_popup_bg; ?>;
	        }
	        </style>
            <?php
        }


        function ocwqv_template_single_custom_ratings() {
			$product_id =  sanitize_text_field ($_REQUEST['popup_id_pro']);
			$product = wc_get_product( $product_id );
			echo wc_get_rating_html( $product->get_average_rating() );
		}

        function ocwqv_product_image() {
            global $post, $product;
            ?>
            <div class="images">
                <?php
                    if ( has_post_thumbnail() ) {
                        $attachment_count = count( $product->get_gallery_attachment_ids() );
                        $gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
                        $props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
                        $image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
                            'title'  => $props['title'],
                            'alt'    => $props['alt'],
                        ) );
                        echo 
                            sprintf(
                                '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto%s">%s</a>',
                                esc_url( $props['url'] ),
                                esc_attr( $props['caption'] ),
                                $gallery,
                                $image
                            );
                    } else {
                        echo sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) );
                    }

                    do_action('ocwqv_after_product_image');
                ?>
            </div>
            <?php
        }


        function ocwqv_product_thumbnails() {
            global $post, $product, $woocommerce;

            $attachment_ids = $product->get_gallery_attachment_ids();

            if ( $attachment_ids ) {
                $loop       = 0;
                $columns    = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
                ?>
                <div class="thumbnails <?php echo 'columns-' . $columns; ?>"><?php

                    foreach ( $attachment_ids as $attachment_id ) {

                        $classes = array( 'zoom' );

                        if ( $loop === 0 || $loop % $columns === 0 ) {
                            $classes[] = 'first';
                        }

                        if ( ( $loop + 1 ) % $columns === 0 ) {
                            $classes[] = 'last';
                        }

                        $image_class = implode( ' ', $classes );
                        $props       = wc_get_product_attachment_props( $attachment_id, $post );

                        if ( ! $props['url'] ) {
                            continue;
                        }

                        echo 
                            sprintf(
                                '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>',
                                esc_url( $props['url'] ),
                                esc_attr( $image_class ),
                                esc_attr( $props['caption'] ),
                                wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), 0, $props )
                            );
                        $loop++;
                    }

                ?></div>
                <?php
            }
        }


        function ocwqv_view_details_button() {
            global $ocwqv_comman;
        	$product_id =  sanitize_text_field ($_REQUEST['popup_id_pro']);

			?>
			<div class="ocwqv_qview_btn_div">
                <button onclick='window.location.href = "<?php echo get_permalink( $product_id ); ; ?>"' class="ocwqv_vdbtn" style="background-color: <?php echo $ocwqv_comman['ocwqv_btn_bg_clr']; ?>; color: <?php echo $ocwqv_comman['ocwqv_font_clr']; ?>;  font-size: <?php echo $ocwqv_comman['ocwqv_font_size']."px" ?>;">
                	View Details
                </button>
            </div>
			<?php        	
        }


        function ocwqv_popup_open_quick() {
            global $ocwqv_comman;
            $ocwqv_show_images = $ocwqv_comman['ocwqv_show_images'];
            $ocwqv_show_title = $ocwqv_comman['ocwqv_show_title'];
            $ocwqv_show_ratings = $ocwqv_comman['ocwqv_show_ratings'];
            $ocwqv_show_price = $ocwqv_comman['ocwqv_show_price'];
            $ocwqv_show_description = $ocwqv_comman['ocwqv_show_description'];
            $ocwqv_show_atc = $ocwqv_comman['ocwqv_show_atc'];
            $ocwqv_viewdetails_btn = $ocwqv_comman['ocwqv_viewdetails_btn'];
            $ocwqv_show_meta = $ocwqv_comman['ocwqv_show_meta'];
            

            if($ocwqv_show_title == 'yes') {
                add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_title', 5 );
            }

            if($ocwqv_show_ratings == 'yes') {
                add_action( 'yith_wcqv_product_summary', array($this, 'ocwqv_template_single_custom_ratings'), 10 );
            }

            if($ocwqv_show_price == 'yes') {
                add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_price', 15 );
            }

            if($ocwqv_show_description == 'yes') {
                add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_excerpt', 20 );
            }

            if($ocwqv_show_atc == 'yes') {
            	add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_add_to_cart', 25 );
            }

            if($ocwqv_viewdetails_btn == 'yes') {
                add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'ocwqv_view_details_button' ), 15 );
                // add_action( 'yith_wcqv_product_summary', array($this, 'ocwqv_view_details_button'), 25 );
            }

            if($ocwqv_show_meta == 'yes') {
                add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );
            }


            add_action( 'ocwqv_product_images_gallery', 'woocommerce_show_product_sale_flash', 10 );
			add_action('ocwqv_product_images_gallery', array($this, 'ocwqv_product_image'), 20 );
			add_action('ocwqv_after_product_image', array($this, 'ocwqv_product_thumbnails'), 5 );


            $product_id =  sanitize_text_field ($_REQUEST['popup_id_pro']);
            $ocwqv_next=sanitize_text_field ($_REQUEST['qv_next']);
            $ocwqv_prev=sanitize_text_field ($_REQUEST['qv_prev']);
            $params = array(

                'p' => $product_id,
                'post_type' => array('product','product_variation')

            );

            $query = new WP_Query($params);

            if($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                        echo '<div class="ocwqv-qv-prev ocwqv-chevron-left ocwqv-qv" ocwqv-prev-id ="'.$ocwqv_prev.'"><i class="fa fa-angle-left"></i></div><div class="ocwqv-qv-nxt ocwqv-chevron-right ocwqv-qv" ocwqv-nxt-id ="'.$ocwqv_next.'"><i class="fa fa-angle-right"></i></div>';
                        echo '<div class="ocwqv_qview_modal-content">';
                        echo '<span class="ocwqv_qview_close"><i class="'.$ocwqv_comman['ocwqv_qvppc_icon'].'" style="color: '.$ocwqv_comman['ocwqv_qvppc_icon_color'].'" aria-hidden="true"></i></span>';
                    	echo '<div class="ocwqv_qview_inner_div">';
                                if($ocwqv_show_images == 'yes') {
                                    echo '<div class="ocwqv_qview_image">';
                                    do_action('ocwqv_product_images_gallery');
                                    echo '</div>';
                                    echo '<div class="ocwqv_qview_summaary">';
                                } else {
                                    echo '<div class="ocwqv_qview_summaary ocwqv_summaary_full">';
                                }
	                            do_action( 'yith_wcqv_product_summary' );
	                        echo '</div>';
	                    echo '</div>';
                    echo '</div>';
                }
            }
            
            wp_reset_postdata();
            die();                                 
        }


		function ocwqv_custom_shortcode_button( $atts = '' ) {
            global $ocwqv_comman;
		    $value = shortcode_atts( array(
		        'product_id' => '',
                'name' => ''
		    ), $atts );


		    $proID = $value['product_id'];
            $product = wc_get_product( $proID );

            if(isset($value['name']) && $value['name'] != '') {
                $button_text = $value['name'];
            } else {
                $button_text = $ocwqv_comman['ocwqv_head_title'];
            }
    		
    		ob_start();

            ?>

            <button class="ocwqv_ocqkvwbtn" title="Quick View" data-id="<?php echo $proID; ?>" ocwqv-id="<?php echo $proID; ?>" proname="<?php echo $product->get_title(); ?>" style="background-color: <?php echo $ocwqv_comman['ocwqv_btn_bg_clr']; ?>; color: <?php echo $ocwqv_comman['ocwqv_font_clr']; ?>; padding: <?php echo $ocwqv_comman['ocwqv_btn_padding'];?>; font-size: <?php echo $ocwqv_comman['ocwqv_font_size']."px" ?>;">
                
                <?php
                if($ocwqv_comman['ocwqv_qvicon_enable'] == 'yes') {
                ?>

                <i class="<?php echo $ocwqv_comman['ocwqv_qvicon_choice']; ?>" style="color: <?php echo $ocwqv_comman['ocwqv_qvicon_clr']; ?>;" aria-hidden="true"></i>
                
                <?php
                }
                ?>

                <?php echo $button_text; ?>
            </button>
            
            <?php

            $content = ob_get_clean();

		    return $content;
		}



        function ocwqv_woocommerce_ajax_add_to_cart() {

            $ocprodid = sanitize_text_field ($_POST['product_id']);
            $ocprodqty = sanitize_text_field ($_POST['quantity']);
            $ocvarid = sanitize_text_field ($_POST['variation_id']);

            $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($ocprodid));
            $quantity = empty($ocprodqty) ? 1 : wc_stock_amount($ocprodqty);
            $variation_id = absint($ocvarid);
            $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
            $product_status = get_post_status($product_id);

            if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

                do_action('woocommerce_ajax_added_to_cart', $product_id);

                if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
                    wc_add_to_cart_message(array($product_id => $quantity), true);
                }

                WC_AJAX :: get_refreshed_fragments();
            } else {

                $data = array(
                    'error' => true,
                    'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

                echo wp_send_json($data);
            }

            wp_die();
        }



        function init() {
            add_action('wp_head', array( $this, 'ocwqv_create_qv_btn' ));
            add_action('wp_footer', array( $this, 'ocwqv_popup_div_footer' ));
            add_action('wp_ajax_ocwqv_productsquick', array( $this, 'ocwqv_popup_open_quick' ));
            add_action('wp_ajax_nopriv_ocwqv_productsquick', array( $this, 'ocwqv_popup_open_quick'));
            add_shortcode('ocwqv', array( $this, 'ocwqv_custom_shortcode_button'));
            add_action('wp_ajax_ocwqv_woocommerce_ajax_add_to_cart', array( $this, 'ocwqv_woocommerce_ajax_add_to_cart'));
            add_action('wp_ajax_nopriv_ocwqv_woocommerce_ajax_add_to_cart', array( $this, 'ocwqv_woocommerce_ajax_add_to_cart'));
        }


        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
            return self::$instance;
        }
    }
    OCWQV_front::instance();
}