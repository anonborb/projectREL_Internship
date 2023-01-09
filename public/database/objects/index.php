<h2>Objects</h2>
<ul>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='objects/{$filename}'>{$filename}</a></li>";
}
?>
</ul>