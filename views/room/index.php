
<h2>Room</h2>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='room/{$filename}'>{$filename}</a></li>";
}
?>








