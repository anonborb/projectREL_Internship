<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Add room</h1>
        <form method='POST'>
            <label for="room_id">Enter new Room-ID:</label><br>
            <input type="text" id="room_id" name="room_id"><br>

            <label for="room_cap">Set room capacity:</label><br>
            <input type="text" id="room_cap" name="room_cap"><br>

            <label for="overwrite_box">Allow overwrite?</label>
            <input type="checkbox" id="overwrite_box" name="overwrite"><br>

            <br><input type="submit" value="Enter">
        </form>

        <?php
        $room_id = $_POST['room_id'];
        $room_cap = $_POST['room_cap'];
        $overwrite = $_POST['overwrite'] ? true : false;

        if (!empty($room_cap) && is_numeric($room_cap)) {   // checks if entered room capacity is an integer 
            $room = new Room($room_id, $room_cap);
            echo $room_id, ($DB->add_room($room, $overwrite) ? " successfully added to the database." : " already exists in the database.");

        } else if (!empty($_POST['room_cap'])) {
            echo "Room capacity must be a valid integer.";
        }
        ?>
        
        <form action="all.php">
            <br><input type="submit" value="View all rooms">
        </form>

    </body>
</html>