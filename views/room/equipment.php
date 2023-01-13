<?php
require_once __DIR__.'/../../data/DataHandler.php';
$DB = new DataHandler;
$room = $_SESSION['curr_room'];
$eq_list = $room->get_equipment();

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

<h1>Room: <?php echo $room->get_label() ?></h1>
<h2>Number of Items: <?php echo count($eq_list)?></h2>

<pre>
    <table style="width: 50%">
            <tr><th>Equipment</th></tr>

            <?php
            foreach ($eq_list as $id => $equip) {
                echo "<tr><td>", $equip->get_label(), "</td></tr>";
            }
            ?>
    </table>
</pre>