=== Advanced Woo Labels - Product Labels for WooCommerce ===
Contributors: Mihail Barinov
Donate link: https://www.paypal.com/donate/?hosted_button_id=FDRDNZE6XAKE8
Tags: plugin, woocommerce, labels, product labels, badges, woocommerce labels, woocommerce badges, shop, store, ecommerce, merketing, products, tags
Requires at least: 4.0
Tested up to: 6.2
Stable tag: 1.72
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Labels plugin for WooCommerce. Create labels/badges with custom styles and text for any of your WooCommerce products.

== Description ==

With the Advanced Woo Labels plugin you can easily create labels/badges for any of your WooCommerce products. Use label conditions to show labels only for specific product, page or user. Customize labels styles with build-in options.
Attract users attention by displaying inside labels information like **discount value**, **product quantity**, **product rating**, **shipping class**, **stock status**, **sale status**,  etc.

[Plugin home page](https://advanced-woo-labels.com/?utm_source=wp-repo&utm_medium=listing&utm_campaign=awl-repo) | [Features List](https://advanced-woo-labels.com/features/?utm_source=wp-repo&utm_medium=listing&utm_campaign=awl-repo)

= Main Features =

* Create **unlimited number** of labels for each WooCommerce product.
* Display label in **two positions**: on product image or before title. Align label at any side of this position.
* Use labels with **custom text**. Write any text inside product labels. Also use special **text variables** to show important product information like Price, Sale price, Discount percentage, Discount amount, SKU, Quantity.
* Choose from **5 different text label shapes**. Set unique styles for each of them with help of custom styling options.
* **Label groups**. Show several labels for one product. Set maximal number of such labels, their alignment, priority, distance between them.
* **Label conditions**. Show labels based on specific product, page or user conditions. Combine conditions to 'AND' and 'OR' groups to create more complex label rules.
* Create unlimited label variations with **advanced styling options**: change label color, font color, font size, opacity, paddings and margins, set any other custom css individually for each label.
* Cool admin panel with labels live preview.
* Special option to **change hooks** that used to display product labels if your theme has some problem with showing them or if you want to change labels position.
* Page builder plugins support: Gutenberg, Elementor, Beaver Builder, WPBakery, Divi Builder.

= Premium Features =

Additional features available only in PRO plugin version.

* **Image labels**. Use one of predefined images as a product label or upload your custom one. Additionally it is possible to use SVG images.
* **Emojis support**: Use any emoji inside the text label. Mix theme with text variables, plain text or other emojis.
* **More product conditions**: show WooCommerce labels based on product type, age, sale date, sales number, taxonomy, attributes, custom fields, etc.
* **More user conditions**: show labels only for users from certain countries, with specific devices, language, based on products in the cart or specific shop stats ( example: average products costs inside cart ).
* **Page conditions**: show labels only on specific page templates, page types or archive pages.
* **Date conditions**: show labels only on certains dates, time or day of week.
* **More text variables**: attributes, taxonomies, custom fields, sales number, reviews number, rating.
* **Labels styling**: borders, shadows, additional shapes.
* **Label links**: add any custom link inside your label. So now your product labels not just tell users some important information but can contain some useful links.
* **ACF plugin support**: advanced integration with Advanced Custom Fields plugin. Show value of any ACF field inside label. Also set label display conditions based on ACF fields values.
* **WCFM plugin support**: advanced integration with WCFM Multivendor Marketplace plugin. Show vendor related data inside product labels and create special labels display conditions based on these data.
* **Dokan plugin support**: advanced integration with Dokan WooCommerce Multivendor Marketplace. Show product vendor information inside labels and use label display conditions based on Dokan vendor data.
* **MultiVendorX plugin support**: advanced integration with MultiVendorX Multivendor Marketplace.

= Plugin Links =

[Home Page](https://advanced-woo-labels.com/?utm_source=wp-repo&utm_medium=listing&utm_campaign=awl-repo)
[Features List](https://advanced-woo-labels.com/features/?utm_source=wp-repo&utm_medium=listing&utm_campaign=awl-repo)
[Pricing](https://advanced-woo-labels.com/pricing/?utm_source=wp-repo&utm_medium=listing&utm_campaign=awl-repo)
[Docs](https://advanced-woo-labels.com/guide/?utm_source=wp-repo&utm_medium=listing&utm_campaign=awl-repo)
[Demo](https://demo.advanced-woo-labels.com/)

== Installation ==

1. Upload advanced-woo-labels to the /wp-content/plugins/ directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Adv. Woo Label -> Add New page and create your first label 

== Frequently Asked Questions ==

= Why do I need this plugin? =

This plugin is great to attract visitors attention to some of your products and to promote any of them.
Also labels may contain some additional product information that can be useful for your customers.

= Is it compatible with my WordPress themes? =

Plugin was built in such a way that it must work well with almost any WordPress theme. If themes are developed according to WordPress and WooCommerce guidelines ( it is using appropriate hooks ) then you will don't have any problem with it.
But if you still face any issue please use a plugin support forum to describe your problem there.

= Is this plugin compatible with the latest version of Woocommerce? =

Yep. This plugin is always compatible with the latest version of Woocommerce.

= Is it possible to apply multiple labels to a product? =

Yes, for any WooCommerce product you can display an unlimited number of different plugin labels. Also, inside the plugin settings page it is possible to set a maximal number of labels per product.

= Can I choose what products labels must be displayed? =

Sure. For any created label you can create special conditions rules that will describe on what products, pages and for what users these labels must be displayed. 
There is a large variety of such conditions and more information you can find [here](https://advanced-woo-labels.com/guide/label-conditions/). 

= Can I show inside labels text some values like product discount or quantity? =

Yes, you can use plugin [text variables](https://advanced-woo-labels.com/guide/text-variables/) to show a variety of different product parameters like price, discount value, sku, quantity, sales number, reviews, rating, attributes, etc.

== Screenshots ==

1. Labels and labels groups
2. Create unlimited number of labels and display theme everywhere
3. Show labels on product details page
4. Labels styling options
5. Labels styling options. Admin page
6. Labels positions
7. Change labels text and use special text variables
8. Labels edit page. Text option
9. Labels conditions options
10. Labels conditions. Admin page
11. Admin labels page

== Changelog ==

= 1.72 ( 10.07.2023 ) =
* Update - Support for Elementor plugin. Enable labels for image, featured image elements

= 1.71 ( 26.06.2023 ) =
* Add - Support for Bricks Builder theme
* Update - Tested with WC 7.8

= 1.70 ( 12.06.2023 ) =
* Add - Admin page error notices for incorrect label display rules

= 1.69 ( 29.05.2023 ) =
* Update - Integration with WooLentor plugin
* Update - Support for Flatsome theme. Fix single product page labels display
* Dev - Add label_js_selector parameter for labels js placement
* Dev - Add awl_labels_single_type_hooks filter

= 1.68 ( 15.05.2023 ) =
* Add - Support for WooCommerce custom orders tables
* Update - Tested with WC 7.7
* Update - Support for WPML plugin. Fix label display conditions related to translated terms
* Update - Flatsome theme support. Fix labels display for quick view pop-up
* Fix - Duplicated labels for WPML plugin
* Dev - Add awl_label_options_get_tax_terms filter
* Dev - Add awl_label_condition_match_rule filter
* Dev - Add awl_label_condition_rule filter

= 1.67 ( 01.05.2023 ) =
* Fix - Strip html entities from label text value

= 1.66 ( 17.04.2023 ) =
* Update - Tested with WC 7.6
* Update - Support for Flatsome theme
* Fix - Flatsome theme broken products links with link labels

= 1.65 ( 03.04.2023 ) =
* Fix - Bug with awl_get_product_labels shortcode execution

= 1.64 ( 20.03.2023 ) =
* Update - Tested with WC 7.5

= 1.63 ( 06.03.2023 ) =
* Add - WP-CLI support

= 1.62 ( 20.02.2023 ) =
* Add - Support for Basel theme
* Add - Support for Blocksy theme
* Update - Tested with WC 7.4
* Update - Support for WooCommerce Gutenberg blocks

= 1.61 ( 06.02.2023 ) =
* Update - Admin page notices
* Update - Support for Total theme

= 1.60 ( 23.01.2023 ) =
* Update - Tested with WC 7.3

= 1.59 ( 09.01.2023 ) =
* Update - Tested with WC 7.2
* Update - Labels settings page

= 1.58 ( 12.12.2022 ) =
* Update - Labels settings page
* Update - Admin settings page styles

= 1.57 ( 28.11.2022 ) =
* Add - Support for WooCommerce Gutenberg blocks
* Update - Formatting for price text variable
* Update - XStore theme support
* Update - Astra theme support
* Fix - Ajax search for products for label editor
* Fix - Product Filter for WooCommerce by XforWooCommerce plugin ajax filters bug

= 1.56 ( 14.11.2022 ) =
* Add - Support for Additional Variation Images Gallery for WooCommerce plugin
* Add - New label style options: Font weight and Letter spacing
* Update - Tested with WC 7.1
* Update - Support for Flatsome theme
* Dev - Add awl_settings_field_{field_id} filter

= 1.55 ( 31.10.2022 ) =
* Update - Support for XStore theme
* Dev - Add awl_compare_condition_values helper function

= 1.54 ( 17.10.2022 ) =
* Update - Admin notices
* Update - Tested with WC 7.0

= 1.53 ( 19.09.2022 ) =
* Add - Support for Uncode theme
* Update - Tested with WC 6.9

= 1.52 ( 05.09.2022 ) =
* Update - Support for Product Gallery Slider for Woocommerce ( Formerly Twist ) plugin

= 1.51 ( 22.08.2022 ) =
* Update - Tested with WC 6.8

= 1.50 ( 08.08.2022 ) =
* Update - Admin dashboard plugin notices

= 1.49 ( 25.07.2022 ) =
* Add - Unlimited Elements For Elementor plugin support
* Update - Tested with WC 6.7
* Update - Integration with YITH WooCommerce Dynamic Pricing and Discounts plugin
* Update - awl_get_product_labels shortcode. Add option to set product id
* Fix - Bug with sale discount condition rule
* Fix - Labels preview view styles

= 1.48 ( 11.07.2022 ) =
* Update - Support for Avada theme
* Fix - Condition rules for product price with decimal values
* Fix - Labels shapes view on mobile devices

= 1.47 ( 27.06.2022 ) =
* Update - Tested with WC 6.6
* Update - Settings page descriptions

= 1.46 ( 13.06.2022 ) =
* Add - Support for Product Gallery Slider for Woocommerce ( Formerly Twist ) plugin

= 1.45 ( 30.05.2022 ) =
* Add - New option - disable all labels hooks and instead place product labels manually
* Add - awl_get_product_labels, awl_get_label_by_id shortcodes
* Dev - Add awl_get_labels_html_by_position, awl_get_label_html_by_id functions

= 1.44 ( 16.05.2022 ) =
* Add - Support for WooCommerce Product Table by Barn2 plugin
* Update - Tested with WC 6.5
* Update - Admin page notices
* Dev - Add awl_show_labels_for_product filter
* Dev - Add awl_hide_for_barn2_tables filter

= 1.43 ( 25.04.2022 ) =
* Add - Integration for WooThumbs for WooCommerce by Iconic plugin
* Update - Tested with WC 6.4

= 1.42 ( 11.04.2022 ) =
* Add - Royal theme integration
* Update - Integration with Advanced Woo Search plugin
* Update - Styles for labels with vertical direction

= 1.41 ( 22.03.2022 ) =
* Update - Tested with WC 6.3

= 1.40 ( 21.02.2022 ) =
* Update - Tested with WC 6.2
* Update - Support for Divi builder. Display labels for gallery images insude single product page
* Update - Change label display rules based on product. Do not load all available products at once

= 1.39 ( 07.02.2022 ) =
* Update - Styles for admin page welcome message
* Fix - Bug with admin page scripts loader
* Fix - Custom css label option. Add possibility to set styles for labels wrapper

= 1.38 ( 24.01.2022 ) =
* Add - Admin page notices
* Update - Tested with WC 6.1

= 1.37 ( 10.01.2022 ) =
* Update - Plugin admin page text

= 1.36 ( 27.12.2021 ) =
* Update - Labels admin visibility for certain user roles
* Update - Tested with WC 6.0
* Update - Support for Divi theme and Divi builder

= 1.35 ( 13.12.2021 ) =
* Update - Labels admin preview
* Fix - Hide labels with empty text field
* Fix - Support for Advanced Woo Search plugin. Remove duplicated labels

= 1.34 ( 22.11.2021 ) =
* Fix - Bug with incorrect label discount value for scheduled sales

= 1.33 ( 09.11.2021 ) =
* Add - Support for Beaver builder plugin
* Update - Allow decimal numbers for product price display rules
* Update - Tested with WC 5.9

= 1.32 ( 25.10.2021 ) =
* Add - Support for JetEngine, JetWooBuilder For Elementor plugins
* Update - Tested with WC 5.8
* Update - Support for YITH WooCommerce Dynamic Pricing and Discounts plugin. Fix wrong discount value bug

= 1.31 ( 11.10.2021 ) =
* Add - Support for XStore theme
* Update - Tested with WC 5.7
* Fix - Bug with not expired cache for labels data
* Fix - Bug with not loaded functions for the admin area

= 1.30 ( 21.09.2021 ) =
* Add - Support for YITH WooCommerce Dynamic Pricing and Discounts plugin
* Update - Woo Discount Rules plugin support
* Dev - Add awl_is_on_sale filter

= 1.29 ( 31.08.2021 ) =
* Update - Elementor support. Change labels display hooks
* Update - Woodmart theme labels display for images gallery
* Dev - Update labels options save function

= 1.28 ( 23.08.2021 ) =
* Add - Rehub theme support
* Update - Tested with WC 5.6

= 1.27 ( 02.08.2021 ) =
* Update - Support for Flatsome theme. Fix labels display for image gallery

= 1.26 ( 19.07.2021 ) =
* Update - Support for Elementor plugin. New option to disable labels for any Products block. New label display condition option - Is Elementor block.
* Update - Tested with WC 5.5

= 1.25 ( 05.07.2021 ) =
* Fix - Bug with incorrect discounts calculation
* Fix - Support for Product Slider for WooCommerce plugin

= 1.24 ( 21.06.2021 ) =
* Add - Support for Advanced Woo Search plugin
* Fix - Issue with not showing labels
* Fix - Discount text variables. Show discount value even if the product is not on sale.
* Update - Tested with WC 5.4

= 1.23 ( 07.06.2021 ) =
* Add - Woo Discount Rules plugin support
* Fix - Issues with WPML plugin labels duplicates
* Dev - Add awl_label_text_var_value filter
* Dev - Add awl_label_condition_compare_value filter
* Dev - Add awl_product_price filter
* Dev - Add awl_product_sale_price filter


= 1.22 ( 24.05.2021 ) =
* Add - Product Slider for WooCommerce plugin support
* Update - Tested with WC 5.3
* Update - Plugin settings page
* Dev - Update labels settings

= 1.21 ( 10.05.2021 ) =
* Dev - Add awl_labels_condition_rules filter
	
= 1.20 ( 27.04.2021 ) =
* Update - Woolementor plugin support</li>
* Update - Tested with WC 5.2</li>
* Update - SAVE_AMOUNT and SAVE_PERCENT text variables. Make it work with custom product types</li>
* Fix - Display conditions for product variations</li>

= 1.19 ( 12.04.2021 ) =
* Add - Woolementor plugin support
* Add - Support for JetWooBuilder For Elementor plugin
* Update - Flatsome theme integration
* Fix - Hooks settings rewrite issue
* Fix - Use localtime instead of UTF time
* Fix - Quantity label condition
* Dev - Add awl_js_container_selectors filter

= 1.18 ( 29.03.2021 ) =
* Add - Oxygen Builder plugin support
* Fix - Parent theme name detection

= 1.17 ( 15.03.2021 ) =
* Add - Support for WooLentor – WooCommerce Elementor Addons + Builder plugin
* Update - Astra theme support. Remove default out-of-stock labels if needed
* Fix - Labels display when AJAX load is using
* Fix - Bug with not displayed labels on archive and single product pages
* Dev - Add awl_enable_labels filter

= 1.16 ( 01.03.2021 ) =
* Update - Elementor plugin support. Add integration for single product template

= 1.15 ( 15.02.2021 ) =
* Add - Integration for BoxShop theme
* Update - Text variables. Add {REGULAR_PRICE} text variable

= 1.14 ( 02.02.2021 ) =
* Fix - Bug with not displayed labels when using Jet Smart Filters plugin
* Dev - Add extra check for $product object before showing labels
* Dev - Update number_per_product and  number_per_position options default values

= 1.13 ( 18.01.2021 ) =
* Add - Integration for Martfury theme
* Add - Support for Elementor posts blocks when showing products
* Dev - JS labels integration. Add timeout

= 1.12 ( 04.01.2021 ) =
* Add - Support for Stockie theme
* Update - Label settings page. Add link to the plugin docs about text variables

= 1.11 ( 14.12.2020 ) =
* Add - Support for Flatsome theme quick view lightbox
* Update - Flatsome theme integration

= 1.10 ( 30.11.2020 ) =
* Add - Welcome message
* Update - Admin dashboard links
* Update - Woodmart theme support
* Dev - Update constants declaration

= 1.09 ( 16.11.2020 ) =
* Add - Support for Konado theme
* Update - Flatsome theme integration

= 1.08 ( 02.11.2020 ) =
* Fix - Divi Builder integration
* Dev - Add awl_admin_page_options filter filter
* Dev - Add awl_label_admin_options filter
* Dev - Add awl_current_label_markup filter

= 1.07 ( 19.10.2020 ) =
* Update - Oxygen theme support
* Fix - Discount calculation for product variations
* Dev - Add awl_show_label_for_product filter
* Dev - Add awl_show_labels_for_product filter

= 1.06 ( 06.10.2020 ) =
* Update - Support for The Gem theme
* Fix - Discount calculations for variable products

= 1.05 ( 21.09.2020 ) =
* Update - Labels admin quick edit links
* Update - WooCommerce compatible version

= 1.04 ( 07.09.2020 ) =
* Update - Plugin settings page
* Fix - Bug with label settings with zero value
* Fix - Display labels inside Elementor plugin preview window

= 1.03 ( 24.08.2020 ) =
* Add – Styles for select2 library
* Add - Portuguese (Brazil) translation
* Update – WooCommerce supported version
* Fix – Label condition options for product attributes

= 1.02 ( 12.08.2020 ) =
* Update – Ajax calls
* Update – Add advanced select for large values
* Add - Pro version tab

= 1.01 ( 27.07.2020 ) =
* Add - Ajax toggle for label status
* Update - Improve support for Twenty Twenty theme
* Update - Color picker script

= 1.00 ( 13.07.2020 ) =
* First Release