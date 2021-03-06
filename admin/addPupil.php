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

    //pupil data
    $firstPName = mysqli_real_escape_string($mysqli, $_POST['firstPName']);
	$lastPName = mysqli_real_escape_string($mysqli, $_POST['lastPName']);
    $otherPName = mysqli_real_escape_string($mysqli, $_POST['otherPName']);
    $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
    $grade = mysqli_real_escape_string($mysqli, $_POST['grade']);
    $yearEnrolled = mysqli_real_escape_string($mysqli, $_POST['year']);


    
    $fullName = '';

	//check if other name is provided
	if ($otherName != null || $otherName != '') {
		# code...
		$fullName = $firstName." ".$otherName." ".$lastName;
	} else {
		$fullName = $firstName." ".$lastName;
    }

    $fullPName = '';

	//check if other name is provided
	if ($otherPName != null || $otherPName != '') {
		# code...
		$fullPName = $firstPName." ".$otherPName." ".$lastPName;
	} else {
		$fullPName = $firstPName." ".$lastPName;
    }

    $sqlSelect = "SELECT * FROM parent WHERE parentName = '$fullPName'";
    $results = mysqli_query($mysqli, $sqlSelect);
    if (mysqli_num_rows($results) > 0) {
        # code...
        $id = "";
        while ($rows = mysqli_fetch_assoc($results)) {
            # code...
            $id = ['parentID'];
        }

        $pupilSQL = "INSERT INTO pupil(`pupilName`, `parentID`, `dateOfBirth`, `grade`, `yearstarted`) VALUES (?, ?, ?, ?, ?)";
            if($stmts = $mysqli->prepare($pupilSQL) ){
                $stmts->bind_param("sisis", $fullPName, $id, $dob, $grade, $yearEnrolled);

                if($stmts->execute()){
                    $_SESSION['message'] = "Pupil ".$fullPName." was successfully enrolled";

                } else {
                    echo "Error ". $stmt->error;
                }
            }else {
                echo "Error ". $stmt->error;
            }

    }else {

        //SQL command
        $sql = "INSERT INTO parent(`parentName`, `phoneNumber`, `address`, `dateCreated`) VALUES (?, ?, ?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("ssss", $fullName, $phoneNumber, $address, $timestamp);

            if($stmt->execute()){
                $lastID = $stmt->insert_id;
                //add the pupil details

                $pupilSQL = "INSERT INTO pupil(`pupilName`, `parentID`, `dateOfBirth`, `grade`, `yearstarted`) VALUES (?, ?, ?, ?, ?)";
                if($stmts = $mysqli->prepare($pupilSQL) ){
                    $stmts->bind_param("sisis", $fullPName, $lastID, $dob, $grade, $yearEnrolled);

                    if($stmts->execute()){
                        $_SESSION['message'] = "Pupil ".$fullPName." was successfully enrolled";

                    } else {
                        echo "Error ". $stmt->error;
                    }
                }else {
                    echo "Error ". $stmt->error;
                }


            }else {
                echo "Error ". $stmt->error;
            }
        } else {
            echo "Error ". $stmt->error;
        }
    }




}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Pupil</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ padding: 5px; margin-left: 30%; margin-top:2% }
    </style>
</head>
<body>
<?php
require_once '../includes/navbar_header.php';

?>

    <div class="container">
    <div class="wrapper">

        <?php
             if(isset($_SESSION['message'])){
                echo '<p class="alert alert-success a-flex flex-row">'.$_SESSION['message'].'</p>';
                unset($_SESSION['message']);
                // header('Refresh: 1; URL=move.php?grade='.$gradeView);
            }
        ?>
        <h2>Add A Pupil</h2>


       
        <form class="form-group" action="" method="POST">
            <h3> Parents/Guardians Section </h3>
   
            <div class="col-sm-6">
			
				<label>First Name</label>
				<input type="text" name="firstName" required placeholder="First-Name" class="form-control">

			</div>
			<div class="col-sm-6">
				<label>Last Name</label>
				<input type="text" name="lastName" required placeholder="Last-Name" class="form-control">

			</div> 
           
		
			<div class="col-sm-6">
				<label>Other Name</label>
				<input type="text" name="otherName" placeholder="Other-Name [Middle Name]" class="form-control">

			</div>
			<div class="col-sm-6">
				<label>Phone Number</label>
				<input type="text" name="phoneNumber" required placeholder="Phone Number" class="form-control">

			</div>
		
			<div class="col-sm-6">
				<label>Physical Address</label>
				<input type="text" name="address" placeholder="Address" class="form-control">

			</div>
            <hr>
            <h3 align="left">Pupils Sections</h3>
            <div class="col-sm-6">
            	<label>First Name</label>
				<input type="text" name="firstPName" required placeholder="First-Name" class="form-control">

			</div>
			<div class="col-sm-6">
				<label>Last Name</label>
				<input type="text" name="lastPName" required placeholder="Last-Name" class="form-control">

			</div> 
			<div class="col-sm-6">
				<label>Other Name</label>

				<input type="text" name="otherPName" placeholder="Other-Name [Middle Name]" class="form-control">

			</div>
			<div class="col-sm-6">
				<label>Date of Birth</label>
				<input type="date" name="dob" required placeholder="Date of birth" class="form-control">

			</div>	
             <div class="col-sm-6">
				<label>Select Grade</label>

                <select name="grade" class="form-control">
                    <option id="1">1</option>
                    <option id="2">2</option>
                    <option id="3">3</option>
                    <option id="4">4</option>
                    <option id="5">5</option>
                    <option id="6">6</option>
                    <option id="7">7</option>
                </select>
			</div>
		
	
			<div class="col-sm-6">
				<label>Year enrolled</label>
				<input type="date" required name="year" placeholder="Year enrolled" class="form-control">

			</div>
			
            <br>
			<div class="col-sm-12">
				<input type="submit" name="submit" value="Add Pupil" class="form-control btn btn-primary" style="width: 20%;">

			</div>

		</form>

    </div>    
</body>
</html>