<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    echo "<script> alert('Logout Realizado');</script>";

    header("Location: ../view/site/login.php");
?>