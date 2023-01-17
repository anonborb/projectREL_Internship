<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;
$room_id = $_GET['room_id'];
$eq_list = $DB->get_room($room_id)->get_equipment();

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
Maximum Space: <?php echo $DB->get_room($room_id)->get_max_capacity()?>
<br>Free Space: <?php echo $DB->get_room($room_id)->get_curr_capacity()?>

<pre>
    <table style="width: 50%">
            <tr>
                <th>Equipment-ID</th>
                <th>Required Users</th>
                <th>Required Storage Space</th>
            </tr>

            <?php
            foreach ($eq_list as $id => $equip) {
                echo "<tr><td>", $equip->get_label(), "</td>";
                echo "<td>", $equip->get_num_users(), "</td>";
                echo "<td>", $equip->get_storage(), "</td></tr>";
            }
            ?>
    </table>

    <form action="all.php">
        <input type="submit" value="View Rooms">
    </form><form action="../equipment/inventory.php">
        <input type="submit" value="View Inventory">
    </form>

</pre>