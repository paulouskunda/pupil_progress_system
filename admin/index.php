<?php
// Initialize the session
session_start();
 
//Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags for Bootstrap 4 -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap 4 CSS
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

</head>
<body>

<?php
require_once '../includes/navbar_header.php';

?>



<div class ="container" style="margin-top: 5%;">


<div class="row" >
<!-- Start of Card Deck Layout -->
<div class="card-deck" >
<div class="card">
<img class="card-img-top" src="https://img.webnots.com/2017/04/Bootstrap-Card-Image.png" alt="Card image cap">
<div class="card-body">
<h4 class="card-title">Reports</h4>
<p class="card-text">Generate Reports by clicking the link below</p>
</div>

<div class="card-footer">
<a href="reports.php" class="card-link">Check Reports                   &raquo;</a>
<!-- <small class="text-muted">Here is a footer</small> -->
</div>
</div>
<div class="card">
<img class="card-img-top" src="https://img.webnots.com/2017/04/Bootstrap-Card-Image.png" alt="Card image cap">
<div class="card-body">
<h4 class="card-title">Teacher</h4>
<p class="card-text">Here is a shorter description of the card.</p>
</div>

<div class="card-footer">
<!-- <small class="text-muted">Here is a footer</small> -->
<<<<<<< HEAD
<a href="addTeacher.php" class="card-link">Add Teacher  &raquo;</a>
=======
<a href="addTeacher.php" class="card-link">Add Teacher                                &raquo;</a>
>>>>>>> third commit
</div>
</div>

<!-- <div class="card">
<img class="card-img-top" src="https://img.webnots.com/2017/04/Bootstrap-Card-Image.png" alt="Card image cap">
<div class="card-body">
<h4 class="card-title">Card Title</h4>
<p class="card-text">Here is a very long description of the card and the height will be auto aligned with flex box. You can enter longer text to check the cards are aligned perfectly with same height without any gap.</p>
</div>
<div class="card-footer">
<a href="#" class="card-link">Card link</a>
<small class="text-muted">Here is a footer</small> -->
</div>
</div> 

</div>
</div>
</div>
<!-- End of Card Deck Layout -->
<!-- Bootstrap 4 Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>