<?php 
    require '../data/DataHandler.php';

    session_start();
?>

<h2>Public</h2>
<u1>
<li><a href="user_api">user api</a></li>
</u1>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='{$filename}'>{$filename}</a></li>";
}
?>

<?php


    if(!isset($_SESSION['test0'])) {
        $_SESSION['test0'] = [
            new DataHandler()
        ];
    }








