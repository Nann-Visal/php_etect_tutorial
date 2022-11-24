<?php 
    class Person{
        public $id      = 0;
        public $name    = 'unknown';
        public $age     = 0;
        public $gender  = 'unknown';

        function setValue($id,$name,$age,$gender){
            $this->id = $id;
            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
        }
        function display(){
            echo 'Id     : '.$this->id.'<br>';
            echo 'Name   : '.$this->name.'<br>';
            echo 'Age    : '.$this->age.'<br>';
            echo 'Gender : '.$this->gender.'<br>';
        }
    }
    class Student extends Person{
        public $score = 0;
        public $grade = 'unknown';
        function display(){
            //$this->display(); or 
            Person::display();
            echo 'Score   : '.$this->score.'<br>';
            echo 'Grade   : '.$this->grade.'<br>';
        }
        function setValue($id,$name,$age,$gender,$score='',$grade=''){
            $this->score = $score;
            $this->grade = $grade;
            Person::setValue($id,$name,$age,$gender);
        }
    }
    $student = new Student();
    $student->setValue(1001,'Nann Visal',19,'Male',99,'A');
    $student->display(); 
?>