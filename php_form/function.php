<?php 
    class Person{
        public $id = 0;
        public $name = 'unknown';
        public $age = 0;
        public $gender = 'unknown';

        function setValue($id,$name,$age,$gender){
            $this->id = $id;
            $this->name = $name;
            $this->age = $age;
            $this->gender =  $gender;
        }
        function display(){
            echo 'Id         : '.$this->id.'<br>';
            echo 'Name       : '.$this->name.'<br>';
            echo 'Age        : '.$this->age.'<br>';
            echo 'Gender     : '.$this->gender.'<br>';
        }
    }
    class Student extends Person{
        public $scroe = 0;
        public $grade = 'unknown';

        function setValue($id,$name,$age,$gender,$score='',$grade=''){
            $this->score = $score;
            $this->grade = $grade;
            Person::setValue($id,$name,$age,$gender);
        }
        function display(){
            Person::display();
            echo 'Score      : '.$this->score.'<br>';
            echo 'Grade      : '.$this->grade.'<br>';
        }
    }
?>