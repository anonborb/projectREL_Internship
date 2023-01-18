<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;
$list = $DB->get_all_rooms();

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

<h1>Show Rooms</h1>
<h2>Number of Rooms: <?=count($list)?></h2>

</form><table style="width:50%">
    <tr>
            <th>Room</th>
            <th>Maximum Space</th>
            <th>Free Space</th>
            <th>Number of Equipment</th>
            <th>Number of Occupants</th>
    </tr>
<?php
    foreach ($list as $id => $room) {    

        echo "<tr><td><a href='equipment.php?room_id={$room->get_label()}'>{$room->get_label()}</a></td>";
        echo "<td>", $room->get_max_capacity(), "</td>";
        echo "<td>", $room->get_curr_capacity(), "</td>";
        echo "<td>", count($room->get_equipment()), "</td>";
        echo "<td>", $room->get_curr_occupants(), "</td></tr>";        
    }
?>
</table>


<br><a href='add.php'>Add Room</a> 
<br><a href='remove.php'>Remove Room</a> 
<br><a href='../equipment/inventory.php'>View Inventory</a>

</body>
</html>