<?php
/** List all equipment in warehouse */

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$warehouse = $db->get_room('warehouse');
$warehouse->list_equipment();
