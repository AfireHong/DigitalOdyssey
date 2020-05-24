<?php
    if($_SERVER['HTTP_REFERER'] == ""){
        include 'header.php';
        include '404.php';
        exit;
    }
    if($_POST['g-recaptcha-response']) {
        $captcha = $_POST['g-recaptcha-response'];
        $secret = "6LeSjfUUAAAAAPTl5I5dJjPW4Y-6FVm6N_cnO8qb";
      
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