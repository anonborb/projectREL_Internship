<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Remove room</h1>
        <form method='POST'>
            <label for="room_id">Enter room-ID:</label><br>
            <input type="text" id="room_id" name="room_id"><br>
            <input type="submit" value="Enter">
        </form>

        <?php
        $room_id = $_POST['room_id'];
        if (!empty($room_id)) { // calls removal method and outputs message.
            echo $room_id, ($DB->rm_room($room_id)) ? " successfully removed." : " does not exist in the database.";
        }
        ?>

        <form action="all.php">
            <br><input type="submit" value="View all rooms">
        </form>

    </body>
</html>