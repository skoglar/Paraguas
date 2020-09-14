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
						<i class="fa fa-copyright"></i>&nbsp;2020&nbsp;Invertido Ediciones &mdash; Todos los derechos reservados
					</div><!-- .site-info -->
					<div class="site-contact align-self-end">
						<a href="https://www.instagram.com/invertidoediciones/">
							<i class="fa fa-instagram fa-lg"></i>&nbsp;
						</a>
						<a href="https://www.facebook.com/invertidoediciones/">
							<i class="fa fa-facebook fa-lg"></i>&nbsp;
						</a>
						<a href="https://twitter.com/invertidoed/">
							<i class="fa fa-twitter fa-lg"></i>&nbsp;
						</a>
						<a href="mailto:invertidoediciones@gmail.com">
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

