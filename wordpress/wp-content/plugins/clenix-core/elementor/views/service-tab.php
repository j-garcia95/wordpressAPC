<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\Clenix_Core;

use ClenixTheme;
use ClenixTheme_Helper;
use \WP_Query;

$thumb_size = 'clenix-size6';
$thumb_size1 = 'clenix-size7';
$args = array(
    'post_type'      => "clenix_service",
    'posts_per_page' => $data['number'],
    'orderby'        => $data['orderby'],
    'paged' => 1
);
if ( !empty( $data['cat'] ) ) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => "clenix_service_category",
            'field' => 'term_id',
            'terms' => $data['cat'],
 
        )
    );
}
switch ( $data['orderby'] ) {
    case 'title':
    case 'menu_order':
    $args['order'] = 'ASC';
    break;
}
 
$query = new WP_Query( $args );
$temp = ClenixTheme_Helper::wp_set_temp_query( $query );
?>
<?php if ( $query->have_posts() ) :?>      
<div class="service-tab-layout slick-carousel-wrap" data-slide-count="<?php echo absint( $data['tab_number'] ); ?>">
	<?php 
	$tabs = null;
	$content= null;            
	while ( $query->have_posts() ) : $query->the_post();?>
		<?php
			$id                     = get_the_id();   
			$tab_icon               = get_post_meta( $id, "clenix_service_icon", true );  
			$tab_img      			= get_post_meta( $id, "clenix_service_img", true ); 
			$tab_img_hover      	= get_post_meta( $id, "clenix_service_img_hover", true ); 
			$service_price      	= get_post_meta( $id, "clenix_service_price", true ); 
			$service_price_unit    	= get_post_meta( $id, "clenix_service_price_unit", true ); 
			
			$bgimgid_holder         = '';
			if( $tab_img ){
				$bgimgid_holder  = wp_get_attachment_image( $tab_img, array( "class" => "normal-img img-responsive" ) );
				//$bgimgid_holder       = get_the_post_thumbnail( $id, $thumb_size1 );	
			}
			if ( empty($tab_img) ){  
				$bgimgid_holder       = '<i class="'.$tab_icon .'"></i>';
			}
			
			$shortcontent 		= ClenixTheme_Helper::get_current_post_content();
			$shortcontent 		= wp_trim_words( $shortcontent, $data['count'], '' );
			$buttontext         = $data['buttontext'];
			$buttonurl          = $data['buttonurl']; 
			if ( $buttonurl  ){ 
				$buttonurl = $data['buttonurl'];                           
			}elseif ( has_post_thumbnail()) {                           
				$buttonurl = get_the_permalink();
			}
			$bgimgid_holder_hover = '';
			if ( !empty( $tab_img_hover ) ){
				$bgimgid_holder_hover  = wp_get_attachment_image( $tab_img_hover, array( "class" => "bg-hover img-responsive" ) );
			}			
			
			$tabs .= '<div class="nav-item"> '. $bgimgid_holder . $bgimgid_holder_hover . get_the_title() .'</div>';
			$content .= '<div class="single-item">
						<div class="media media-none--lg">
							<div class="media-body">
								<h2 class="item-title">'. get_the_title() .'</h2>
								<p>'. esc_html($shortcontent).'</p>
								<ul class="list-item">
								<li>';
								if($data['price_display'] == 'yes'){
									$content .= '<div class="item-text">
										<p class="item-price"><span>'. esc_html($service_price_unit).' </span> '. esc_html($service_price).'</p>
										<p class="item-start">'.esc_html( 'Start From', 'clenix-core' ). '</p>
									</div>';
									} 
								$content .= '</li><li>';
								
								if($data['read_more'] == 'yes'){
								$content .= '<a href="'. esc_url($buttonurl).'" class="clenix-button-2">'.esc_html( $buttontext) . '</a>';
								}
								$content .= ' </li></ul>
								<div class="ctg-item-icon">'.($bgimgid_holder).'</div>
							</div>
							<div class="item-img"> '.get_the_post_thumbnail( $id , $thumb_size, array( 'class' => 'alignleft' ) ).'</div>
						</div>
					</div>';
			?>
			<?php endwhile;?>
		<div class="nav-wrap carousel-nav"><?php echo $tabs; ?></div>
		<div class="carousel-content"><?php echo $content; ?></div>
	<?php endif;?>
</div>
<?php ClenixTheme_Helper::wp_reset_temp_query( $temp );?>