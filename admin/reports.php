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
               
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Report Types</strong>
                    </div>
                    <div class="card-body">

                    <form action="generate.php" method="POST"> 
                        <div class="col-sm-12">
                            <label>Report Types</label>
                            <select class="form-control" name="reportType" onChange="reportSelect(this)">
                                <option id="allPupils" value="allPupils"> All Pupils</option>
                                <option id="inGrade" value="inGrade"> All Pupils in Grade </option>
                                <option id="yearAndGrade" value="yearAndGrade"> All Pupils in </option>
                                <option id="complex" value="complex"> All Pupils that are </option>
                                <option id="endofyear" value="endofyear"> End of Year Report</option>
                                
                            </select>
                        </div>

                        <div class="col-sm-12" id="hidden_grade" style="display: none;">
                        <label>Grade </label>
                        <select class="form-control" name="grade" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                                
                        </select>
                    </div> 

                    <div class="col-sm-12" id="hidden_year" style="display: none;">
                        <label>Year Between</label><br>
                        <label class="control-label mb-1">From </label>
                        <select class="form-control" name="startYear" >
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            
                                
                        </select>  
                        <label class="control-label mb-1">To</label>
   
                         <select class="form-control" name="endYear" >
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            
                                
                        </select>
                    </div>
                        <br>

                        <div class="col-sm-12" id="hidden_reason" style="display: none;">
                        <label>Reason Type </label>
                        <select class="form-control" name="reasonType" >
                            <option value="active">Active</option>
                            <option value="suspended">Suspended</option>
                            <option value="notProgress">No Progress</option>
                            <option value="transfer">Transfer</option>                               
                        </select>
                    </div>    

                        <input type="submit" value="submit"/>
                    </form>


                    </div>
                </div>
              
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

    <!-- SCRIPT -->
    <script>
        function reportSelect(select) {
            if(select.value == 'inGrade' || select.value == 'All Pupils in Grade'){
                document.getElementById('hidden_grade').style.display = "block";
                document.getElementById('hidden_year').style.display = "none";
                document.getElementById('hidden_reason').style.display = "none";
                
            }else if(select.value == 'yearAndGrade' || select.value == 'All Pupils in'){
                document.getElementById('hidden_grade').style.display = "block";
                document.getElementById('hidden_year').style.display = "block";
                document.getElementById('hidden_reason').style.display = "none";

            }else if(select.value == 'complex' || select.value == 'All Pupils that are'){
                document.getElementById('hidden_grade').style.display = "none";
                document.getElementById('hidden_year').style.display = "none";
                document.getElementById('hidden_reason').style.display = "block";

            }else {
                document.getElementById('hidden_grade').style.display = "none";
                document.getElementById('hidden_year').style.display = "none";
                document.getElementById('hidden_reason').style.display = "none";
            }
        }
    </script>

</body>
</html
