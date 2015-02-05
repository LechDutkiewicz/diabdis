<?php

if ( !defined( 'ABSPATH' ) )
  //exit( 'No direct script access allowed' ); // Exit if accessed directly

?>

<form method="POST" id="subscribe-form" action="send.php" class="form-container">
  <input type="text" name="email" value="Twój adres e-mail" onfocus="if (this.value == 'Twój adres e-mail') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Twój adres e-mail'; }">
  <br>
  <input type="text" name="phonenumber" value="Numer telefonu" onfocus="if (this.value == 'Numer telefonu') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Numer telefonu'; }">
  <span class="label">
    <span class="checkbox" style="background-position: 0px 0px;"></span><input type="checkbox" name="rules" class="styled" id="form-rules" value="1">
    <label for="form-rules">
      Wyrażam zgodę na przetwarzanie moich danych osobowych w celach związanych z realizacją usługi świadczonej drogą elektroniczną, obsługą ew. reklamacji oraz przesyłaniem informacji o nowościach i ofertach specjalnych na Twój e-mail. Każda osoba ma prawo wglądu w swoje dane i możliwość ich poprawienia. Podanie danych ma charakter dobrowolny chodź niezbędny, by móc dokonać rejestracji w systemie Diabdis.com<br>Administratorem danych jest Diabdis Sp. z.o.o. z siedzibą w Katowicach przy ul. Kopernika 4/7.
    </label>
  </span>
  <!--<span class="label">-->
  <!--<input type="checkbox" name="newsletter" class="styled" id="form-newsletter">-->
  <!--<label for="form-newsletter">Wyrażam zgodę na przesyłanie na mój adres e-mail informacji o produktach, usługach i przedsięwzięciach Diabdis.</label>-->
  <!--</span>-->
  <input type="submit" class="button button-blue" value="Wyślij zgłoszenie">
  <input type="hidden" class="" name="topic" value="Wyślij zgłoszenie">
  <input type="hidden" class="" name="name" value="Diabdis.pl">
</form>