<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<footer class="content-info" role="contentinfo">
	<div class="container text-center">
		<?php dynamic_sidebar('sidebar-footer'); ?>
		<div class="horizontal-line">
			<a href="tel:<?php phone_number( false ); ?>">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-inverse fa-stack-2x"></i>
					<i class="fa fa-phone fa-stack-1x"></i>
				</span>
			</a>
		</div>
		<address class="company-address">
			<p class="company-name"><?php the_field('blog_root_name', 'options'); ?></p>
			<?php the_field('blog_root_address', 'options'); ?><br />
			<?php _e( 'email:', 'roots'); ?> <?php get_template_part('templates/blocks/email', 'decrypted'); ?>
			<?php _e( 'tel:', 'roots'); ?> <a href="tel:<?php phone_number( false ); ?>"><?php phone_number(); ?></a>
		</address>
		<div class="footers">
			<p>© <?php echo dynamic_year(); ?> <?php _e( 'Diabdis. Wszelkie prawa zastrzeżone.', 'roots'); ?></p>
		</div>
	</div>
	
	<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>

	<script type="text/javascript">

	/* Setup variables for infinite scroll options */

	var img= "<?php echo get_template_directory_uri() . '/assets/img/ajax-loader.gif'; ?>",
	msgText= "<?php _e( 'Loading next posts', 'roots'); ?>",
	finishedMsg= "<?php _e( 'There is no more posts to load', 'roots'); ?>";

	</script>

</footer>
