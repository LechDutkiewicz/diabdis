<?php

if ( !defined( 'ABSPATH' ) )
	exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<script type="text/javascript">
document.write("<?php coded_email(); ?>".replace(/[a-zA-Z]/g, function(c){
	return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);
})
);
</script>