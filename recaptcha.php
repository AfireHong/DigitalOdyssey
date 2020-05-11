<?php
    if($_POST['g-recaptcha-response']) {
        $captcha = $_POST['g-recaptcha-response'];
        $secret = "6LcRcvUUAAAAAKLvY5ehT_B97hzQFEPJfQhTnjxa";
      
        $json = json_decode(file_get_contents("https://www.recaptcha.net/recaptcha/api/siteverify?secret=". $secret . "&response=" . $captcha), true);
      
        if($json['success']) {
            echo "ok";
        } else {
            echo "error";
        }
      }  else {
          echo "not verify";
      }
      
?>