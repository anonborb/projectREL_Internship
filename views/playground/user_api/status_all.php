<?php
/** List all equipment in the database */

require_once __DIR__.'/../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$db->get_status();