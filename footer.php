<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package paraguas
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'paraguas_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer d-flex justify-content-between" id="colophon">
					<div class="site-info align-self-start">
						Editorial Invertido <i class="fa fa-copyright"></i> &mdash; 2020 &mdash; <a href="mailto:contacto@invertidoediciones.cl">contacto@invertidoediciones.cl</a>
					</div><!-- .site-info -->
					<div class="site-contact align-self-end">
						<a href="https://www.instagram.com/invertidoediciones/">
							<i class="fa fa-instagram fa-lg"></i>&nbsp;
						</a>
						<a href="https://www.facebook.com/Invertido-Ediciones-1118203675051290/">
							<i class="fa fa-facebook fa-lg"></i>&nbsp;
						</a>
						<a href=""></a>
						<a href="mailto:contacto@invertidoediciones.cl">
							<i class="fa fa-envelope fa-lg"></i>
						</a>
					</div>
				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

