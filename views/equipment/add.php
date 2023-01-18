<?php
require_once __DIR__.'/../../data/DataHandler.php';
require_once '../../utility/FormHandler.php';   
$DB = new DataHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Add Equipment</h1>
        <form method='POST'>
            <label for="equip_id">Enter new Equipment-ID:</label><br>
            <input type="text" id="equip_id" name="equip_id"><br>

            <label for="users">Enter number of users required:</label><br>
            <input type="text" id="users" name="users"><br>

            <label for="storage">Enter required storage space:</label><br>
            <input type="text" id="storage" name="storage"><br>

            <label for="room_id">Set location:</label><br>
            <input type="text" id="room_id" name="room_id" placeholder="(Optional)"><br>
            
            <label for="overwrite_box">Allow overwrite?</label>
            <input type="checkbox" id="overwrite_box" name="overwrite"><br>

            <br><input type="submit" value="Enter">
        </form>
        <form action="inventory.php"> todo 
            <br><input type="submit" value="View Inventory">
        </form>

        <?php
        $equip_id = $_POST['equip_id'];
        $users = $_POST['users'];
        $storage = $_POST['storage'];
        $room_id = $_POST['room_id'];
        $overwrite = $_POST['overwrite'] ? true : false;

        if (!(empty($equip_id) || empty($users) || empty($storage))) {
            if (is_numeric($users) && is_numeric($storage) && (empty($room_id) || !empty($DB->get_room($room_id)))) {    // checks if users and storage are integers
                $equip = (empty($room_id) ? new Equipment($equip_id, $users, $storage) : new Equipment($equip_id, $users, $storage, $room_id));
                
                if (empty($room_id) ? $DB->add_equipment($equip, '', $overwrite) : $DB->add_equipment($equip, $room_id, $overwrite)) {
                    echo $equip_id, " successfully added to inventory.";
                } else {
                    echo $equip_id, " already exists in inventory.";
                }
 
            } else {    // Error messages for invalid user input
                if (!is_numeric($users) || !is_numeric($storage)) {
                    echo "<br>Enter a number for number of users and required storage space.";
                }
                if (empty($DB->get_room($room_id))) {  // inputted room_id does not exist
                    echo "<br>Inputted room_id does not exist.";
                }
            }
        }

        $fhandler = new FormHandler($_POST);
        if ($fhandler->valid()) {
            $DB->add_equipment($equip, $room_id, $overwrite);
        } else {
            $fhandler->errors();
        }
        
        ?>

    </body>
</html>