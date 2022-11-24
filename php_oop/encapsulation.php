<?php 
    class Person{
        private $id = '100';
        private $name= 'Broosh';
        private $salary='1000';

        function setId($id){
            $this->id = $id;
        }
        function setName($name){
            $this->name = $name;
        }
        function setSalary($salary){
            $this->salary = $salary;
        }
        function getId(){
            return $this->id;
        }
        function getName(){
            return $this->name;
        }
        function getSalary(){
            return $this->salary;
        }
        function display(){
            echo '<h1> ID :'.$this->id.'</h1><br>';
            echo '<h1> Name :'.$this->name.'</h1><br>';
            echo '<h1> Salary :'.$this->salary.'</h1><br>';
        }
    }

    $person1 = new Person();
    $person1->setId(100);
    $person1->setName('Visal');
    $person1->setSalary(5000);
    echo '<h1> Get ID :'.$person1->getId().'</h1><br>';
    echo '<h1> Get Name :'.$person1->getName().'</h1><br>';
    echo '<h1> Get Salary :'.$person1->getSalary().'</h1><br>';
    $person1->display();
?>