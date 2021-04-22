<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
if ( ClenixTheme::$layout == 'full-width' ) {
	$clenix_layout_class = 'col-sm-12 col-12';
} else {
	$clenix_layout_class = ClenixTheme_Helper::has_active_widget();	
	
}
?>
<div id="primary" class="content-area shop-page">
	<div class="container">
		<div class="row">
			<?php if ( ClenixTheme::$layout == 'left-sidebar' ) { ?>
				<div class="col-lg-4 col-md-12 col-12 fixed-bar-coloum">
					<aside class="sidebar-widget-area">
						<?php if ( is_active_sidebar( 'shop-sidebar-1' ) ) dynamic_sidebar( 'shop-sidebar-1' ); ?>
					</aside>
				</div>
			<?php }	?>
			<div class="<?php echo esc_attr( $clenix_layout_class );?>">
				<main id="main" class="site-main">