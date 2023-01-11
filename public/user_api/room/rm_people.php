<?php

/** Adds people to a room */

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$room_id = 'room100';
$room = $db->get_room($room_id);
if (!$room) {
    echo "<pre>Room ", $room_id, " does not exist in database.<br>";
} else {
    $room->rm_people(15);
}

$db->get_status();
