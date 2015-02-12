<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

// setup vars
$author = get_field('post_thumb_author');

?>
<div class="featured-image">
	<?php
	get_the_image(array(
		'link_to_post' => false,
		'image_class' => array('img-responsive', 'img-full'),
		'meta_key' => false,
		'size' => 'post-featured'
		)
	);
	?>
	<?php if (strlen($author) > 0) : ?>
	<div class="image-author">
		<?php echo $author;	?>
	</div>
<?php endif; ?>
</div>

