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
    $grade = 1 + $idAndGrade->grade;
    $pupilID =  $idAndGrade->id;
    $timestamp = date("Y-m-d H:i:s"); 
    $update = "UPDATE pupil SET grade = '$grade', dateModified = '$timestamp' WHERE pupilID = '$pupilID'";
    mysqli_query($mysqli, $update);

    // Record track for the given year
    // Replace $timestamp with a single year in production
    $recordTracker = "INSERT INTO tracking(pupilID, grade, dateModified) VALUES ('$pupilID', '$grade', '$timestamp') ";
    mysqli_query($mysqli, $recordTracker);

    //total students data recorded
    $counter += 1;
}

$_SESSION['upgradeMessage'] = 'A total of '.$counter . " pupils upgraded to grade ". $grade.'<br> ';

$src1= $_POST['source1'];
$array = explode(",", $src1);

print_r($array);


?>