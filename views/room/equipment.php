<?php
require_once __DIR__.'/../../data/RoomHandler.php';
$DB = new RoomHandler;
$room_id = $_GET['room_id'];
$eq_list = $DB->get($room_id)->get_equipment();

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

<h1>Room: <?php echo $room_id ?></h1>
<h2>Number of Items: <?php echo count($eq_list)?></h2>
Maximum Space: <?php echo $DB->get($room_id)->get_max_capacity()?>
<br>Free Space: <?php echo $DB->get($room_id)->get_curr_capacity()?>


    <table style="width: 50%">
        <tr>
            <th>Equipment-ID</th>
            <th>Required Storage Space</th>
            <th>Required Users</th>
        </tr>

        <?php
        foreach ($eq_list as $id => $equip) {
            echo "<tr><td>", $equip->get_label(), "</td>";
            echo "<td>", $equip->get_storage(), "</td>";
            echo "<td>", $equip->get_num_users(), "</td></tr>";
        }
        ?>
    </table>
    <br><a href='all.php'>View Rooms</a>
    <br><a href='../equipment/inventory.php'>View Inventory</a>


</body>