<?php require '../data/DataHandler.php';
    session_start();
    
    $_SESSION['eq_test'] = [
        new Equipment('fakeid', 2, 10),
        new Equipment('fakeid2', 1, 5)
    ];

    $datahandler = $_SESSION['test0'][0];

    $datahandler->add_equipment($_SESSION['eq_test'][0]);
    $datahandler->add_equipment($_SESSION['eq_test'][1]);
    $eq = $datahandler->get_equipment('fakeid2');

    $datahandler = $_SESSION['test0'][0];

    var_dump($datahandler->get_room('warehouse'));
    $datahandler->get_status();

