<?php
require_once __DIR__.'/../../data/DataHandler.php';
require_once '../../utility/FormHandler.php';
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
        $fHandler = new FormHandler($_POST);

        if (!empty($_POST) && $fHandler->valid()) {
            echo $_POST['room_id'], ($DB->rm_room($_POST['room_id'])) ? " successfully removed." : " does not exist in the database.";
        } else {
            $fHandler->errors();
        }

        ?>
        <br><a href='all.php'>View all rooms</a>
        

    </body>
</html>