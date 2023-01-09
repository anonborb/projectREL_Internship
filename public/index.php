<?php 
    require 'data/DataHandler.php';

    session_start();

    class A{
        public function __construct(public int $h)
        {
            
        }

        public function add(){
            $this->h++;
            return $this;
        }

        public function view(){
            echo $this->h;
        }

    }
?>

<h2>Public</h2>
<u1>
<li><a href="data">data</a></li>
<li><a href="user_api">user api</a></li>
<li><a href="utility">utility</a></li>
</u1>
<?php
foreach (glob("*.php") as $filename) {
    echo "<li><a href='{$filename}'>{$filename}</a></li>";
}
?>

<?php

    if(!isset($_SESSION['data'])){
    $_SESSION['data']=[
        new A(1),
        new A(76)
    ];
    }

    if(!isset($_SESSION['boo'])) {
        $_SESSION['boo'] = [
            new Equipment("testing1", 20, 40)
        ];
    }

    if(!isset($_SESSION['foo'])) {
        $_SESSION['foo'] = [
            new Room("testing2", 30)
        ];
    }



    if(!isset($_SESSION['mmm'])) {
        $_SESSION['mmm'] = [
            new DataHandler()
        ];
    }








