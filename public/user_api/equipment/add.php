Adding equipment to the database, will be automatically catalogued into warehouse
add to equipment array + add to warehouse equipment array
<?php
$NewEquipment = new Equipment('fdsfdf',3,4);
$db = new DataHandler;
$db->add_equipment($NewEquipment);
echo "<pre>";
var_dump($_SESSION);
