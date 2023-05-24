<?php
$file = 'student.txt';
$data = file_get_contents($file);

// Tách dữ liệu thành một mảng chứa từng phần tử
$lines = explode("\n", $data);

// Tách từng phần tử thành các giá trị
$data_array = array();
foreach ($lines as $line) {

    $values = explode(",", $line);

    $data_array[] = array(
        'id' => trim($values[0]),
        'name' => trim($values[1]),
        'age' => trim($values[2])
    );
}

// Chuyển đổi mảng thành định dạng JSON
$json = json_encode($data_array);

// In kết quả
echo $json;




$file_test = fopen($filename, 'a+');

rewind($file_test);

$data = fread($file_test, filesize($filename));

// $data = file_get_contents($filename);
// Tách dữ liệu thành một mảng chứa từng phần tử
$lines = explode("\n", $data);

// Tách từng phần tử thành các giá trị
$data_array = [];
foreach ($lines as $line) {
    $values = explode(',', $line);
    $data_array[] = [
        'first_name' => trim($values[0]),
        'last_name' => trim($values[1]),
        'age' => trim($values[2]),
    ];
}

$json = json_encode($data_array);

$this->list_student = $json;
