<?php
/**removes an equipment from the database
unresolved: how to efficiently remove equipment from both database and rooms
    - add additional string var in Equipment class that holds roomid of its location
        (would make searching for Equipment easier) */

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$eq_id= 'test_id';

echo "<pre>";
if ($db->rm_equipment($eq_id)) {
    echo "removal of ", $eq_id, " successful";
} else {
    echo "removal of ", $eq_id, " unsuccessful";
}


