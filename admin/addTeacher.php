<?php
error_reporting(E_ALL);

// Include config file
require_once "../includes/config.php";

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
    <title>Add Teacher</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{  padding: 5px; margin-left: 40%; margin-top:2% }
    </style>
</head>
<body>
		<?php 
       		 require_once '../includes/navbar_header.php';
        ?>

    <div class="container">
    <div class="wrapper">
        <h2>Add A Teacher</h2>
       
        <form class="form-group" action="" method="POST">
			<div class="col-sm-6">
                <label>FirstName</lable>
				<input type="text" name="firstName" required placeholder="First-Name" class="form-control">

			</div>
			<div class="col-sm-6">
            <label>LastName</lable>

				<input type="text" name="lastName" required placeholder="Last-Name" class="form-control">

			</div> 
			<div class="col-sm-6">
            <label>OtherName</lable>

				<input type="text" name="otherName" placeholder="Other-Name [Middle Name]" class="form-control">

			</div>
			<div class="col-sm-6">
            <label>Phone Number</lable>

				<input type="text" name="phoneNumber" placeholder="Phone Number" class="form-control">

			</div>
			
		
			<div class="col-sm-6">
            <label>Address</lable>

				<input type="text" name="address" placeholder="Address" class="form-control">

			</div>
		
			
			<div class="col-sm-12">	
				
			</div>
			<br>
			<div class="col-sm-12">
							<input type="submit" name="submit" value="Add Teacher" class="form-control btn btn-primary" style="width: 20%;">

			</div>

		</form>

    </div>    
</body>
</html>