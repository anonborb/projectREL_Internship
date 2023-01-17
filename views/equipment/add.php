<?php
require_once __DIR__.'/../../data/DataHandler.php';
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

            <label for="location">Set location:</label><br>
            <input type="text" id="location" name="location" placeholder="(Optional)"><br>

            <input type="submit" value="Enter">
        </form>

        <?php
        $equip_id = $_POST['equip_id'];
        $users = $_POST['users'];
        $storage = $_POST['storage'];
        $location = $_POST['location'];

        if (!(empty($equip_id) || empty($users) || empty($storage))) {
            if (is_numeric($users) && is_numeric($storage) && (empty($location) || !empty($DB->get_room($location)))) {    // checks if users and storage are integers
                $equip = (empty($location) ? new Equipment($equip_id, $users, $storage) : new Equipment($equip_id, $users, $storage, $location));
                if (empty($location) ? $DB->add_equipment($equip) : $DB->add_equipment($equip, $location)) {
                    echo $equip_id, " successfully added to inventory.";
                } else {
                    echo $equip_id, " already exists in inventory.";
                }
                


                
            } else {    // Error messages for invalid user input
                if (!(empty($equip_id) || empty($users))) {
                    echo "<br>Enter a number for number of users and required storage space.";
                }
                if (empty($DB->get_room($location))) {  // inputted location does not exist
                    echo "<br>Inputted location does not exist.";
                }
            }
        }
        
        ?>
        
        <form action="inventory.php">
            <br><input type="submit" value="View Inventory">
        </form>

    </body>
</html>