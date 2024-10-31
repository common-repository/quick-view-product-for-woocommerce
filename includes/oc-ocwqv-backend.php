<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCWQV_admin_menu')) {

    class OCWQV_admin_menu {

        protected static $OCWQV_instance;

        function OCWQV_submenu_page() {
           add_menu_page( 'Quick View', 'Quick View', 'manage_options', 'quick-view', array($this, 'OCWQV_callback'));
        }


        function OCWQV_callback() {
            global $ocwqv_comman;
            ?>    
                <div class="wrap">
                    <h2><?php echo __('Quick View','quick-view-product-for-woocommerce');?></h2>
                    <?php if(isset($_REQUEST['message']) && $_REQUEST['message'] == 'success'){ ?>
                        <div class="notice notice-success is-dismissible">
                            <p><strong><?php echo __('Settings Saved Successfully.','quick-view-product-for-woocommerce');?></strong></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="ocwqv-container">
                    <form method="post">
                      <?php wp_nonce_field( 'ocwqv_nonce_action', 'ocwqv_nonce_field' ); ?>   
                        <div class="ocwqv-container-inner">
                            <div class="cover_div">
                              <h2><?php echo __('General Settings','quick-view-product-for-woocommerce');?></h2>
                                <div class="ocwqv_cover_div">
                                    <table class="ocwqv_data_table">
                                        <tr>
                                            <th><?php echo __('Enable Quick View Button','quick-view-product-for-woocommerce');?></th>
                                            <td>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_quk_btn]" value="yes" <?php if ($ocwqv_comman['ocwqv_quk_btn'] == "yes" ) { echo 'checked'; } ?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('Enable Quick View Button on Mobile','quick-view-product-for-woocommerce');?></th>
                                            <td>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_mbl_btn]" value="yes" <?php if ($ocwqv_comman['ocwqv_mbl_btn'] == "yes" ) { echo 'checked'; } ?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('Show (in quick view popup)','quick-view-product-for-woocommerce');?></th>
                                            <td class="ocwqv_show_td">
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_show_images]" value="yes" <?php if ($ocwqv_comman['ocwqv_show_images'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Images','quick-view-product-for-woocommerce');?></label>

                                                <input type="checkbox" name="ocwqv_comman[ocwqv_show_title]" value="yes" <?php if ($ocwqv_comman['ocwqv_show_title'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Title','quick-view-product-for-woocommerce');?></label>

                                                <input type="checkbox" name="ocwqv_comman[ocwqv_show_ratings]" value="yes" <?php if ($ocwqv_comman['ocwqv_show_ratings'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Ratings','quick-view-product-for-woocommerce');?></label>

                                                <input type="checkbox" name="ocwqv_comman[ocwqv_show_price]" value="yes" <?php if ($ocwqv_comman['ocwqv_show_price'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Price','quick-view-product-for-woocommerce');?></label>

                                                <input type="checkbox" name="ocwqv_comman[ocwqv_show_description]" value="yes" <?php if ($ocwqv_comman['ocwqv_show_description'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Description','quick-view-product-for-woocommerce');?></label>

                                                <input type="checkbox" name="ocwqv_comman[ocwqv_show_atc]" value="yes" <?php if ($ocwqv_comman['ocwqv_show_atc'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Add to Cart','quick-view-product-for-woocommerce');?></label>

                                                <input type="checkbox" name="ocwqv_comman[ocwqv_show_meta]" value="yes" <?php if ($ocwqv_comman['ocwqv_show_meta'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Meta','quick-view-product-for-woocommerce');?></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('Enable View Details Button','quick-view-product-for-woocommerce');?></th>
                                            <td>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_viewdetails_btn]" value="yes" <?php if ($ocwqv_comman['ocwqv_viewdetails_btn'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('View Details button with product link within popup','quick-view-product-for-woocommerce');?></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('Enable Lightbox','quick-view-product-for-woocommerce');?></th>
                                            <td>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_lightbox_enable]" value="yes" <?php if ($ocwqv_comman['ocwqv_lightbox_enable'] == "yes" ) {echo 'checked';} ?>>
                                                <label><?php echo __('Product Images will open in lightbox.','quick-view-product-for-woocommerce');?></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('Ajax Add to Cart','quick-view-product-for-woocommerce');?></th>
                                            <td>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_ajax_atc]" disabled="">
                                                <label><?php echo __('Add items to cart, without refreshing page.','quick-view-product-for-woocommerce');?></label>
                                                  <label class="ocwqv_pro_link">Only available in pro version <a href="https://oceanwebguru.com/shop/quick-view-woocommerce-product-pro/" target="_blank">link</a></label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('Quick View Popup Background Color','quick-view-product-for-woocommerce');?></th>
                                            <td>
                                               <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $ocwqv_comman['ocwqv_qw_popup_bg']; ?>" name="ocwqv_comman[ocwqv_qw_popup_bg]" value="<?php echo $ocwqv_comman['ocwqv_qw_popup_bg']; ?>"/> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('Quick View Popup Loader','quick-view-product-for-woocommerce');?></th>
                                            <td class="ocwqv_icon_choice">
                                                <input type="radio" name="ocwqv_comman[ocwqv_qw_popup_loader]" value="loader-1.gif" <?php if ($ocwqv_comman['ocwqv_qw_popup_loader'] == "loader-1.gif") {echo 'checked';} ?>>
                                                <label>
                                                    <img src="<?php echo OCWQV_PLUGIN_DIR . '/images/loader-1.gif' ?>" alt="">
                                                </label>
                                                <input type="radio" name="ocwqv_comman[ocwqv_qw_popup_loader]" disabled="">
                                                <label>
                                                    <img src="<?php echo OCWQV_PLUGIN_DIR . '/images/loader-2.gif' ?>" alt="">
                                                </label>
                                                <input type="radio" name="ocwqv_comman[ocwqv_qw_popup_loader]" disabled="">
                                                <label>
                                                    <img src="<?php echo OCWQV_PLUGIN_DIR . '/images/loader-3.gif' ?>" alt="">
                                                </label>
                                                <input type="radio" name="ocwqv_comman[ocwqv_qw_popup_loader]" disabled="">
                                                <label>
                                                    <img src="<?php echo OCWQV_PLUGIN_DIR . '/images/loader-4.gif' ?>" alt="">
                                                </label>
                                                <input type="radio" name="ocwqv_comman[ocwqv_qw_popup_loader]" disabled="">
                                                <label>
                                                    <img src="<?php echo OCWQV_PLUGIN_DIR . '/images/loader-5.gif' ?>" alt="">
                                                </label>
                                                <label class="ocwqv_pro_link">Only available in pro version <a href="https://oceanwebguru.com/shop/quick-view-woocommerce-product-pro/" target="_blank">link</a></label>
                                            </td>
                                        </tr>
                                        <tr>
	                                        <th><?php echo __('Quick View Popup Close Icon','quick-view-product-for-woocommerce');?></th>
	                                        <td class="ocwqv_icon_choice">
	                                            <input type="radio" name="ocwqv_comman[ocwqv_qvppc_icon]" value="fa fa-times" <?php if ($ocwqv_comman['ocwqv_qvppc_icon'] == "fa fa-times") {echo 'checked';} ?>>
	                                            <label>
	                                                <i class="fa fa-times" aria-hidden="true"></i>
	                                            </label>
	                                            <input type="radio" name="ocwqv_comman[ocwqv_qvppc_icon]" value="fa fa-times-circle-o" disabled="">
	                                            <label>
	                                                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
	                                            </label>
	                                            <input type="radio" name="ocwqv_comman[ocwqv_qvppc_icon]" value="fa fa-times-circle" disabled="">
	                                            <label>
	                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
	                                            </label>
	                                            <input type="radio" name="ocwqv_comman[ocwqv_qvppc_icon]" value="fa fa-window-close" disabled="">
	                                            <label>
	                                                <i class="fa fa-window-close" aria-hidden="true"></i>
	                                            </label>
	                                            <input type="radio" name="ocwqv_comman[ocwqv_qvppc_icon]" value="fa fa-window-close-o" disabled="">
	                                            <label>
	                                                <i class="fa fa-window-close-o" aria-hidden="true"></i>
	                                            </label>
                                                <label class="ocwqv_pro_link">Only available in pro version <a href="https://oceanwebguru.com/shop/quick-view-woocommerce-product-pro/" target="_blank">link</a></label>
	                                        </td>
	                                    </tr>
                                        <tr>
                                            <th><?php echo __('Quick View Popup Close Icon Color','quick-view-product-for-woocommerce');?></th>
                                            <td>
                                               <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $ocwqv_comman['ocwqv_qvppc_icon_color']; ?>" name="ocwqv_comman[ocwqv_qvppc_icon_color]" value="<?php echo $ocwqv_comman['ocwqv_qvppc_icon_color']; ?>"/> 
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="cover_div">
                                <table class="ocwqv_data_table">
                                    <h2><?php echo __('Quick View Button Style','quick-view-product-for-woocommerce');?></h2>
                                    <tr>
                                        <th><?php echo __('Button Title','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <input type="text" name="ocwqv_comman[ocwqv_head_title]" value="<?php echo $ocwqv_comman['ocwqv_head_title']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Font Size','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <input type="number" name="ocwqv_comman[ocwqv_font_size]" value="<?php echo $ocwqv_comman['ocwqv_font_size']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Font Color','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $ocwqv_comman['ocwqv_font_clr']; ?>" name="ocwqv_comman[ocwqv_font_clr]" value="<?php echo $ocwqv_comman['ocwqv_font_clr']; ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Background Color','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $ocwqv_comman['ocwqv_btn_bg_clr']; ?>" name="ocwqv_comman[ocwqv_btn_bg_clr]" value="<?php echo $ocwqv_comman['ocwqv_btn_bg_clr']; ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Button Position','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <select name="ocwqv_comman[ocwqv_rd_btn_pos]" disabled="">
                                                <option value="after_add_cart" <?php if ($ocwqv_comman['ocwqv_rd_btn_pos'] == "after_add_cart") {echo 'selected';} ?>><?php echo __('After Add To Cart','quick-view-product-for-woocommerce');?></option>
                                                
                                            </select>
                                              <label class="ocwqv_pro_link">Only available in pro version <a href="https://oceanwebguru.com/shop/quick-view-woocommerce-product-pro/" target="_blank">link</a></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Button Padding','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <input type="text" name="ocwqv_comman[ocwqv_btn_padding]" value="<?php echo $ocwqv_comman['ocwqv_btn_padding']; ?>">
                                            <span><?php echo __('insert value in px(ex. 6px 8px)','quick-view-product-for-woocommerce');?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Quick View button Icon','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <input type="checkbox" name="ocwqv_comman[ocwqv_qvicon_enable]" value="yes" <?php if ($ocwqv_comman['ocwqv_qvicon_enable'] == "yes" ) {echo 'checked';} ?>>
                                            <label><?php echo __('Enable Quick View Button Icon','quick-view-product-for-woocommerce');?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Select Quick View Button Icon','quick-view-product-for-woocommerce');?></th>
                                        <td class="ocwqv_icon_choice">
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-plus" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-plus") {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </label>
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-plus-circle" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-plus-circle" ) {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </label>
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-plus-square-o" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-plus-square-o" ) {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                                            </label>
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-plus-square" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-plus-square" ) {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                            </label>
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-search-plus" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-search-plus" ) {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                            </label>
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-search" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-search" ) {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </label>
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-eye" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-eye" ) {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </label>
                                            <input type="radio" name="ocwqv_comman[ocwqv_qvicon_choice]" value="fa fa-external-link-square" <?php if ($ocwqv_comman['ocwqv_qvicon_choice'] == "fa fa-external-link-square" ) {echo 'checked';} ?>>
                                            <label>
                                                <i class="fa fa-external-link-square" aria-hidden="true"></i>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo __('Quick View Button Icon Color','quick-view-product-for-woocommerce');?></th>
                                        <td>
                                            <input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo $ocwqv_comman['ocwqv_qvicon_clr']; ?>" name="ocwqv_comman[ocwqv_qvicon_clr]" value="<?php echo $ocwqv_comman['ocwqv_qvicon_clr']; ?>"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cover_div">
                             <h2><?php echo __('Enable Quick View Button on Pages','quick-view-product-for-woocommerce');?></h2>
                                <div class="ocwqv_cover_div">
                                    <table class="ocwqv_data_table">
                                        <tr>
                                            <th><?php echo __('Enable on Pages','quick-view-product-for-woocommerce');?></th>
                                            <td class="ocwqv_show_td">
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_shpg_shop]" value="yes" <?php if ($ocwqv_comman['ocwqv_shpg_shop'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Shop','quick-view-product-for-woocommerce');?></label>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_shpg_cat]" value="yes" <?php if ($ocwqv_comman['ocwqv_shpg_cat'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Category','quick-view-product-for-woocommerce');?></label>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_shpg_tag]" value="yes" <?php if ($ocwqv_comman['ocwqv_shpg_tag'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Tag','quick-view-product-for-woocommerce');?></label>
                                                <input type="checkbox" name="ocwqv_comman[ocwqv_single_related]" value="yes" <?php if ($ocwqv_comman['ocwqv_single_related'] == "yes" ) { echo 'checked'; } ?>>
                                                <label><?php echo __('Related Products','quick-view-product-for-woocommerce');?></label>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="cover_div">
                             <h2><?php echo __('Quick View Button Using Shortcode','quick-view-product-for-woocommerce');?></h2>
                                <div class="ocwqv_cover_div">
                                    <div class="ocwqvscode">
                                        <p><?php echo __('You can create custom quick view button using shortcode, you can add button to any spot of the page or post to allow visitor to see the quick view of any specific product in your shop.','quick-view-product-for-woocommerce');?></p>

                                        <p><strong><?php echo __('[ocwqv product_id="{product id}" name="{button name}"]','quick-view-product-for-woocommerce');?></strong></p>
                                        
                                        <p><em><?php echo __('eg. [ocwqv product_id="15" name="Discover Now"] for the product with ID is 15.','quick-view-product-for-woocommerce');?></em></p>
                                    </div>
                                </div>
                            </div>
                        <input type="hidden" name="action" value="ocwqv_save_option">
                        <input type="submit" value="Save Changes" name="submit" class="button-primary" id="wfc-btn-space">
                    </form>
                </div>
            <?php
        }


        function OCWQV_save_options() {
            if( current_user_can('administrator') ) { 
                if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'ocwqv_save_option'){
                    if(!isset( $_POST['ocwqv_nonce_field'] ) || !wp_verify_nonce( $_POST['ocwqv_nonce_field'], 'ocwqv_nonce_action' )) {
                        
                        echo 'Sorry, your nonce did not verify.';
                        exit;

                    } else {

                        $isecheckbox = array(
                            'ocwqv_quk_btn',
                            'ocwqv_mbl_btn',
                            'ocwqv_show_images',
                            'ocwqv_show_title',
                            'ocwqv_show_ratings',
                            'ocwqv_show_price',
                            'ocwqv_show_description',
                            'ocwqv_show_atc',
                            'ocwqv_show_meta',
                            'ocwqv_viewdetails_btn',
                            'ocwqv_lightbox_enable',
                            'ocwqv_qvicon_enable',
                            'ocwqv_shpg_shop',
                            'ocwqv_shpg_cat',
                            'ocwqv_shpg_tag',
                            'ocwqv_single_related',
                        );

                        foreach ($isecheckbox as $key_isecheckbox => $value_isecheckbox) {
                            if(!isset($_REQUEST['ocwqv_comman'][$value_isecheckbox])){
                                $_REQUEST['ocwqv_comman'][$value_isecheckbox] ='no';
                            }
                        }                      
                        
                        foreach ($_REQUEST['ocwqv_comman'] as $key_ocwqv_comman => $value_ocwqv_comman) {
                            update_option($key_ocwqv_comman, sanitize_text_field($value_ocwqv_comman), 'yes');
                        }

                        wp_redirect( admin_url( '/admin.php?page=quick-view' ) );
                        exit;     
                    }
                }
            }
        }

        function OCWQV_support_and_rating_notice() {
            $screen = get_current_screen();
              // print_r($screen);
            if( 'quick-view' == $screen->parent_base) {
                ?>
                <div class="ocwqv_ratess_open">
                    <div class="ocwqv_rateus_notice">
                        <div class="ocwqv_rtusnoti_left">
                            <h3>Rate Us</h3>
                            <label>If you like our plugin, </label>
                            <a target="_blank" href="https://wordpress.org/support/plugin/quick-view-product-for-woocommerce/reviews/?filter=5">
                                <label>Please vote us</label>
                            </a>
                            <label>, so we can contribute more features for you.</label>
                        </div>
                        <div class="ocwqv_rtusnoti_right">
                            <img src="<?php echo OCWQV_PLUGIN_DIR;?>/images/review.png" class="scfw_review_icon">
                        </div>
                    </div>
                    <div class="ocwqv_support_notice">
                        <div class="ocwqv_rtusnoti_left">
                            <h3>Having Issues?</h3>
                            <label>You can contact us at</label>
                            <a target="_blank" href="https://oceanwebguru.com/contact-us/">
                                <label>Our Support Forum</label>
                            </a>
                        </div>
                        <div class="ocwqv_rtusnoti_right">
                            <img src="<?php echo OCWQV_PLUGIN_DIR;?>/images/support.png" class="ocwqv_review_icon">
                        </div>
                    </div>
                </div>
                <div class="ocwqv_donate_main">
                   <img src="<?php echo OCWQV_PLUGIN_DIR;?>/images/coffee.svg">
                   <h3>Buy me a Coffee !</h3>
                   <p>If you like this plugin, buy me a coffee and help support this plugin !</p>
                   <div class="ocwqv_donate_form">
                      <a class="button button-primary ocwg_donate_btn" href="https://www.paypal.com/paypalme/shayona163/" data-link="https://www.paypal.com/paypalme/shayona163/" target="_blank">Buy me a coffee !</a>
                   </div>
                </div>
                <?php
            }
        }


        function init() {
            add_action( 'admin_menu',  array($this, 'OCWQV_submenu_page'));
            add_action( 'init',  array($this, 'OCWQV_save_options'));
            add_action( 'admin_notices', array($this, 'OCWQV_support_and_rating_notice' ));
        }


        public static function OCWQV_instance() {
            if (!isset(self::$OCWQV_instance)) {
                self::$OCWQV_instance = new self();
                self::$OCWQV_instance->init();
            }
            return self::$OCWQV_instance;
        }
    }
    OCWQV_admin_menu::OCWQV_instance();
}