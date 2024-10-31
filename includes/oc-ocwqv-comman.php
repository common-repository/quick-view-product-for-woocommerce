<?php
if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCWQV_comman')) {

    class OCWQV_comman {

        protected static $instance;

        public static function instance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
                self::$instance->init();
            }
             return self::$instance;
        }
         function init() {
            global $ocwqv_comman;
            $optionget = array(
                'ocwqv_quk_btn' => 'yes',
                'ocwqv_mbl_btn' => 'yes',
                'ocwqv_show_images' => 'yes',
                'ocwqv_show_title' => 'yes',
                'ocwqv_show_ratings' => 'yes',
                'ocwqv_show_price' => 'yes',
                'ocwqv_show_description' => 'yes',
                'ocwqv_show_atc' => 'yes',
                'ocwqv_show_meta' => 'yes',
                'ocwqv_viewdetails_btn' => 'yes',
                'ocwqv_lightbox_enable' => 'yes',
                'ocwqv_qw_popup_bg' => '#00000066',
                'ocwqv_qw_popup_loader' => 'loader-1.gif',
                'ocwqv_qvppc_icon' => 'fa fa-times',
                'ocwqv_qvppc_icon_color' => '#000000',
                'ocwqv_head_title' => 'Quick View',
                'ocwqv_font_size' => '15',
                'ocwqv_font_clr' => '#ffffff',
                'ocwqv_btn_bg_clr' => '#000000',
                'ocwqv_rd_btn_pos' => 'after_add_cart',
                'ocwqv_btn_padding' => '8px 10px',
                'ocwqv_qvicon_enable' => 'yes',
                'ocwqv_qvicon_choice' => 'fa fa-plus',
                'ocwqv_qvicon_clr' => '#ffffff',
                'ocwqv_shpg_shop' => 'yes',
                'ocwqv_shpg_cat' => 'yes',
                'ocwqv_shpg_tag' => 'yes',
                'ocwqv_single_related' => 'yes',

            );
           
            foreach ($optionget as $key_optionget => $value_optionget) {
               $ocwqv_comman[$key_optionget] = get_option( $key_optionget,$value_optionget );
            }
        }
    }

    OCWQV_comman::instance();
}
?>