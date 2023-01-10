<?php require '../data/DataHandler.php';
    session_start();
    
    $datahandler = $_SESSION['testhandler'][0];


    $datahandler->add_equipment(new Equipment('fakeid', 2, 10));
    $datahandler->add_equipment(new Equipment('fakeid2', 1, 5));

    $datahandler->get_status();

