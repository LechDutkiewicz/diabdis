<?php

if ( !defined( 'ABSPATH' ) )
  exit( 'No direct script access allowed' ); // Exit if accessed directly

  ?>

<form method="POST" id="subscribe-form" action="send.php" class="subscribe-form styled-form">
  <input type="text" name="email" value="<?php _e( 'Twój adres e-mail', 'roots'); ?>" onfocus="if (this.value == '<?php _e( 'Twój adres e-mail', 'roots'); ?>') { this.value = ''; }" onblur="if (this.value == '') { this.value = '<?php _e( 'Twój adres e-mail', 'roots'); ?>'; }">
  <br>
  <input type="text" name="phonenumber" value="<?php _e( 'Numer telefonu', 'roots'); ?>" onfocus="if (this.value == '<?php _e( 'Numer telefonu', 'roots'); ?>') { this.value = ''; }" onblur="if (this.value == '') { this.value = '<?php _e( 'Numer telefonu', 'roots'); ?>'; }">
  <span class="label margin top">
    <input type="checkbox" name="rules" id="form-rules" value="1">
    <label for="form-rules">
      <?php _e( 'Wyrażam zgodę na przetwarzanie moich danych osobowych w celach związanych z realizacją usługi świadczonej drogą elektroniczną, obsługą ew. reklamacji oraz przesyłaniem informacji o nowościach i ofertach specjalnych na Twój e-mail. Każda osoba ma prawo wglądu w swoje dane i możliwość ich poprawienia. Podanie danych ma charakter dobrowolny chodź niezbędny, by móc dokonać rejestracji w systemie Diabdis.com<br>Administratorem danych jest Diabdis Sp. z.o.o. z siedzibą w Katowicach przy ul. Kopernika 4/7.', 'roots'); ?>
    </label>
  </span>
  <button type="submit" class="btn btn-cta btn-blue"><i class="fa fa-send-o"></i><?php _e( 'Wyślij zgłoszenie', 'roots'); ?></button>
  <input type="hidden" class="" name="topic" value="<?php _e( 'Wyślij zgłoszenie', 'roots'); ?>">
  <input type="hidden" class="" name="name" value="<?php _e( 'Diabdis.pl', 'roots'); ?>">
</form>