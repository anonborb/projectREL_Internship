<h2>Room Commands</h2>
<ul>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='room_cmds/{$filename}'>{$filename}</a></li>";
}
?>
</ul>