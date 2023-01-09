<h2>Data</h2>
<ul>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='data/{$filename}'>{$filename}</a></li>";
}
?>
</ul>