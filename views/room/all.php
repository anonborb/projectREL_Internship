<?php
require_once __DIR__.'/../../data/RoomHandler.php';
require_once '../../utility/FormHandler.php';
$DB = new RoomHandler;

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

<h1>Show All Rooms</h1>


<h3>Add Room</h3><form method='POST'>
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
        $overwrite = $_POST['overwrite'] ? true : false;
        $room = new Room($_POST['room_id'], $_POST['room_cap']);
        $DB->add($room, $overwrite);
        echo $_POST['room_id'], " successfully added to the database.";
    } else {
        $fHandler->errors();
    }
    $list = $DB->get_list();
?>


<h2>Number of Rooms: <?=count($list)?></h2>
</form><table style="width:100%">
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
