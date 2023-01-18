<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;

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
        $equip_id = $_POST['equip_id'];
        $room_id = $_POST['room_id'];
        if (!(empty($equip_id) || empty($room_id))) {
            $equip = $DB->get_equipment($equip_id);
            if (!isset($equip)) {
                echo $equip_id, " does not exist in the database.";
            } else {
                try {
                    if ($DB->move_equipment($equip, $room_id)) {
                        echo $equip_id, " successfully moved to ", $room_id;
                    } else {
                        echo $room_id, " does not exist.";
                    }
                } catch (Exception $e) {
                    echo $room_id, " does not have enough space to hold new equipment.";
                }
            }
        }
        ?>

        <form action="inventory.php">
            <br><input type="submit" value="View Inventory">
        </form>

    </body>
</html>