<?php

/** Adds a room to the database */

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$room_id1 = 'room100';
$room_id2 = 'room200';
$db->add_room(new Room($room_id1, 40));
$db->add_room(new Room($room_id2, 20));

$db->get_status();