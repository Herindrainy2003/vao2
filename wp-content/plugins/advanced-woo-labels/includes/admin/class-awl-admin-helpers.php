<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'AWL_Admin_Helpers' ) ) :

    /**
     * Class for admin help methods
     */
    class AWL_Admin_Helpers {

        /*
         * Get available stock statuses
         * @return array
         */
        static public function get_stock_statuses() {

            $options = array();

            if ( function_exists( 'wc_get_product_stock_status_options' ) ) {
                $values = wc_get_product_stock_status_options();
            } else {
                $values = apply_filters(
                    'woocommerce_product_stock_status_options',
                    array(
                        'instock'     => __( 'In stock', 'woocommerce' ),
                        'outofstock'  => __( 'Out of stock', 'woocommerce' ),
                        'onbackorder' => __( 'On backorder', 'woocommerce' ),
                    )
                );
            }

            foreach ( $values as $value_val => $value_name ) {
                $options[$value_val] = $value_name;
            }

            return $options;

        }

        /*
         * Get available product visibilities
         * @return array
         */
        static public function get_visibilities() {

            $options = array();

            if ( function_exists( 'wc_get_product_visibility_options' ) ) {
                $values = wc_get_product_visibility_options();
            } else {
                $values = apply_filters(
                    'woocommerce_product_visibility_options',
                    array(
                        'visible' => __( 'Shop and search results', 'woocommerce' ),
                        'catalog' => __( 'Shop only', 'woocommerce' ),
                        'search'  => __( 'Search results only', 'woocommerce' ),
                        'hidden'  => __( 'Hidden', 'woocommerce' ),
                    )
                );
            }

            foreach ( $values as $value_val => $value_name ) {
                $options[$value_val] = $value_name;
            }

            return $options;

        }

        /*
         * Get available products
         * @return array
         */
        static public function get_products() {

            $options = array();

            $args = array(
                'posts_per_page' => -1,
                'post_type'      => 'product'
            );

            $products = get_posts( $args );

            if ( ! empty( $products ) ) {
                foreach ( $products as $product ) {
                    $options[$product->ID] = $product->post_title;
                }
            }

            return $options;

        }

        /*
         * Get specific product
         * @return array
         */
        static public function get_product( $id = 0 ) {

            $options = array();

            if ( $id ) {
                $product_object = wc_get_product( $id );
                if ( $product_object ) {
                    $formatted_name = $product_object->get_formatted_name();
                    $options[$id] = rawurldecode( wp_strip_all_tags( $formatted_name ) );
                }
            }

            return $options;

        }

        /*
         * Get available taxonomies_terms
         * @param $name string Tax name
         * @return array
         */
        static public function get_tax_terms( $name = false ) {

            if ( ! $name ) {
                return false;
            }

            $tax = get_terms( array(
                'taxonomy'   => $name,
                'hide_empty' => false,
            ) );

            $options = array();

            if ( $name && $name === 'product_shipping_class' ) {
                $options['none'] = __( "No shipping class", "advanced-woo-labels" );
            }

            if ( ! empty( $tax ) ) {
                foreach ( $tax as $tax_item ) {
                    $options[$tax_item->term_id] = $tax_item->name;
                }
            }

            /**
             * Filter options array of taxonomy terms
             * @since 1.68
             * @param array $options Terms array
             * @param string $name Taxonomy name
             */
            $options = apply_filters( 'awl_label_options_get_tax_terms', $options, $name );

            return $options;

        }

        /*
         * Get available sale discount formats
         * @return array
         */
        static public function get_sale_discount() {

            $options = array();

            $values = array(
                'percents' => __( 'percents', 'advanced-woo-labels' ),
                'amount'   => __( 'amount', 'advanced-woo-labels' ),
            );

            foreach ( $values as $value_val => $value_name ) {
                $options[$value_val] = $value_name;
            }

            return $options;

        }

        /*
         * Get all available pages
         * @return array
         */
        static public function get_pages() {

            $pages = get_pages( array( 'parent' => 0, 'hierarchical' => 0 ) );
            $options = array();

            if ( $pages && ! empty( $pages ) ) {

                foreach( $pages as $page ) {

                    $title = $page->post_title ? $page->post_title :  __( "(no title)", "advanced-woo-labels" );

                    $options[$page->ID] = $title;

                    $child_pages = get_pages( array( 'child_of' => $page->ID ) );

                    if ( $child_pages && ! empty( $child_pages ) ) {

                        foreach( $child_pages as $child_page ) {

                            $page_prefix = '';
                            $parents_number = sizeof( $child_page->ancestors );

                            if ( $parents_number && is_int( $parents_number ) ) {
                                $page_prefix = str_repeat( "-", $parents_number );
                            }

                            $title = $child_page->post_title ? $child_page->post_title :  __( "(no title)", "advanced-woo-labels" );
                            $title = $page_prefix . $title;

                            $options[$child_page->ID] = $title;

                        }

                    }

                }

            }

            return $options;

        }

        /*
         * Get all available users
         * @return array
         */
        static public function get_users() {

            $users = get_users();
            $options = array();

            if ( $users && ! empty( $users ) ) {
                foreach( $users as $user ) {
                    $options[$user->ID] = $user->display_name . ' (' . $user->user_nicename . ')';
                }
            }

            return $options;

        }

        /*
         * Get all available user roles
         * @return array
         */
        static public function get_user_roles() {

            global $wp_roles;

            $roles = $wp_roles->roles;
            $options = array();

            if ( $roles && ! empty( $roles ) ) {

                if ( is_multisite() ) {
                    $options['super_admin'] = __( 'Super Admin', 'advanced-woo-labels' );
                }

                foreach( $roles as $role_slug => $role ) {
                    $options[$role_slug] = $role['name'];
                }

                $options['non-logged'] = __( 'Visitor ( not logged-in )', 'advanced-woo-labels' );

            }

            return $options;

        }

        /*
         * Get available price formats
         * @return array
         */
        static public function get_price() {

            $options = array();

            $values = array(
                'current' => __( 'Current', 'advanced-woo-labels' ),
                'sale'    => __( 'Sale', 'advanced-woo-labels' ),
                'regular' => __( 'Regular', 'advanced-woo-labels' ),
            );

            foreach ( $values as $value_val => $value_name ) {
                $options[$value_val] = $value_name;
            }

            return $options;

        }

        /*
         * Get available sales number periods
         * @return array
         */
        static public function get_time_periods() {

            $options = array();

            $values = array(
                'all'   => __( 'all time', 'advanced-woo-labels' ),
                'hour'  => __( 'last 24 hours', 'advanced-woo-labels' ),
                'week'  => __( 'last 7 days', 'advanced-woo-labels' ),
                'month' => __( 'last month', 'advanced-woo-labels' ),
                'year'  => __( 'last year', 'advanced-woo-labels' ),
            );

            foreach ( $values as $value_val => $value_name ) {
                $options[$value_val] = $value_name;
            }

            return $options;

        }

        /*
         * Get available week days
         * @return array
         */
        static public function get_week_days() {

            $options = array();

            $values = array(
                'monday'    => __( 'Monday', 'advanced-woo-labels' ),
                'tuesday'   => __( 'Tuesday', 'advanced-woo-labels' ),
                'wednesday' => __( 'Wednesday', 'advanced-woo-labels' ),
                'thursday'  => __( 'Thursday', 'advanced-woo-labels' ),
                'friday'    => __( 'Friday', 'advanced-woo-labels' ),
                'saturday'  => __( 'Saturday', 'advanced-woo-labels' ),
                'sunday'    => __( 'Sunday', 'advanced-woo-labels' ),
            );

            foreach ( $values as $value_val => $value_name ) {
                $options[$value_val] = $value_name;
            }

            return $options;

        }

        /*
        * Get active site languages
        * @return array
        */
        static public function get_languages() {

            $options = array();

            if ( AWL_Helpers::is_lang_plugin_active() ) {

                if ( has_filter('wpml_active_languages') ) {

                    $languages = apply_filters( 'wpml_active_languages', NULL );
                    if ( $languages ) {

                        foreach ( $languages as $languages_code => $languages_arr ) {
                            $options[$languages_code] = isset( $languages_arr['native_name'] ) && $languages_arr['native_name'] ? $languages_arr['native_name'] : $languages_code;
                        }
                    }
                }

                elseif ( ( $enabled_languages = get_option('qtranslate_enabled_languages') ) && function_exists( 'qtranxf_getLanguage' ) ) {

                    foreach ( $enabled_languages as $enabled_languages_code ) {
                        $options[$enabled_languages_code] = $enabled_languages_code;
                    }

                }

            }

            return $options;

        }

        /*
         * Sanitize tag
         * @return string
         */
        static public function sanitize_tag( $text ) {
            $text = str_replace( array( '][', ']', '[', '_' ), '-', $text );
            $text = trim( sanitize_title( $text ), '-' );
            return $text;
        }

        /*
         * Get default text variables description
         * @return string
         */
        static public function get_default_text_variables() {

            $text = '{PRICE} - ' . __( "current product price", "advanced-woo-labels" ) . '<br>' .
            '{REGULAR_PRICE} - ' . __( "regular price ( without sale )", "advanced-woo-labels" ) . '<br>' .
            '{SAVE_PERCENT} - ' . __( "discount percentage", "advanced-woo-labels" ) . '<br>' .
            '{SAVE_AMOUNT|2} - ' . __( "discount amount", "advanced-woo-labels" ) . '<br>' .
            '{SALE_ENDS} - ' . __( "days left for sale", "advanced-woo-labels" ) . '<br>' .
            '{SYMBOL} - ' . __( "currency symbol", "advanced-woo-labels" ) . '<br>' .
            '{SKU} - ' . __( "product SKU", "advanced-woo-labels" ) . '<br>' .
            '{QTY} - ' . __( "product quantity", "advanced-woo-labels" ) . '<br>' .
            '{BR} - ' . __( "new line", "advanced-woo-labels" ) . '<br>' .
            AWL_Admin_Helpers::get_custom_text_variables() .
            __( "for more info visit", "advanced-woo-labels" ) . '<a target="_blank" href="https://advanced-woo-labels.com/guide/text-variables/?utm_source=plugin&utm_medium=settings&utm_campaign=awl-pro-plugin"> ' . __( "guide page", "advanced-woo-labels" ) . '</a>';

            return $text;

        }

        /*
         * Get custom text variables description
         * @return string
         */
        static public function get_custom_text_variables() {

            $variables = apply_filters( 'awl_labels_text_vars', array() );
            $variables_desc = '';

            if ( $variables && is_array( $variables ) ) {
                foreach( $variables as $variable ) {
                    if ( isset( $variable['desc'] ) && is_string( $variable['desc'] ) ) {
                        $variables_desc .= stripslashes( $variable['desc'] ) . '<br>';
                    }
                }
            }

            return $variables_desc;

        }

        /*
         * Check for incorrect label display conditions and return them
         * @return string
         */
        static public function check_for_incorrect_display_rules( $label ) {

            $incorrect_rules_string = '';
            $check_rules = array( 'product', 'user', 'user_role', 'page', 'page_template' );

            if ( $label && isset( $label['conditions'] ) ) {
                foreach ( $label['conditions'] as $cond_group ) {

                    $maybe_wrong_rules = array();

                    foreach ( $cond_group as $cond_rule ) {
                        $rule_name = $cond_rule['param'];
                        if ( array_search( $rule_name, $check_rules ) !== false && $cond_rule['operator'] === 'equal' ) {
                            $maybe_wrong_rules[$rule_name][] = $cond_rule;
                        }
                        if ( isset( $maybe_wrong_rules[$rule_name] ) && count( $maybe_wrong_rules[$rule_name] ) > 1 ) {
                            foreach ( $maybe_wrong_rules[$rule_name] as $rule ) {
                                $rule_value = isset( $rule['value']  ) ? $rule['value'] : '';
                                $incorrect_rules_string .= $rule['param'] . ' -> ' . 'equal to' . ' -> ' . $rule_value .  '<br>';
                            }
                            break;
                        }
                    }

                    if ( $incorrect_rules_string ) {
                        break;
                    }

                }
            }

            return $incorrect_rules_string;

        }

    }

endif;