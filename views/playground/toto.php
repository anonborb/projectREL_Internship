<?php
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
session_start();
echo $_SESSION['data'][1]->add()->view();
var_dump($_SESSION['data']);