<?php

class Student
{
    public $id;
    public $name;
    public $age;

    public function __construct($id, $name, $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return "$this->id, $this->name, $this->age";
    }
}

class StudentDAO
{
    public $filename;
    public $fileOpen;

    public function __construct($filename)
    {
        $openFile = fopen($filename, 'a+');

        $this->filename = $filename;
        $this->fileOpen = $openFile;
    }

    public function jsonEncode($data)
    {
        $lines = explode("\n", $data);

        $data_array = [];
        foreach ($lines as $line) {
            $values = explode(',', $line);
            $data_array[] = [
                'id' => trim($values[0]),
                'name' => trim($values[1]),
                'age' => trim($values[2]),
            ];
        }

        return json_encode($data_array);
    }

    public function create(Student $student)
    {
        $text = $student->__toString();
        fwrite($this->fileOpen, "\n$text");
    }

    public function getAll()
    {
        // rewind($this->fileOpen);

        $data = fread($this->fileOpen, filesize($this->filename));

        $json = $this->jsonEncode($data);

        return $json;
    }

    public function update(Student $student)
    {
        $data = fread($this->fileOpen, filesize($this->filename));
        $json = $this->jsonEncode($data);

        $array = json_decode($json);

        foreach ($array as $key => $element) {
            if ($element->id == $student->id) {
                unset($array[$key]);
                // return true;
            }
        }

        // $json = $this->jsonEncode($array);

        echo json_encode($array);
    }
}

$studentDao = new StudentDAO('./student.txt');

// $json = $studentDao->getAll();

$new_student = new Student(4, 'hung', 10);

$json = $studentDao->update($new_student);

// echo $json;
