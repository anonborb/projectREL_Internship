<h2>Database</h2>
<ul>
<li><a href="database/objects">objects</a></li>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='database/{$filename}'>{$filename}</a></li>";
}
?>
</ul>