
<?php
/**Adding equipment to the database, will be automatically catalogued into warehouse
add to equipment array + add to warehouse equipment array*/

require '../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$newEquipment = new Equipment('test_id',3, 4);
$db->add_equipment($newEquipment);
$newEquipment = new Equipment('test_id2',1, 8);
$db->add_equipment($newEquipment);

echo "<pre>";
$db->get_status();


