<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


if ( ! class_exists( 'AWL_Admin_Notices' ) ) :

    /**
     * Class for plugin admin panel
     */
    class AWL_Admin_Notices {

        /**
         * @var AWL_Admin_Notices The single instance of the class
         */
        protected static $_instance = null;

        /**
         * Main AWL_Admin_Notices Instance
         *
         * Ensures only one instance of AWL_Admin_Notices is loaded or can be loaded.
         *
         * @static
         * @return AWL_Admin_Notices - Main instance
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /*
         * Constructor
         */
        public function __construct() {

            // Welcome notice
            add_action( 'admin_notices', array( $this, 'display_welcome_header' ), 1 );

            // Plugins integration notice
            add_action( 'admin_notices', array( $this, 'plugins_integration_notice' ), 1 );

            // Hide notices
            add_action( 'admin_init', array( $this, 'hide_notices' ) );
            
        }

        /*
         * Show notices about PRO plugin integrations
         */
        public function plugins_integration_notice() {

            if ( ! current_user_can( 'manage_options' ) ) {
                return;
            }

            if ( ! class_exists( 'WCFMmp' ) && ! class_exists('ACF') && ! class_exists( 'WC_Product_Table_Plugin' ) && ! class_exists( 'YITH_WCWL' )
                && ! class_exists( 'WeDevs_Dokan' ) && ! defined( 'PWB_PLUGIN_VERSION' )
                && ! ( defined( 'WCMp_PLUGIN_VERSION' ) || defined( 'MVX_PLUGIN_VERSION' ) ) ) {
                return;
            }

            $hide_option = get_option( 'awl_hide_int_notices' );
            $notice_top_message = sprintf( __( 'Hi! Looks like you are using some plugins that have the advanced integration with %s. Please find more details below.', 'advanced-woo-labels' ), '<b>Advanced Woo Labels PRO</b>' );
            $notice_message = '';
            $notice_id = '';

            if ( class_exists( 'WCFMmp' ) && ( ! $hide_option || array_search( 'wcfm', $hide_option ) === false ) ) {
                $notice_message .= '<li>' . __( 'WCFM Multivendor Marketplace plugin.', 'advanced-woo-labels' ) . ' <a target="_blank" href="https://advanced-woo-labels.com/guide/wcfm-multivendor-marketplace/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=wcfm">' . __( 'Learn more', 'advanced-woo-labels' ) . '</a></li>';
                $notice_id .= 'wcfm|';
            }

            if ( class_exists('ACF') && ( ! $hide_option || array_search( 'acf', $hide_option ) === false ) ) {
                $notice_message .= '<li>' . __( 'Advanced Custom Fields ( ACF ) plugin.', 'advanced-woo-labels' ) . ' <a target="_blank" href="https://advanced-woo-labels.com/guide/advanced-custom-fields-acf-support/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=acf">' . __( 'Learn more', 'advanced-woo-labels' ) . '</a></li>';
                $notice_id .= 'acf|';
            }

            if ( class_exists('WC_Product_Table_Plugin') && ( ! $hide_option || array_search( 'barntable', $hide_option ) === false ) ) {
                $notice_message .= '<li>' . __( 'WooCommerce Product Table by Barn2 plugin.', 'advanced-woo-labels' ) . ' <a target="_blank" href="https://advanced-woo-labels.com/guide/woocommerce-product-table-by-barn2-integration/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=barntable">' . __( 'Learn more', 'advanced-woo-labels' ) . '</a></li>';
                $notice_id .= 'barntable|';
            }

            if ( class_exists('YITH_WCWL') && ( ! $hide_option || array_search( 'yithwish', $hide_option ) === false ) ) {
                $notice_message .= '<li>' . __( 'YITH WooCommerce Wishlist plugin.', 'advanced-woo-labels' ) . ' <a target="_blank" href="https://advanced-woo-labels.com/guide/yith-wishlist-support/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=yithwish">' . __( 'Learn more', 'advanced-woo-labels' ) . '</a></li>';
                $notice_id .= 'yithwish|';
            }

            if ( class_exists( 'WeDevs_Dokan' ) && ( ! $hide_option || array_search( 'dokan', $hide_option ) === false ) ) {
                $notice_message .= '<li>' . __( 'Dokan – WooCommerce Multivendor Marketplace Solution plugin.', 'advanced-woo-labels' ) . ' <a target="_blank" href="https://advanced-woo-labels.com/guide/dokan-woocommerce-multivendor-marketplace/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=dokan">' . __( 'Learn more', 'advanced-woo-labels' ) . '</a></li>';
                $notice_id .= 'dokan|';
            }

            if ( defined( 'PWB_PLUGIN_VERSION' ) && ( ! $hide_option || array_search( 'pbrands', $hide_option ) === false ) ) {
                $notice_message .= '<li>' . __( 'Perfect Brands for WooCommerce plugin.', 'advanced-woo-labels' ) . ' <a target="_blank" href="https://advanced-woo-labels.com/guide/perfect-brands-for-woocommerce/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=pbrands">' . __( 'Learn more', 'advanced-woo-labels' ) . '</a></li>';
                $notice_id .= 'pbrands|';
            }

            if ( ( defined( 'WCMp_PLUGIN_VERSION' ) || defined( 'MVX_PLUGIN_VERSION' ) ) && ( ! $hide_option || array_search( 'multivendorx', $hide_option ) === false ) ) {
                $notice_message .= '<li>' . __( 'MultiVendorX – WooCommerce Multivendor Marketplace plugin.', 'advanced-woo-labels' ) . ' <a target="_blank" href="https://advanced-woo-labels.com/guide/multivendorx/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=multivendorx">' . __( 'Learn more', 'advanced-woo-labels' ) . '</a></li>';
                $notice_id .= 'multivendorx|';
            }

            $notice_id = 'awl_hide_int_notices=' . urlencode( trim( $notice_id, '|' ) );

            if ( $notice_message ) {

                $check_labels = $this->check_labels();
                if ( $check_labels === 'false' ) {
                    return;
                }

                $current_page_url = function_exists('wc_get_current_admin_url') ? wc_get_current_admin_url() : esc_url( admin_url('edit.php?post_type=awl-labels'));
                $dismiss_link = strpos( $current_page_url, '?' ) === false ? $current_page_url . '?' : $current_page_url . '&';

                $html = '';

                $html .= '<div class="awl-integration-notice notice notice-success" style="position:relative;display:flex;">';
                    $html .= '<div style="margin: 20px 20px 0 0;" class="awl-integration-notice--logo">';
                        $html .= '<img style="max-width:70px;border-radius:3px;" src="' . AWL_URL . 'assets/img/logo.jpeg' . '">';
                    $html .= '</div>';
                    $html .= '<div class="awl-integration-notice--content">';
                        $html .= '<h2>Advanced Woo Labels: ' . __( 'Integrations for your plugins', 'advanced-woo-labels' ) . '</h2>';
                        $html .= '<p>' . $notice_top_message. '</p>';
                        $html .= '<ul style="list-style:disc;padding-left:20px;margin:15px 0 18px;">' . $notice_message. '</ul>';
                        $html .= '<a href="https://advanced-woo-labels.com/pro/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=all_pro" target="_blank" class="button button-primary">' . __( 'All PRO Features', 'advanced-woo-labels' ) . '</a>&nbsp;&nbsp;<a href="https://advanced-woo-labels.com/pricing/?utm_source=wp-plugin&utm_medium=integration_notice&utm_campaign=pricing" target="_blank" class="button button-primary">' . __( 'View Pricing', 'advanced-woo-labels' ) . '</a>';
                        $html .= '<div style="margin-bottom:15px;"></div>';
                        $html .= '<a href="' . $dismiss_link . $notice_id . '" title="' . __( 'Dismiss', 'advanced-woo-labels'  ) . '" style="color:#787c82;text-decoration:none;font-size:16px;position:absolute;top:0;right:1px;border:none;margin:0;padding:9px;background:0 0;cursor:pointer;"><span style="font-size:16px;" class="dashicons dashicons-dismiss"></span></a>';
                    $html .= '</div>';
                $html .= '</div>';

                echo $html;

            }

        }
        
        /*
         * Add welcome notice
         */
        public function display_welcome_header() {

            $screen = get_current_screen();

            if ( ! $screen || $screen->id !== 'edit-awl-labels' ) {
                return;
            }

            $labels = AWL_Helpers::get_awl_labels( array( 'post_status' => 'any', 'suppress_filters' => true ) );

            if ( $labels && count( $labels ) > 0 ) {
                return;
            }

            echo AWL_Admin_Meta_Boxes::get_welcome_notice();

        }

        /*
         * Hide admin notices
         */
        public function hide_notices() {

            if ( isset( $_GET['awl_hide_int_notices'] ) && $_GET['awl_hide_int_notices'] ) {
                $option = strpos( $_GET['awl_hide_int_notices'], '|' ) !== false ? explode('|', $_GET['awl_hide_int_notices'] ) : array( $_GET['awl_hide_int_notices'] );
                $option_current = get_option( 'awl_hide_int_notices' );
                $option = $option_current ? array_merge( $option_current, $option ) : $option;
                update_option( 'awl_hide_int_notices', $option, false );
            }

        }

        /*
         * Check if user create any label and its is older then 1 week
         */
        private function check_labels() {

            $show_notice_trans = get_transient( 'aws_labels_date_notices' );

            if ( $show_notice_trans ) {
                return $show_notice_trans;
            }

            $show_notice = 'false';
            $labels = get_posts( array(
                'post_type'              => 'awl-labels',
                'post_status'            => 'publish',
                'posts_per_page'         => 1,
                'orderby'                => 'date',
                'order'                  => 'ASC',
            ) );

            if ( $labels && count( $labels ) > 0 ) {

                $time_pass = time() - get_the_time('U', $labels[0]->ID );
                $days_pass = (int) round((($time_pass/24)/60)/60);

                if ( $days_pass && $days_pass > 7 ) {
                    $show_notice = 'true';
                }

            }

            set_transient( 'aws_labels_date_notices', $show_notice, 60 * 60 * 24 );

            return $show_notice;

        }

    }

endif;


add_action( 'init', 'AWL_Admin_Notices::instance' );