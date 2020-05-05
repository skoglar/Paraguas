<?php
/**
 * Single post partial template.
 *
 * @package paraguas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!-- Do the left sidebar check and opens the primary div -->
<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

    <!-- Hide the title
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    -->
	</header><!-- .entry-header -->

	<!-- Hide the thumbnail
		<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
	-->

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'paraguas' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php paraguas_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
