<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<!--<form method="POST" id="subscribe-form" action="send.php" class="subscribe-form styled-form">
  <input type="text" name="email" value="<?php _e( 'Your e-mail', 'roots'); ?>" onfocus="if (this.value == '<?php _e( 'Your e-mail', 'roots'); ?>') { this.value = ''; }" onblur="if (this.value == '') { this.value = '<?php _e( 'Your e-mail', 'roots'); ?>'; }">
  <br>
  <input type="text" name="phonenumber" value="<?php _e( 'Phone number', 'roots'); ?>" onfocus="if (this.value == '<?php _e( 'Phone number', 'roots'); ?>') { this.value = ''; }" onblur="if (this.value == '') { this.value = '<?php _e( 'Phone number', 'roots'); ?>'; }">
  <span class="label margin top">
    <input type="checkbox" name="rules" id="form-rules" value="1">
    <label for="form-rules">
      <?php _e( 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celach związanych z realizacją usługi świadczonej drogą elektroniczną, obsługą ew. reklamacji oraz przesyłaniem informacji o nowościach i ofertach specjalnych na Twój e-mail. Każda osoba ma prawo wglądu w swoje dane i możliwość ich poprawienia. Podanie danych ma charakter dobrowolny chodź niezbędny, by móc dokonać rejestracji w systemie Diabdis.com<br>Administratorem danych jest Diabdis Sp. z.o.o. z siedzibą w Katowicach przy ul. Kopernika 4/7.', 'roots'); ?>
    </label>
  </span>
  <button type="submit" class="btn btn-cta btn-blue"><i class="fa fa-send-o"></i><?php _e( 'Send application', 'roots'); ?></button>
  <input type="hidden" class="" name="topic" value="<?php _e( 'Send application', 'roots'); ?>">
  <input type="hidden" class="" name="name" value="diabdis.com">
</form>-->

<!-- Begin MailChimp Signup Form -->
<!--<div id="mc_embed_signup">
  <form action="//diabdis.us3.list-manage.com/subscribe/post?u=7462c2de238ac1df080b404af&amp;id=368806601f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate styled-form" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">

      <div class="indicates-required"><span class="asterisk">*</span><?php _e( 'indicates required', 'roots'); ?></div>
      <div class="mc-field-group">
        <label for="mce-EMAIL"><?php _e( 'Your e-mail', 'roots'); ?><span class="asterisk">*</span>
        </label>
        <input type="email" value="" name="EMAIL" class="required email focus" id="mce-EMAIL">
      </div>
      <div class="mc-field-group">
        <label for="mce-MMERGE3"><?php _e( 'Phone number', 'roots'); ?></label>
        <input type="text" name="MMERGE3" class="" value="" id="mce-MMERGE3">
      </div>
      <div class="mc-field-group">
        <span class="label margin top">
          <input type="checkbox" name="rules" id="form-rules" value="1" class="required">
          <label for="form-rules">
            <?php _e( 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celach związanych z realizacją usługi świadczonej drogą elektroniczną, obsługą ew. reklamacji oraz przesyłaniem informacji o nowościach i ofertach specjalnych na Twój e-mail. Każda osoba ma prawo wglądu w swoje dane i możliwość ich poprawienia. Podanie danych ma charakter dobrowolny chodź niezbędny, by móc dokonać rejestracji w systemie Diabdis.com<br>Administratorem danych jest Diabdis Sp. z.o.o. z siedzibą w Katowicach przy ul. Kopernika 4/7.', 'roots'); ?>
          </label>
        </span>
      </div>
      <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
      </div>
      <div style="position: absolute; left: -5000px;"><input type="text" name="b_7462c2de238ac1df080b404af_368806601f" tabindex="-1" value=""></div>
      <div class="clear"><input type="submit" value="<?php _e( 'Send application', 'roots'); ?>" name="subscribe" id="mc-embedded-subscribe" class="btn btn-cta btn-blue"></div>
    </div>
  </form>
</div> -->
<!--<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>
(function($) {
  window.fnames = new Array();
  window.ftypes = new Array();
  fnames[0]='EMAIL';
  ftypes[0]='email';
  fnames[1]='FNAME';
  ftypes[1]='text';
  fnames[2]='LNAME';
  ftypes[2]='text';
  fnames[3]='MMERGE3';
  ftypes[3]='phone';

/*
 * Translated default messages for the $ validation plugin.
 * Locale: PL
 */

 
   setTimeout(function(){
    $.extend($.validator.messages, {
    required: "<?php _e( 'This field is required.', 'roots'); ?>",
    remote: "<?php _e( 'Please fill this field.', 'roots'); ?>",
    email: "<?php _e( 'Please type correct email address.', 'roots'); ?>",
    digits: "<?php _e( 'Please type numbers only.', 'roots'); ?>",
  });  
  }, 1000);
 

}(jQuery));
var $mcj = jQuery.noConflict(true);
</script> -->

<!--End mc_embed_signup-->

<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
  <form action="//diabdis.us3.list-manage.com/subscribe/post?u=7462c2de238ac1df080b404af&amp;id=368806601f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate styled-form" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">

      <div class="indicates-required"><span class="asterisk">*</span><?php _e( 'indicates required', 'roots'); ?></div>
      <div class="mc-field-group">
        <label for="mce-EMAIL"><?php _e( 'Your e-mail', 'roots'); ?><span class="asterisk">*</span>
        </label>
        <input type="email" name="EMAIL" class="focus" id="EMAIL">
      </div>
      <div class="mc-field-group">
        <label for="mce-MMERGE3"><?php _e( 'Phone number', 'roots'); ?></label>
        <input type="text" name="MMERGE3" id="MMERGE3">
      </div>
      <div class="mc-field-group">
        <span class="label margin top">
          <input type="checkbox" name="rules" id="rules">
          <label for="rules">
            <?php _e( 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celach związanych z realizacją usługi świadczonej drogą elektroniczną, obsługą ew. reklamacji oraz przesyłaniem informacji o nowościach i ofertach specjalnych na Twój e-mail. Każda osoba ma prawo wglądu w swoje dane i możliwość ich poprawienia. Podanie danych ma charakter dobrowolny chodź niezbędny, by móc dokonać rejestracji w systemie Diabdis.com<br>Administratorem danych jest Diabdis Sp. z.o.o. z siedzibą w Katowicach przy ul. Kopernika 4/7.', 'roots'); ?>
          </label>
        </span>
      </div>
      <div style="position: absolute; left: -5000px;"><input type="text" name="b_7462c2de238ac1df080b404af_368806601f" tabindex="-1" value=""></div>
      <div class="clear"><input type="submit" value="<?php _e( 'Send application', 'roots'); ?>" name="subscribe" id="mc-embedded-subscribe" class="btn btn-cta btn-blue"></div>
    </div>
  </form>
</div>

<!--<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript">
(function($) {
  $(document).ready(function(){
    $("#mc-embedded-subscribe-form").validate({
      rules: {
        EMAIL: "required",
        MMERGE3: "required",
        rules: "required"
      },
      messages: {
        EMAIL: "<?php _e( 'Please type correct email address.', 'roots'); ?>"
      }
    });
  });
}(jQuery));
</script>-->