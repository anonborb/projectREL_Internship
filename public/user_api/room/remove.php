<?php

//removes a room from the database

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$room_id = "room200";
$db->rm_room($room_id);

$db->get_status();
