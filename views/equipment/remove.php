<?php
require_once __DIR__.'/../../data/EquipmentHandler.php';
require_once '../../utility/FormHandler.php';
$DB = new EquipmentHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Remove Equipment</h1>
        <form method='POST'>
            <label for="equip_id">Enter equipment-ID:</label><br>
            <input type="text" id="equip_id" name="equip_id"><br>
            <input type="submit" value="Enter">
        </form>

        <?php
        $fHandler = new FormHandler($_POST);

        if ($fHandler->valid_rmEquip()) {
            $equip_id = $_POST['equip_id'];
            $DB->remove($equip_id);
            echo $equip_id, ' successfully removed.';
        } else {
            $fHandler->errors();
        }
        ?>
        <br><a href='inventory.php'>View Inventory</a>


    </body>
</html>