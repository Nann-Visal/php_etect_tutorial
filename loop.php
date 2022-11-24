<?php
    for($i=0;$i<=10;$i++){
        echo $i.'';
    }
    echo '<br>';
    $i=10;
    while($i>=1){
        echo 'i : '.$i.'</br>';
        $i--;
    }
    $y=1;
    while($y<=10){
        echo '<h1> Loop Number :'.$y.'</h1>';
        $y++;
    }
    $arr = array(
        'id'=>'ETECT001',
        'name'=>'Visal',
        'age'=>19,
        'school'=>'RUPP'
    );
    foreach($arr as $key => $value){
        echo '<h1>'.$key.':'.$value.'</h1>';
    }
    $ar = array('Visal',45,'sok',52);
    foreach($ar as $item){
        echo 'item:'.$item.'<br>';
    }
?>