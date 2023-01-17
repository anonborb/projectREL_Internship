<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;

?><!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Remove Equipment</h1>
        <form method='POST'>
            <label for="equip_id">Enter equipment-ID:</label><br>
            <input type="text" id="equip_id" name="equip_id"><br>
            <input type="submit" value="Enter">
        </form>

        <?php
        $equip_id = $_POST['equip_id'];
        if (!empty($equip_id)) {
            echo $equip_id, ($DB->rm_equipment($equip_id) ? " successfully removed." : " does not exist in the database.");
        }
        ?>

        <form action="inventory.php">
            <br><input type="submit" value="View Inventory">
        </form>

    </body>
</html>