<?php
require_once __DIR__.'/../../data/EquipmentHandler.php';
require_once '../../utility/FormHandler.php';
$DB = new EquipmentHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Move Equipment</h1>
        <form method='POST'>
            <label for="equip_id">Enter equipment-ID to be moved:</label><br>
            <input type="text" id="equip_id" name="equip_id"><br>
            <label for="room_id">Enter new location:</label><br>
            <input type="text" id="room_id" name="room_id"><br>
            <input type="submit" value="Enter">
        </form>

        <?php
        $fHandler = new FormHandler($_POST);
        if ($fHandler->valid_mvEquip()) {
            $equip = $DB->get($_POST['equip_id']);
            try {
                $DB->move_equipment($equip, $_POST['room_id']);
                echo $_POST['equip_id'], " successfully moved.";
            } catch (Exception $e) {
                echo $_POST['room_id'], " does not have enough space to hold new equipment.";
            }
        } else {
            $fHandler->errors();
        }
        ?>

        <br><a href='inventory.php'>View Inventory</a>

    </body>
</html>