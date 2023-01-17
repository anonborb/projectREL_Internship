
<h2>Equipment</h2>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='equipment/{$filename}'>{$filename}</a></li>";
}
?>
