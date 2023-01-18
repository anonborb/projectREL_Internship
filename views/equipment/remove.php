<?php
require_once __DIR__.'/../../data/DataHandler.php';
require_once '../../utility/FormHandler.php';
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
        $fHandler = new FormHandler($_POST);

        if ($fHandler->valid()) {
            $equip_id = $_POST['equip_id'];
            echo $equip_id, ($DB->rm_equipment($equip_id) ? " successfully removed." : " does not exist in the database.");
        } else {
            $fHandler->errors();
        }
        ?>
        <br><a href='inventory.php'>View Inventory</a>


    </body>
</html>