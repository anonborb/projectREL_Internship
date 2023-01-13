<!DOCTYPE html>
<html>
<body>

<h1>Show Inventory</h1>

    <?php
        require_once __DIR__.'/../../data/DataHandler.php';
        session_start();
        
        $db = $_SESSION['testhandler'][0];
        $eq_list = $db->get_all_equipment();

        echo "<pre>";
        foreach ($eq_list as $eq_id => $eq) {
            $eq->print();
        }
    ?>

</body>
</html>