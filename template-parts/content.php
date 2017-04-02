<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wpautomate
 */

$wpautomate_post_type = get_post_type();
$wpautomate_post_wrapper = $wpautomate_post_type . '--list';
?>

<article id="<?php the_ID(); ?>" <?php post_class($wpautomate_post_wrapper); ?>>
	<header class="<?php echo esc_attr( $wpautomate_post_type );?>--entry-header entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="<?php echo esc_attr( $wpautomate_post_type );?>--entry-meta entry-meta">
			<?php wpautomate_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="<?php echo esc_attr( $wpautomate_post_type );?>--entry-content entry-content row">
		<?php
		 $wpautomate_loop_content_class = 'col-md-12';
		if (has_post_thumbnail()) :
			$wpautomate_loop_content_class = 'col-md-9';
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id() );
			$tonesque = new Tonesque( $large_image_url[0] );
			$color = $tonesque->color();
		 ?>
			<div class="col-md-3">
				<div class="<?php echo esc_attr( $wpautomate_post_type );?>--image" style="background-color: #<?php echo $color; ?>">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($wpautomate_loop_content_class); ?>">
				<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wpautomate' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>
		</div>


		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wpautomate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="<?php echo esc_attr( $wpautomate_post_type );?>--entry-footer entry-footer">
		<?php wpautomate_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
