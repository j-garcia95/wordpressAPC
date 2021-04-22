
<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$clenix_error_img = empty( ClenixTheme::$options['error_bodybanner']['url'] ) ? CLENIX_IMG_URL . '404.png' : ClenixTheme::$options['error_bodybanner']['url'];
?>
<?php get_header();?>
<div id="primary" class="content-area error-page-area" >
	<div class="container">
		<div class="error-page-content">
			<img src="<?php echo esc_url($clenix_error_img); ?>">
			<?php if ( !empty( ClenixTheme::$options['error_text1'] ) ) { ?>
			<h2 class="text-1"><?php echo wp_kses( ClenixTheme::$options['error_text1'] , 'alltext_allow' );?></h2>
			<?php } ?>
			<?php if ( !empty(ClenixTheme::$options['error_text2'])) { ?>
			<p class="text-2"><?php echo wp_kses( ClenixTheme::$options['error_text2'] , 'alltext_allow' );?></p>
			<?php } ?>
			<div class="go-home">
			  <a href="<?php echo esc_url( home_url( '/' ) );?>"><?php echo esc_html( ClenixTheme::$options['error_buttontext'] );?></a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>