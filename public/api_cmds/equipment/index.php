<h2>Equipment Commands</h2>
<ul>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='equipment_cmds/{$filename}'>{$filename}</a></li>";
}
?>
</ul>