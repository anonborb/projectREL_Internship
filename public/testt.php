<?php require 'data/DataHandler.php';
    session_start();
    
    if(!isset($_SESSION['mmm'])) {
        echo 'no';
    } else {
        echo 'yes';
    }
    $_SESSION['mmm'][0]->get_status();

    var_dump($_SESSION['mmm'][0]);