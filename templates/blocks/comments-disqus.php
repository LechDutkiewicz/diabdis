<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<div id="disqus_thread"></div>
<script type="text/javascript">
/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'diabdis', // required: replace example with your forum shortname
        disqus_identifier = '<?php echo sanitize_title(get_the_title()); ?>'
        disqus_title = '<?php the_title(); ?>',
        disqus_url = '<?php the_permalink(); ?>';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
        	var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        	dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
</script>
<noscript><?php echo sprintf( __('Please enable JavaScript to view the %s comments powered by Disqus. %e'), '<a href="https://disqus.com/?ref_noscript">', '</a>'); ?></noscript>
