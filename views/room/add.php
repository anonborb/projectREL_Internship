<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form method='POST' action="all.php">
            <label for="room_id">Enter new Room-ID:</label><br>
            <input type="text" id="room_id" name="room_id"><br>
            <label for="room_cap">Room capacity:</label><br>
            <input type="text" id="room_cap" name="room_cap"><br>
            <input type="submit" value="Enter">
        </form>

        <?php
            $room = new Room($_POST['room_id'], $_POST['room_cap']);
            $DB->add_room($room);
        ?>
    </body>
</html>