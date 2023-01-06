<h2>show all</h2>
<ul>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='database/{$filename}'>{$filename}</a></li>";
}
?>
</ul>