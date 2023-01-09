<h2>API System Commands</h2>
<ul>
    
<li><a href="api_system_cmds/equipment_cmds">Equipment Commands</a></li>
<li><a href="api_system_cmds/room_cmds">Room Commands</a></li>

<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='api_system_cmds/{$filename}'>{$filename}</a></li>";
}
?>
</ul>