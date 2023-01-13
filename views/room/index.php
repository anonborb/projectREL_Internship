
<h2>Inventory</h2>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='inventory/{$filename}'>{$filename}</a></li>";
}
?>








