<?php
//move an equipment between rooms
//will make designated changes to room object and capacity

require __DIR__.'/../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];
echo "<pre>";

$old_location = 'warehouse';
$new_location = 'room200';
$equipment = $db->get_equipment("test_id");

$db->move_equipment($equipment, $new_location);

$db->get_status();

