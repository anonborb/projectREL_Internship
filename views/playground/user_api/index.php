<h2>User view api</h2>
<ul>
    
<li><a href="user_api/equipment">Equipment Commands</a></li>
<li><a href="user_api/room">Room Commands</a></li>

<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='api/{$filename}'>{$filename}</a></li>";
}
?>
</ul>