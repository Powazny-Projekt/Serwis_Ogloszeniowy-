<?php
    session_start();

    // czyści sesje w logowaniu
    $_SESSION = [];

    header("location: logowanie.php");
    exit;
?>