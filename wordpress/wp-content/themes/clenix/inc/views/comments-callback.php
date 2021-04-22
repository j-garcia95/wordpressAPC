<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';?>
<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent main-comments' : 'main-comments', $comment ); ?>>
<div id="respond-<?php comment_ID(); ?>" class="each-comment">
	<?php if ( get_option( 'show_avatars' ) ): ?>
		<div class="<?php if ( is_rtl() ) { ?>pull-right<?php } else { ?>pull-left<?php } ?> imgholder">
			<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], "", false, array( 'class'=>'media-object' ) ); ?>
		</div>
	<?php endif; ?>
	<div class="media-body comments-body">
		<div class="comment-meta">
			<?php
			comment_reply_link( array_merge( $args, array(
				'add_below' => 'respond',
				'depth'     => $depth,
				'max_depth' => $args['max_depth'],
				'before'    => '<div class="replay-area">',
				'after'     => '</div>'
				) ) );
			?>
			<div class="comment-author-name"><span><?php echo get_comment_author_link( $comment );?></span> <?php printf( esc_html__( '%1$s', 'clenix' ), get_comment_date( '', $comment ) );?></div>			
		</div>
		<div class="comment-text">
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'clenix' ); ?></p>
			<?php endif; ?>
			<?php comment_text(); ?>
		</div>			
	</div>
	<div class="clear"></div>
</div>