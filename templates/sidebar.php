<?php //dynamic_sidebar('sidebar-primary'); ?>
<?php //get_template_part('templates/blocks/search'); ?>
<?php //get_template_part('templates/blocks/subscribe'); ?>
<div class="row">
	<div class="col-md-12 margin bottom-big">
		<?php the_cta('search', 'no-bg btn-dark', false); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12 margin bottom-big">
		<?php get_template_part('templates/blocks/sidebar/subscribe'); ?>
	</div>
</div>
