<?php
  // Include config file
  require_once "../includes/config.php";

  if (isset($_POST['submit'])) {
  	# code...


  	//Loop through the entered values

  	for($i = 0; $i< (int)$_POST['total_num']; $i++){
  		$pupilID =  $_POST['pupil_id'][$i];//mysqli_real_escape_string($mysqli, $_POST['pupil_id']);
  		$status_selected = $_POST['select_status'][$i];
  		$timestamp = date("Y-m-d H:i:s"); 

  
  		$today = date('l');
  		$date = date('Y-m-d H:i:s');
  		$term_id = 1;
  		$grade = 1 + $_POST['classID'];


  		$status = "";

  		if ($status_selected == 'uppergrade') {
  			# code...
        echo $pupilID;
          $update = "UPDATE pupil SET grade = '$grade', dateModified = '$timestamp' WHERE pupilID = '$pupilID'";
        if(mysqli_query($mysqli, $update)){
          echo "Moved";
        }else {
          echo "Not moved";
        }

        // Record track for the given year
        // Replace $timestamp with a single year in production
        $recordTracker = "INSERT INTO tracking(pupilID, grade, dateModified) VALUES ('$pupilID', '$grade', '$timestamp') ";
        if(mysqli_query($mysqli, $recordTracker)){
          echo "Tracked";
        }else {
          echo "Not tracked";
        }


  		}else if ($status_selected == 'remain') {
  			# code...
  		}

  		//insert query



  	}
  }else {
  	echo "Nigga";
  }

?>