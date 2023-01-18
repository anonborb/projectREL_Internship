<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;
$list = $DB->get_all_equipment();

?><!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
<body>

<h1>Show Inventory</h1>
<h2>Number of Items: <?=count($list)?></h2>

<table style="width:70%">
    <tr>
            <th>Equipment ID</th>
            <th>Required Storage Space</th>
            <th>Required Users</th>
            <th>Current Location</th>
    </tr>
    <?php
        foreach ($list as $id => $equip) {    
            echo "<tr><td>", $equip->get_label(), "</td>";
            echo "<td>", $equip->get_storage(), "</td>";
            echo "<td>", $equip->get_num_users(), "</td>";
            echo "<td><a href='../room/equipment.php?room_id={$equip->get_location()}'>{$equip->get_location()}</a></td>";     
        }
    ?>
</table>
<br><a href='add.php'>Add Equipment</a>
<br><a href='move.php'>Move Equipment</a>
<br><a href='remove.php'>Remove Equipment</a>
<br><a href='../room/all.php'>View All Rooms</a>

</body>
</html>