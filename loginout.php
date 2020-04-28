<?php
    session_start();
    unset($_SESSION['uid']);
    header('location:'.$_SERVER['HTTP_REFERER']);