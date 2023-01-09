<h2>Equipment Commands</h2>
<ul>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='equipment/{$filename}'>{$filename}</a></li>";
}
?>
</ul>