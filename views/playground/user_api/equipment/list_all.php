<?php
/** List all equipment in the database */

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$db->list_all_equipment();

