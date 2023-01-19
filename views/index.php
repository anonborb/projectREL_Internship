<?php 
    require '../data/DataHandler.php';

?>

<h2>Views</h2>
<u1>
<li><a href="room">Room</a></li>
<li><a href="equipment">Equipment</a></li>
</u1>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='{$filename}'>{$filename}</a></li>";
}
?>








