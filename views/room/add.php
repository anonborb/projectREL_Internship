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
            <input type="submit" value="Enter">
        </form>

        <?php
        $room_id = $_POST['room_id'];
        $room_cap = $_POST['room_cap'];
        if (!empty($room_cap) && is_numeric($room_cap)) {   // checks if entered room capacity is an integer 
            if ($DB->get_room($room_id)) {  // checks if room already exists
                echo $room_id, " already exists in the database.";
            } else {
                $room = new Room($room_id, $room_cap);
                $DB->add_room($room);
                echo $room_id, " successfully added to the database.";
            }
        } else if (!empty($_POST['room_cap'])) {
            echo "Room capacity must be a valid integer.";
        }
        ?>
        
        <form action="all.php">
            <br><input type="submit" value="View all rooms">
        </form>

    </body>
</html>