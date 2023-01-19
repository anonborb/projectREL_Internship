
<?php
/**Adding equipment to the database
add to equipment array + add to warehouse equipment array*/

require_once __DIR__.'/../../../../data/DataHandler.php';
session_start();

$db = $_SESSION['testhandler'][0];

$newEquipment = new Equipment('test_id',3, 4);
$db->add_equipment($newEquipment, 'warehouse');
$newEquipment = new Equipment('test_id2',1, 8);
$db->add_equipment($newEquipment, 'warehouse');


