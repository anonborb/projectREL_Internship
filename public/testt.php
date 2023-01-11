<?php require '../data/DataHandler.php';
    session_start();
    
    $datahandler = $_SESSION['testhandler'][0];


    $datahandler->add_equipment(new Equipment('fakeid', 2, 10));
    $datahandler->add_equipment(new Equipment('fakeid2', 1, 5));

    if (!$datahandler->rm_equipment("fake_id")) {
        echo "<pre>fake_id does not exist";
    }
    $datahandler->get_status();

    $datahandler->rm_equipment("fakeid");
    $datahandler->get_status();