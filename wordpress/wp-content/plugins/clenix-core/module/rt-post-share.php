<?php
function clenix_post_share() {

	if( get_post_type() != 'page' ) { 

		$counter      = 0;
		$post_title   = htmlspecialchars( urlencode( html_entity_decode( esc_attr( get_the_title() ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		$share_class  = '';
		$button_class = '';
		$text_class   = '';
		
		# Post link ----------
		$post_link = get_permalink();
		
		# Buttons array ----------
		$share_buttons = array(

			'facebook' => array(
				'url'  => 'http://www.facebook.com/sharer.php?u='. $post_link,
				'text' => esc_html__( 'Facebook', 'clenix-core' ),
			),

			'twitter' => array(
				'url'   => 'https://twitter.com/intent/tweet?text='. $post_title .'&amp;url='. $post_link, 
				'text'  => esc_html__( 'Twitter', 'clenix-core' ),
			),

			'google' => array(
				'url'   => 'https://plusone.google.com/_/+1/confirm?hl=en&amp;url='. $post_link .'&amp;name='. $post_title,
				'text'  => esc_html__( 'Google+', 'clenix-core' ),
			),

			'linkedin' => array(
				'url'   => 'http://www.linkedin.com/shareArticle?mini=true&amp;url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'LinkedIn', 'clenix-core' ),
			),

			'stumbleupon' => array(
				'url'   => 'http://www.stumbleupon.com/submit?url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'StumbleUpon', 'clenix-core' ),
			),

			'tumblr' => array(
				'url'   => 'http://www.tumblr.com/share/link?url='. $post_link .'&amp;name='. $post_title,
				'text'  => esc_html__( 'Tumblr', 'clenix-core' ),
			),

			'pinterest' => array(
				'url'   => 'http://pinterest.com/pin/create/button/?url='. $post_link .'&amp;description='. $post_title .'&amp;media='. clenix_post_img_src( 'clenix-size1' ),
				'text'  => esc_html__( 'Pinterest', 'clenix-core' ),
			),

			'reddit' => array(
				'url'   => 'http://reddit.com/submit?url='. $post_link .'&amp;title='. $post_title,
				'text'  => esc_html__( 'Reddit', 'clenix-core' ),
			),
			
			'email' => array(
				'url'   => 'mailto:?subject='. $post_title .'&amp;body='. $post_link,
				'text'  => esc_html__( 'Share via Email' , 'clenix-core' ),
				'icon'  => 'fa fa-envelope',
			),
			'print' => array(
				'url'   => '#',
				'text'  => esc_html__( 'Print', 'clenix-core' ),
			),
		);
		
		if ( ClenixTheme::$options['post_share_facebook'] == 0 ){
		unset($share_buttons['facebook']);
		}
		if ( ClenixTheme::$options['post_share_twitter'] == 0 ){
		unset($share_buttons['twitter']);
		}
		if ( ClenixTheme::$options['post_share_google'] == 0 ){
		unset($share_buttons['google']);
		}
		if ( ClenixTheme::$options['post_share_linkedin'] == 0 ){
		unset($share_buttons['linkedin']);
		}
		if ( ClenixTheme::$options['post_share_whatsapp'] == 0 ){
		unset($share_buttons['whatsapp']);
		}
		if ( ClenixTheme::$options['post_share_stumbleupon'] == 0){
		unset($share_buttons['stumbleupon']);
		}
		if ( ClenixTheme::$options['post_share_tumblr'] == 0 ){
		unset($share_buttons['tumblr']);
		}
		if ( ClenixTheme::$options['post_share_pinterest'] == 0 ){
		unset($share_buttons['pinterest']);
		}
		if ( ClenixTheme::$options['post_share_reddit'] == 0 ){
		unset($share_buttons['reddit']);
		}
		if ( ClenixTheme::$options['post_share_email'] == 0 ){
		unset($share_buttons['email']);
		}
		if ( ClenixTheme::$options['post_share_print'] == 0 ){
		unset($share_buttons['print']);
		}

		$active_share_buttons = array();

		foreach ( $share_buttons as $network => $button ){
			
				$counter ++;
				$icon = empty( $button['icon'] ) ? 'fa fa-'.$network : $button['icon'];

				# Buttons Style 1 ----------
				if( empty( $share_style )){
					$button_class = '';
					$text_class   = 'screen-reader-text';

					if( $counter <= 2 ){
						$button_class = ' large-share-button';
						$text_class   = 'social-text';
					}
				}

				if( !isset( $button['out_desktop'] )){
					$button['url'] = esc_url( $button['url'] );
				}

				$active_share_buttons[] = '<a href="'. $button['url'] .'" rel="external" target="_blank" class="'. $network.'-share-button' . $button_class .'"><span class="'. $icon .'"></span> <span class="'. $text_class .'">'. $button['text'] .'</span></a>';
		}

		if( is_array( $active_share_buttons ) && ! empty( $active_share_buttons ) ){ ?>
			<div class="share-links <?php echo esc_attr( $share_class ) ?>">
				<?php echo implode( '', $active_share_buttons ); ?>
			</div>
		<?php
		}
		
	}
}
