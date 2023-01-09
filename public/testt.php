<?php require 'data/DataHandler.php';
    session_start();
    
    $_SESSION['test0'][0]->get_status();
    $_SESSION['eq_test'] = [
        new Equipment("fakeid", 2, 10)
    ];

    $_SESSION['test0'][0]->add_equipment($_SESSION['eq_test'][0]);