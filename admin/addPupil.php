<?php
error_reporting(E_ALL);

// Include config file
require_once "../includes/config.php";
//Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

if(isset($_POST['submit'])){

    //Get the passed values from the post method
    $firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
    $otherName = mysqli_real_escape_string($mysqli, $_POST['otherName']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);    
    $phoneNumber = mysqli_real_escape_string($mysqli, $_POST['phoneNumber']);
    $timestamp = date("Y-m-d H:i:s"); 
    $defaultPassword = '12345';

    
    $fullName = '';

	//check if other name is provided
	if ($otherName != null || $otherName != '') {
		# code...
		$fullName = $firstName." ".$otherName." ".$lastName;
	} else {
		$fullName = $firstName." ".$lastName;
    }



    //SQL command
    $sql = "INSERT INTO teacher(`teacherName`, `phoneNumber`, `address`, `password`, `dateCreated`) VALUES (?, ?, ?, ?, ?)";

    if($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("sssss", $fullName, $phoneNumber, $address, $defaultPassword, $timestamp);

        if($stmt->execute()){
            $_SESSION['message'] = "Teacher ".$fullName." added successfully";
        }else {
            echo "Error ". $stmt->error;
        }
    } else {
        echo "Error ". $stmt->error;
    }



}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pupil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 750px; padding: 20px; margin-left: 20%; margin-top:10% }
    </style>
</head>
<body>
    <div class="container">
    <div class="wrapper">
        <h2>Add A Pupil</h2>


       
        <form class="form-group" action="" method="POST">
            <h4> Parents/Guardians Sections </h4>

			<div class="col-sm-6">
				<input type="text" name="firstName" placeholder="First-Name" class="form-control">

			</div>
			<div class="col-sm-6">
				<input type="text" name="lastName" placeholder="Last-Name" class="form-control">

			</div> 
			<br><br><br>
			<div class="col-sm-6">
				<input type="text" name="otherName" placeholder="Other-Name [Middle Name]" class="form-control">

			</div>
			<div class="col-sm-6">
				<input type="text" name="phoneNumber" placeholder="Phone Number" class="form-control">

			</div>
			<br><br><br>
			<!-- <div class="col-sm-6">
				<input type="text" name="nrc" placeholder="Nrc Number" class="form-control">

			</div> -->
			<div class="col-sm-6">
				<input type="text" name="address" placeholder="Address" class="form-control">

			</div>
			<br><br><br>
            <h3>Pupils Sections</h3>
            <div class="col-sm-6">
				<input type="text" name="firstName" placeholder="First-Name" class="form-control">

			</div>
			<div class="col-sm-6">
				<input type="text" name="lastName" placeholder="Last-Name" class="form-control">

			</div> 
			<br><br><br>
			<div class="col-sm-6">
				<input type="text" name="otherName" placeholder="Other-Name [Middle Name]" class="form-control">

			</div>
			<div class="col-sm-6">
				<input type="text" name="phoneNumber" placeholder="Phone Number" class="form-control">

			</div>
			<br><br><br>
			<!-- <div class="col-sm-6">
				<input type="text" name="nrc" placeholder="Nrc Number" class="form-control">

			</div> -->
			<div class="col-sm-6">
				<input type="text" name="address" placeholder="Address" class="form-control">

			</div>
			<br><br><br>
			<!-- <div class="col-sm-6">
				<input type="text" name="email" placeholder="Email Address" class="form-control">

			</div> -->
			
			<div class="col-sm-12">	
				
			</div>

			<div class="col-sm-12">	
				
			</div>
			<br><br>
			<div class="col-sm-12">
							<input type="submit" name="submit" value="Add Teacher" class="form-control btn btn-primary" style="width: 20%;">

			</div>

		</form>

    </div>    
</body>
</html>