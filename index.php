<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package paraguas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'paraguas_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<?php 
							// the query
							$the_query = new WP_Query( array(
								'category_name' => 'Novedades',
								'posts_per_page' => 3,
							)); 
						?>

						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="carousel-item active">
								<img class="d-block w-100" src="<?php the_post_thumbnail_url(); ?>" alt="novedades">
								</div>
								'<a href="'.esc_url($featured_img_url).'" rel="lightbox">'; 
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

						<?php else : ?>
							<p><?php echo 'No se encontraron posts (esto es temporal)'; ?></p>
						<?php endif; ?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</main><!-- #main -->
			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->
		<!-- Tabs for personalized content -->
		<div class="container showcase">
			<ul class="nav showcase-tabs">
				<li><a class="p-2 infotab active" data-toggle="pill" href="#novedades">Novedades</a></li>
				<li><a class="p-2 infotab" data-toggle="pill" href="#destacados">Destacados</a></li>
				<li><a class="p-2 infotab" data-toggle="pill" href="#noticias">Noticias</a></li>
			</ul>
			<div class="tab-content p-4">
				<div id="novedades" class="p-2 tab-pane fade show active">
					<h3>Novedades</h3>
						<?php 
							// the query
							$the_query = new WP_Query( array(
								'category_name' => 'Novedades',
								'posts_per_page' => 3,
							)); 
						?>

						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<?php the_post_thumbnail(); ?>
								<?php the_title(); ?>

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

						<?php else : ?>
							<p><?php echo 'No se encontraron posts (esto es temporal)'; ?></p>
						<?php endif; ?>
					</div>
					<div id="destacados" class="p-2 tab-pane fade">
						<h3>Destacados</h3>
						<?php 
							// the query
							$the_query = new WP_Query( array(
								'category_name' => 'gatitos',
								'posts_per_page' => 3,
							)); 
						?>

						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<?php the_post_thumbnail(); ?>
								<?php the_title(); ?>

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

						<?php else : ?>
							<p><?php echo 'No se encontraron posts (esto es temporal)'; ?></p>
						<?php endif; ?>
					</div>
					<div id="noticias" class="p-2 tab-pane fade">
					<h3>Noticias</h3>
						<?php 
							// the query
							$the_query = new WP_Query( array(
								'category_name' => 'dogitos',
								'posts_per_page' => 3,
							)); 
						?>

						<?php if ( $the_query->have_posts() ) : ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<?php the_post_thumbnail(); ?>
								<?php the_title(); ?>

							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>

						<?php else : ?>
							<p><?php echo 'No se encontraron posts (esto es temporal)'; ?></p>
						<?php endif; ?>
				</div>
			</div>
		<!-- /TABS -->
		<div class="seeme">

		</div>
		</div>
		<?php 
			echo do_shortcode('[instagram-feed]');
		?>
	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
