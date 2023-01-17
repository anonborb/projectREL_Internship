<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <form method='POST'>
            <label for="room_id">Enter new Room-ID:</label><br>
            <input type="text" id="room_id" name="room_id"><br>
            <label for="room_cap">Set room capacity:</label><br>
            <input type="text" id="room_cap" name="room_cap"><br>
            <input type="submit" value="Enter">
        </form>

        <?php
        var_dump($_POST);
        if (!empty($_POST['room_cap']) && is_numeric($_POST['room_cap'])) {
            $room = new Room($_POST['room_id'], $_POST['room_cap']);
            
        } else if (!empty($_POST['room_cap'])) {
            echo "Room capacity must be a valid integer.";
        }
        ?>

        <form action="all.php">
            <br><input type="submit" value="View all rooms">
        </form>

    </body>
</html>