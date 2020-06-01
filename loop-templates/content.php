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
	<!-- .entry-header -->
	<div class="d-flex flex-column">
		<!-- desktop layout -->
		<div class="d-flex flex-row post-index-row">
			<div class="thumb-box">
				<img class="blog-thumbnail" src="<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>"  alt="{$post_title}">
			</div>
			<div class="entry-content blog-excerpt">
				<?php
					the_title(
						sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h3>'
					);
				?>
				<?php short_excerpt(); ?>
				<?php
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'paraguas' ),
							'after'  => '</div>',
						)
					);

				?>
			</div>
		</div>
		<!-- mobile layout -->
		<div class="mobile-post-excerpt">
			<?php
				the_title(
					sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h4>'
				);

				short_excerpt(30);
			?>
		</div>
	</div>
</article><!-- #post-## -->
