<footer class="content-info" role="contentinfo">
	<div class="container text-center">
		<?php dynamic_sidebar('sidebar-footer'); ?>
		<div class="horizontal-line">
			<a href="tel:223-073-787">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-phone fa-inverse fa-stack-1x"></i>
				</span>
			</a>
		</div>
		<div class="address">
			<p class="bolded"> Diabdis Sp. z.o.o.</p>
			<p> ul. Kopernika 4/7, 40-064 Katowice <br>email: <a href="mailto:pomoc@diabdis.com">pomoc@diabdis.com</a><br>tel: <a href="tel:223-073-787">22 307 37 87</a></p>
		</div>
		<div class="footers">
			<p>© <?php echo dynamic_year(); ?> Diabdis. Wszelkie prawa zastrzeżone.</p>
		</div>
	</div>
	
	<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>

  <script type="text/javascript">
  var img= "<?php echo get_template_directory_uri() . '/assets/img/ajax-loader.gif'; ?>",
  msgText= "<?php _e( 'Loading next posts', 'roots'); ?>",
  finishedMsg= "<?php _e( 'There is no more posts to load', 'roots'); ?>";
  </script>

</footer>
