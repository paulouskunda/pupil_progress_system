<?php
// Initialize the session
require_once "../includes/config.php";
 
//Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
require_once '../includes/navbar_header.php';

?>


<?php
    if(isset($_POST['upload_file'])){
        $_GET_FILE = $_FILES['exam_file']['name'];
        $_SET_TEMP = $_FILES['exam_file']['tmp_name'];

        $_SET_TARGET_DIR = "";
        $_SET_TARGET = $_SET_TARGET_DIR.basename($_GET_FILE);
        $_MOVE_THE_FILE = move_uploaded_file($_SET_TEMP, $_SET_TARGET);

        if($_MOVE_THE_FILE){
            // get the file uploaded 
            $_FILE_FROM_SYS = file_get_contents($_GET_FILE);
            $_DOCUMENT_FILE = explode("\n", $_FILE_FROM_SYS);
            echo sizeof($_DOCUMENT_FILE);

            $i = 0;
            foreach($_DOCUMENT_FILE as $line){
                $i++;
                if($i==1)continue;
                $csv = explode(",", $line);
                $exam_grade = trim($csv[0]);
                $exam_intake = trim($csv[1]);
                // echo trim($csv[1]);
                $pupil_exam_id = trim($csv[2]);
                $exams_marks_obtained = trim($csv[3]);
                $school_of_origin = trim($csv[4]);
                $school_passed_to = trim($csv[5]);

                // check if the current pupil is already in the system 

                $checkIfAllISWell = "SELECT * FROM examinations 
                                      WHERE pupil_exam_id ='$pupil_exam_id'
                                      AND exam_grade = '$exam_grade'";
                $checkQuery = $mysqli->query($checkIfAllISWell);
                if($checkQuery->num_rows > 0){
                    echo "<script>
                            console.log('This pupil ".$pupil_exam_id." is in the system already');
                        </script>";
                    continue;
                }else{
                    $runTheInsertQuery = "INSERT INTO examinations (exam_grade, exam_intake, pupil_exam_id, exams_marks_obtained, school_of_origin, school_passed_to)
                    VALUES ('$exam_grade', '$exam_intake', '$pupil_exam_id', '$exams_marks_obtained', '$school_of_origin', '$school_passed_to')";
                    if(!$mysqli->query($runTheInsertQuery)){
                        echo $mysqli->error();
                    }
                }






            }
        }

    }
?>

<!DOCTYPE html>
<html>
    <head>
    <title>ECZ-PORTAL</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            // $('[data-toggle="tooltip"]').tooltip();,
            $('#myTable').DataTable();
        });
    </script>

    </head>
    <body>
    <div class ="container" style="margin-top: 5%;">

        <h2>WELCOME TO THE ECZ PORTAL</h2>
        <form class="form-group" method="POST" enctype="multipart/form-data" >
            <label> Pick a file with results: .csv </label>
            <input type="file" name="exam_file" class="form-control"/>
            <input type="submit" name="upload_file" class="btn btn-success" value="Upload CSV"/>
        </form>

        <table id='myTable'  class='table table-bordered table-striped'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Examination Grade </th>
                    <th>Examination Year </th>
                    <th>Date Uploaded </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sqlExaminations = "SELECT * FROM examinations GROUP BY exam_intake";
                    $i = 1;
                    if($results = $mysqli->query($sqlExaminations)){
                        if($results->num_rows > 0){
                            while($rows = $results->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>".$i++."</td>";
                                echo "<td>".$rows['exam_grade']."</td>";
                                echo "<td>".$rows['exam_intake']."</td>";
                                echo "<td>".$rows['date_uploaded']."</td>";
                                echo "</tr>";

                            }
                            $results->free();

                        }else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    }else{
                        echo "<p class='lead'><em>We faced an error.</em></p>";

                    }
       
                ?>
            </tbody>
        </table>
    </div>

    </body>
</html>