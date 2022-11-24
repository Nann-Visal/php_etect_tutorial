<?php 
    function sum(){
        $a=10;
        $b=20;
        return ($a+$b);
    }
    echo 'sum = '.sum();

    function changeName($param){
        $param = 'Panha';
        return $param;
    }
    echo 'Name : '.changeName('sok');
?>