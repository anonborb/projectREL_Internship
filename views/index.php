<?php 
    require '../data/DataHandler.php';

    session_start();
?>

<h2>Views</h2>
<u1>
<li><a href="inventory">inventory</a></li>
</u1>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='{$filename}'>{$filename}</a></li>";
}
?>

<?php
    session_unset();

    $_SESSION['testhandler'] = [
        new DataHandler()
    ];

    //var_dump($_SESSION['testhandler'][0]);








