<?php
require_once __DIR__.'/../../data/RoomHandler.php';
require_once '../../utility/FormHandler.php';
$DB = new RoomHandler;

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
        $fHandler = new FormHandler($_POST);
        
        if ($fHandler->valid_addRoom()) {
            $room = new Room($_POST['room_id'], $_POST['room_cap']);
            $DB->add($room, $overwrite);
            echo $_POST['room_id'], ' successfully added to the database.';
        } else {
            $fHandler->errors();
        }

        ?>
        <br><a href='all.php'>View all rooms</a>

    </body>
</html>