<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CandyintheCove
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.

		if( function_exists( 'get_field' ) ) {
			if( get_field( 'about_us_paragraph' ) ) {
				?>
				<p><?php the_field( 'about_us_paragraph' ); ?></p>
				<?php
			}
		}

		if( function_exists( 'get_field' ) ) {
			if( get_field( 'candy_info' ) ) {
				?>
				<p><?php the_field( 'candy_info' ); ?></p>
				<?php
			}
		}

		if( function_exists( 'get_field' ) ) {
			if( get_field( 'payment_info' ) ) {
				?>
				<p><?php the_field( 'payment_info' ); ?></p>
				<?php
			}
		}

		if( function_exists( 'get_field' ) ) {
			if( get_field( 'contact_jan_section' ) ) {
				?>
				<p><?php the_field( 'contact_jan_section' ); ?></p>
				<?php
			}
		}

		if( function_exists( 'get_field' ) ) {
			if( get_field( 'link_to_contact' ) ) {
				?>
				<a href="<?php the_field( 'link_to_contact' ); ?>">Contact Us</a>
				<?php
			}
		}

		?>

	</main><!-- #main -->

<?php
get_footer();
