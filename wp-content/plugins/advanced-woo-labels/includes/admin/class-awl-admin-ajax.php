<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'AWL_Admin_Ajax' ) ) :

    /**
     * Class for plugin admin ajax hooks
     */
    class AWL_Admin_Ajax {

        /*
         * Constructor
         */
        public function __construct() {

            add_action( 'wp_ajax_awl-getRuleGroup', array( $this, 'get_rule_group' ) );

            add_action( 'wp_ajax_awl-getSuboptionValues', array( $this, 'get_suboption_values' ) );

            add_action( 'wp_ajax_awl-changeLabelStatus', array( $this, 'change_label_status' ) );

            add_action( 'wp_ajax_awl-searchForProducts', array( $this, 'search_for_products' ) );

        }

        /*
         * Ajax hook for rule groups
         */
        public function get_rule_group() {

            check_ajax_referer( 'awl_admin_ajax_nonce' );

            $name = sanitize_text_field( $_POST['name'] );
            $group_id = sanitize_text_field( $_POST['groupID'] );
            $rule_id = sanitize_text_field( $_POST['ruleID'] );

            $rules = AWL_Admin_Options::include_rules();
            $html = array();

            foreach ( $rules as $rule_section => $section_rules ) {
                foreach ( $section_rules as $rule ) {
                    if ( $rule['id'] === $name ) {

                        $rule_obj = new AWL_Admin_Label_Rules( $rule, $group_id, $rule_id );

                        $html['aoperators'] = $rule_obj->get_field( 'operator' );

                        if ( isset( $rule['suboption'] ) ) {
                            $html['asuboptions'] = $rule_obj->get_field( 'suboption' );
                        }

                        $html['avalues'] = $rule_obj->get_field( 'value' );

                        break;

                    }
                }
            }

            wp_send_json_success( $html );

        }

        /*
         * Ajax hook for suboption values
         */
        public function get_suboption_values() {

            check_ajax_referer( 'awl_admin_ajax_nonce' );

            $param = sanitize_text_field( $_POST['param'] );
            $suboption = sanitize_text_field( $_POST['suboption'] );
            $group_id = sanitize_text_field( $_POST['groupID'] );
            $rule_id = sanitize_text_field( $_POST['ruleID'] );

            $rules = AWL_Admin_Options::include_rules();
            $html = array();

            foreach ( $rules as $rule_section => $section_rules ) {
                foreach ( $section_rules as $rule ) {
                    if ( $rule['id'] === $param ) {

                        $rule['choices']['params'] = array( $suboption );

                        $rule_obj = new AWL_Admin_Label_Rules( $rule, $group_id, $rule_id );

                        $html = $rule_obj->get_field( 'value' );

                        break;

                    }
                }
            }

            wp_send_json_success( $html );

        }

        /*
         * Ajax hook for label status change
         */
        public function change_label_status() {

            check_ajax_referer( 'awl_admin_ajax_nonce' );

            $id = sanitize_text_field( $_POST['id'] );

            $label_options = AWL()->get_label_settings( $id );
            $label_is_active  = isset( $label_options['awl_label_status'] ) ? $label_options['awl_label_status']['status'] : true;

            if ( $label_is_active  ) {
                $label_options['awl_label_status']['status'] = '0';
            } else {
                $label_options['awl_label_status']['status'] = '1';
            }

            AWL()->update_label_settings( $id, $label_options );

            wp_send_json_success( '1' );

        }

        /*
         * Ajax hook to search for products
         */
        public function search_for_products() {

            check_ajax_referer( 'awl_admin_ajax_nonce' );

            $term = sanitize_text_field( $_POST['search'] );
            $term = (string) wc_clean( wp_unslash( $term ) );

            $products = array();

            $include_variations = false;
            $limit = 30;

            if ( class_exists('WC_Data_Store') ) {

                $data_store = WC_Data_Store::load( 'product' );
                $ids        = $data_store->search_products( $term, '', (bool) $include_variations, false, $limit, array(), array() );

                foreach ( $ids as $id ) {

                    $product_object = wc_get_product( $id );

                    if ( ! wc_products_array_filter_readable( $product_object ) ) {
                        continue;
                    }

                    $formatted_name = $product_object->get_formatted_name();
                    $products[] = array(
                        'id' => $product_object->get_id(),
                        'text' => rawurldecode( wp_strip_all_tags( $formatted_name ) )
                    );

                }

            }

            wp_send_json( array( 'results' => $products ) );

        }

    }

endif;


new AWL_Admin_Ajax();