<?php
/** List all equipment in the database */

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$warehouse = $db->get_room('warehouse');
$warehouse->list_equipment();
