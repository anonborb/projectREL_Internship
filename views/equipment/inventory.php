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
<pre>
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
<form action="add.php">
    <input type="submit" value="Add Equipment">
</form><form action="move.php">
    <input type="submit" value="Move Equipment">
</form><form action="remove.php">
    <input type="submit" value="Remove Equipment">
</form><form action="../room/all.php">
    <input type="submit" value="View all Rooms">
</form>


</pre>
</body>
</html>