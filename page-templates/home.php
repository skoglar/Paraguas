<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a blank page.
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

			<main class="site-main" id="main">
		<div class="carrusel">
				<!-- Carousel -->
				<div id="carrusel-novedades" class="carousel slide carousel-fade" data-ride="carousel">
					<!-- Carousel Items -->
					<div class="carousel-inner" role="listbox">
						<!-- Tag loop conditions -->
						<?php carousel_content_by_option() ?>
					</div>
					<!-- Carousel Controls -->
					<a class="carousel-control-prev" href="#carrusel-novedades" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carrusel-novedades" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			<!-- Do the right sidebar check -->
			

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
					<div class="d-flex text-white justify-content-center flex-wrap">
						<?php tab_content_by_type('sm_texto') ?>
					</div>
				</div>
				<div id="destacados" class="p-2 tab-pane fade">
					<div class="d-flex text-white justify-content-center flex-wrap">
						<?php tab_content_by_tag('destacados') ?>
					</div>
				</div>
				<div id="noticias" class="p-2 tab-pane fade">
					<div class="d-flex text-white justify-content-center flex-wrap">
						<?php tab_content_by_tag('noticias') ?>
					</div>
				</div>
			</div>
		<!-- /TABS -->
		<div class="separador">
			<img class="paraguitas" src="http://manret.dreamhosters.com/wp-content/uploads/2020/04/logo-editorial_1-1.png" >
		</div>
		<div class="instagram-feed">
			<?php 
				echo do_shortcode('[instagram-feed]');
			?>
		</div>
		</main><!-- #main -->

		</div>
		</div>
	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
