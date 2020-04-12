<?php
  // Include config file
  require_once "../includes/config.php";


$jsonArray = json_decode($_POST['source1']);

echo $_POST['source1'];

var_dump($jsonArray);

print_r($jsonArray);

$counter = 0;
$grade = '';
foreach($jsonArray as $idAndGrade){
    echo "PupilID: " . $idAndGrade->id . ", Grade: " . $idAndGrade->grade  . "<br/>";
    $grade = $idAndGrade->grade;
    $pupilID =  $idAndGrade->id;
    $update = "UPDATE pupil SET grade = '$grade' + 7 WHERE pupilID = '$pupilID'";
    mysqli_query($mysqli, $update);
    $counter += 1;
}

$_SESSION['upgradeMessage'] = 'A total of '.$counter . " pupils upgraded to grade ". $grade.'<br> ';

$src1= $_POST['source1'];
$array = explode(",", $src1);

print_r($array);


?>