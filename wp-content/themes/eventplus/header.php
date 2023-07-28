<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
	
<?php
	$wide_boxed=get_theme_mod('wide_boxed','wide');
	if($wide_boxed == "boxed")
	{ $class="boxed"; }
	else
	{ $class="wide"; }
	?>

<?php 
	$front_pallate_enable = get_theme_mod('front_pallate_enable');
	if($front_pallate_enable == '1') {
?>	
		<body <?php body_class($class); ?>  onload="noStyleChange()">
	<?php }else{ ?>
		<body <?php body_class($class); ?>>
	<?php } ?>
<?php 
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'eventplus' ); ?></a>
	<div class="header-wrap">
		<?php
		get_template_part('sections/eventplus','above_header');
		get_template_part('sections/eventplus','header'); 		
		?>
	</div>
	<?php 
	if ( !is_page_template( 'templates/template-homepage.php' ) ) {
			eventpress_breadcrumbs_style(); 
		}
	?>
	<div id="content">