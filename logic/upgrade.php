<?php
  // Include config file
  require_once "../includes/config.php";


$jsonArray = json_decode($_POST['source1']);

echo $_POST['source1'];

var_dump($jsonArray);

print_r($jsonArray);

foreach($jsonArray as $idAndGrade){
    echo "PupilID: " . $idAndGrade->id . ", Grade: " . $idAndGrade->grade  . "<br/>";
}


$src1= $_POST['source1'];
$array = explode(",", $src1);

print_r($array);


?>