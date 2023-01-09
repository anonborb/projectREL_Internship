<h2>API System Commands</h2>
<ul>
    
<li><a href="api/equipment">Equipment Commands</a></li>
<li><a href="api/room">Room Commands</a></li>

<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='api/{$filename}'>{$filename}</a></li>";
}
?>
</ul>