<h2>Room Commands</h2>
<ul>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='room/{$filename}'>{$filename}</a></li>";
}
?>
</ul>