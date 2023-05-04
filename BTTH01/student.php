<?php
class Student
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function sayHello()
    {
        echo 'Hello, my name is ' . $this->firstName . ' and I am ' . $this->lastName . ' years old.';
    }

    public function readfile()
    {

        $filename = './file.txt';
        $myfile = fopen($filename, "r");

        $contents = fread($myfile, filesize($filename)); //đọc file

        $convert = json_encode($contents);

        echo $convert;

        // đóng file
        fclose($myfile);
    }
}

$student1 = new Student('le', 'cuong');

$student1->readfile();
