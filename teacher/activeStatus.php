<?php
    // Include config file
    require_once "../includes/config.php";
    
    //check if the id was set

    if(isset($_GET['id'])){
        $pupilID = $_GET['id'];
        $pupilName = '';
        $parentName = '';
        $parentPhoneNumber = '';

        $SQL = "SELECT * FROM pupil, parent WHERE pupil.pupilID = '$pupilID' AND "

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags for Bootstrap 4 -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 850px; padding: 20px; margin-left: 20%; margin-top:10% }
</style>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <h2>Change Active Status</h2>


       
        <form class="form-group" action="" method="POST">
            <h4> Active Status Modifications </h4>

			<div class="col-sm-6">
                <label>Pupil Name</label>
				<input type="text" name="fullName" placeholder="Pupil" class="form-control">

			</div><br>
			<div class="col-sm-6">
               <label>Parent Name</label>
				<input type="text" name="parentName" placeholder="Parent Name" class="form-control">

			</div> 
			<br>

			<div class="col-sm-6">
            <label>Parent Contact Number</label>

				<input type="text" name="phoneNumber" placeholder="Phone Number" class="form-control">

			</div>

			<br><br><br>
            <div class="col-sm-6">
            <label>Active Status</label>

                <select name="activeStatus" class="form-control" onChange="accountSelect(this)">
                        <option id="select">
                            ~Select~
                        </option>
                        <option id="active">Active</option>
                        <option id="suspended">
                            Suspended
                        </option>
                        <option id="transfered">
                            Transfered
                        </option>
                        <option id="dropout">
                            Drop Out
                        </option>
                </select>	
			</div><br>
           
            <div class="col-sm-6" id="hidden_div" style="display: none;">
            <label>Reason</label>
                    <input type="text" name="reason" placeholder="reason why the pupil is still in the same grade"  class="form-control"/>
                    <br>
            </div>
         
            <div class="col-sm-6">
                <textarea placeholder="Reason  in details" class="form-control"></textarea>
            </div>
        </form>
    </div>
</div>

<script>
 function accountSelect(select) {
            // document.getElementById('hidden_div');
            if (select.value == 'active' || select.value == 'Active') {
                    document.getElementById('hidden_div').style.display = "block";
                  
            } else  {
                    document.getElementById('hidden_div').style.display = "none";
            }
 }
</script>
</body>
</html>