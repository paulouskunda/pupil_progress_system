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
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    
    <style type="text/css">
        /* .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        } */
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            // $('[data-toggle="tooltip"]').tooltip();,
            $('#myTable').DataTable();
        });
    </script>
</head>
<body>
<?php
require_once '../includes/navbar_header.php';

?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Pupil Details</h2>
                        <!-- <a href="create.php" class="btn btn-success pull-right">Add New Employee</a> -->
                    </div>
                    <?php
                    // Include config file
                    require_once "../includes/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM pupil ";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo "<table id='myTable'  class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>DOB</th>";
                                        echo "<th>Grade</th>";
                                        echo "<th>Date Enrolled</th>";
                                        echo "<th>Active Status</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['pupilID'] . "</td>";
                                        echo "<td>" . $row['pupilName'] . "</td>";
                                        echo "<td>" . $row['dateOfBirth'] . "</td>";
                                        echo "<td>" . $row['grade'] . "</td>";
                                        echo "<td>" . $row['yearStarted'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['pupilID'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            // echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            // echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html
