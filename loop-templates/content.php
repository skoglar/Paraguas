<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package paraguas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>



<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- <header class="entry-header">

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">
				<?php paraguas_posted_on(); ?>
			</div>

		<?php endif; ?>

	</header> -->
	<!-- .entry-header -->
	<div class="d-flex flex-row">
		<div class="thumb-box">
			<div class="mobile-post-title">
				<?php
					the_title(
						sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h3>'
					);
				?>
			</div>
			<img class="blog-thumbnail" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>"  alt="{$post_title}">
		</div>
		<div class="entry-content blog-excerpt">
		<?php
			the_title(
				sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h3>'
			);
		?>
			<?php the_excerpt(); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'paraguas' ),
					'after'  => '</div>',
				)
			);

			?>
		</div><!-- .entry-content -->
	</div>

	<!--
	<footer class="entry-footer">
		<?php paraguas_entry_footer(); ?>

	</footer>
	-->
	<!-- .entry-footer -->

</article><!-- #post-## -->
