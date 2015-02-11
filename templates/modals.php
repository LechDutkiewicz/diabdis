<?php

if ( !defined( 'ABSPATH' ) )
	//exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<div id="modal" data-template="" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="typeFormModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-absolute">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="typeFormModalLabel"><?php _e( 'Sign up to Diabdis', 'roots' ); ?></h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php _e( 'Close', 'roots'); ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->