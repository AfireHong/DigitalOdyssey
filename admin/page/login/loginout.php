<?php
    session_start();
    echo $_SESSION['admin'];
    session_unset();
    session_destroy();
    header('location:login.html');