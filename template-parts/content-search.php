<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wpautomate
 */
$wpautomate_post_type = get_post_type();
?>

<article id="<?php the_ID(); ?>" <?php post_class('search--list'); ?>>
	<header class="search--entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="search--entry-meta">
			<?php wpautomate_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="search--entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="search--entry-footer">
		<?php wpautomate_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

