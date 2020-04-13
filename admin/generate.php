<?php
  // Include config file
  require_once "../includes/config.php";
/**
 * A report generate 
 * 
 */
$getParam = $_POST['reportType'];

//import the pdf
require './pdfGen/fpdf.php';
$pdf = new FPDF('P','mm','A3');
$pdf->SetTitle('FPDF tutorial'); 
//add new page

$pdf->AddPage();

//set up the font

$pdf->SetFont('Arial','B',14);
// echo $getParam;
if($getParam == 'allPupils'){
    
    // $pdf->
    $pdf->Ln();
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(270,5,'All Pupils REPORT ',0,0,'R');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(290,5,'De Progress Primary ',0,0,'C');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(290,5,'All Pupils REPORT',0,0,'C');
    
    $pdf->Ln();
    $pdf->Ln();
    //Query the results

    $SQL = "SELECT * FROM pupil, parent WHERE pupil.parentID = parent.parentID 
                ORDER BY pupil.yearStarted ASC";

    $results = mysqli_query($mysqli, $SQL);

    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(60 ,5,'Full Name',1,0);
    $pdf->Cell(40 ,5,'Date of Birth',1,0);
    $pdf->Cell(50 ,5,'Parent Name',1,0);
    $pdf->Cell(60,5,'Address',1,0);
    $pdf->Cell(30,5,'Grade',1,0);
    $pdf->Cell(34,5,'Year Enrolled',1,1);//end of line

    $pdf->Cell(274, 5, '',1,1);


    if(mysqli_num_rows($results) > 0){

        while($getAllPupils = mysqli_fetch_assoc($results)){

            $pdf->Cell(60, 5, ''.$getAllPupils['pupilName'],1,0);
            $pdf->Cell(40, 5, ''.$getAllPupils['dateOfBirth'],1,0);
            $pdf->Cell(50, 5, ''.$getAllPupils['parentName'],1,0);
            $pdf->Cell(60, 5, ''.$getAllPupils['address'],1,0);
            $pdf->Cell(30, 5, ''.$getAllPupils['grade'],1,0);
            $pdf->Cell(34, 5, ''.$getAllPupils['yearStarted'],1,0);
            $pdf->Ln(); //print next row on a new line

        }
    }

    $pdf->Output();

} else if ($getParam == 'inGrade'){

    $grade = $_POST['grade'];
        // $pdf->
        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(270,5,'All PUPILS IN GRADE '.$grade.' REPORT ',0,0,'R');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(290,5,'De Progress Primary ',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(290,5,'All PUPILS IN GRADE '.$grade.' REPORT ',0,0,'C');
        
        $pdf->Ln();
        $pdf->Ln();
        //Query the results
    
        $SQL = "SELECT * FROM pupil, parent WHERE pupil.parentID = parent.parentID AND pupil.grade = '$grade' 
                    ORDER BY pupil.pupilName ASC";

        $results = mysqli_query($mysqli, $SQL);
    
        $pdf->SetFont('Arial','B',12);
    
        $pdf->Cell(60 ,5,'Full Name',1,0);
        $pdf->Cell(40 ,5,'Date of Birth',1,0);
        $pdf->Cell(50 ,5,'Parent Name',1,0);
        $pdf->Cell(60,5,'Address',1,0);
        $pdf->Cell(30,5,'Grade',1,0);
        $pdf->Cell(34,5,'Year Enrolled',1,1);//end of line
    
        $pdf->Cell(274, 5, '',1,1);
    
    
        if(mysqli_num_rows($results) > 0){
    
            while($getAllPupils = mysqli_fetch_assoc($results)){
    
                $pdf->Cell(60, 5, ''.$getAllPupils['pupilName'],1,0);
                $pdf->Cell(40, 5, ''.$getAllPupils['dateOfBirth'],1,0);
                $pdf->Cell(50, 5, ''.$getAllPupils['parentName'],1,0);
                $pdf->Cell(60, 5, ''.$getAllPupils['address'],1,0);
                $pdf->Cell(30, 5, ''.$getAllPupils['grade'],1,0);
                $pdf->Cell(34, 5, ''.$getAllPupils['yearStarted'],1,0);
                $pdf->Ln(); //print next row on a new line
    
            }
        }
    
        $pdf->Output();
    

} else if($getParam == 'complex'){
    
    $reason = $_POST['reasonType'];
        // $pdf->
        
        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(270,5,'All '.strtoupper($reason).' PUPILS REPORT ',0,0,'R');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(290,5,'De Progress Primary ',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(290,5,'All '.strtoupper($reason).' PUPILS REPORT ',0,0,'C');
        
        $pdf->Ln();
        $pdf->Ln();
        //Query the results
    
        if($reason == 'active'){

            $SQL = "SELECT * FROM pupil, parent WHERE pupil.parentID = parent.parentID AND pupil.activeStatus = 'active' 
                        ORDER BY yearStarted ASC " ;
            $results = mysqli_query($mysqli, $SQL);
        
            $pdf->SetFont('Arial','B',12);
        
            $pdf->Cell(60 ,5,'Full Name',1,0);
            $pdf->Cell(40 ,5,'Date of Birth',1,0);
            $pdf->Cell(50 ,5,'Parent Name',1,0);
            $pdf->Cell(60,5,'Address',1,0);
            $pdf->Cell(30,5,'Grade',1,0);
            $pdf->Cell(34,5,'Year Enrolled',1,1);//end of line
        
            $pdf->Cell(274, 5, '',1,1);
            // $pdf->Ln();
        
            if(mysqli_num_rows($results) > 0){
        
                while($getAllPupils = mysqli_fetch_assoc($results)){
        
                    $pdf->Cell(60, 5, ''.$getAllPupils['pupilName'],1,0);
                    $pdf->Cell(40, 5, ''.$getAllPupils['dateOfBirth'],1,0);
                    $pdf->Cell(50, 5, ''.$getAllPupils['parentName'],1,0);
                    $pdf->Cell(60, 5, ''.$getAllPupils['address'],1,0);
                    $pdf->Cell(30, 5, ''.$getAllPupils['grade'],1,0);
                    $pdf->Cell(34, 5, ''.$getAllPupils['yearStarted'],1,0);
                    $pdf->Ln(); //print next row on a new line
        
                }
            }


        } else if($reason == 'suspended'){

            $SQL = "SELECT * FROM pupil, parent, reasons WHERE pupil.parentID = parent.parentID AND 
            pupil.pupilID = reasons.pupilID AND reasons.reason = '$reason' AND pupil.activeStatus = '$reason' 
                        ORDER BY yearStarted ASC " ;
            $results = mysqli_query($mysqli, $SQL);
        
            $pdf->SetFont('Arial','B',12);
        
            $pdf->Cell(60 ,5,'Full Name',1,0);
            $pdf->Cell(40 ,5,'Date of Birth',1,0);
            $pdf->Cell(50 ,5,'Parent Name',1,0);
            $pdf->Cell(60,5,'Address',1,0);
            $pdf->Cell(30,5,'Grade',1,0);
            $pdf->Cell(34,5,'Year Enrolled',1,1);//end of line
        
            $pdf->Cell(274, 5, '',1,1);
        
        
            if(mysqli_num_rows($results) > 0){
        
                while($getAllPupils = mysqli_fetch_assoc($results)){
        
                    $pdf->Cell(60, 5, ''.$getAllPupils['pupilName'],1,0);
                    $pdf->Cell(40, 5, ''.$getAllPupils['dateOfBirth'],1,0);
                    $pdf->Cell(50, 5, ''.$getAllPupils['parentName'],1,0);
                    $pdf->Cell(60, 5, ''.$getAllPupils['address'],1,0);
                    $pdf->Cell(30, 5, ''.$getAllPupils['grade'],1,0);
                    $pdf->Cell(34, 5, ''.$getAllPupils['yearStarted'],1,0);
                    $pdf->Ln(); //print next row on a new line
        
                }
            }



        } else if ($reason == 'notProgress'){
            $SQL = "SELECT * FROM pupil, parent, reasons WHERE pupil.parentID = parent.parentID AND 
            pupil.pupilID = reasons.pupilID AND reasons.reason = '$reason' AND pupil.activeStatus = '$reason' 
                        ORDER BY yearStarted ASC " ;
            $results = mysqli_query($mysqli, $SQL);
        
            $pdf->SetFont('Arial','B',12);
        
            $pdf->Cell(60 ,5,'Full Name',1,0);
            $pdf->Cell(40 ,5,'Date of Birth',1,0);
            $pdf->Cell(50 ,5,'Parent Name',1,0);
            $pdf->Cell(60,5,'Address',1,0);
            $pdf->Cell(30,5,'Grade',1,0);
            $pdf->Cell(34,5,'Year Enrolled',1,1);//end of line
        
            $pdf->Cell(274, 5, '',1,1);
        
        
            if(mysqli_num_rows($results) > 0){
        
                while($getAllPupils = mysqli_fetch_assoc($results)){
        
                    $pdf->Cell(60, 5, ''.$getAllPupils['pupilName'],1,0);
                    $pdf->Cell(40, 5, ''.$getAllPupils['dateOfBirth'],1,0);
                    $pdf->Cell(50, 5, ''.$getAllPupils['parentName'],1,0);
                    $pdf->Cell(60, 5, ''.$getAllPupils['address'],1,0);
                    $pdf->Cell(30, 5, ''.$getAllPupils['grade'],1,0);
                    $pdf->Cell(34, 5, ''.$getAllPupils['yearStarted'],1,0);
                    $pdf->Ln(); //print next row on a new line
        
                }
            }
        } else if ($reason == 'transfer'){

        }


        
    
        $pdf->Output();
    
}

else if($getParam == 'yearAndGrade'){
    
    $startYear = $_POST['startYear'];
    $endYear =$_POST['endYear'];
        // $pdf->
        $pdf->Ln();
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(270,5,'All PUPILS ENROLLED BEWTEEN '.$startYear.' -'.$endYear.' REPORT ',0,0,'R');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(290,5,'De Progress Primary ',0,0,'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(290,5,'All PUPILS ENROLLED BEWTEEN '.$startYear.' -'.$endYear.' REPORT ',0,0,'C');
        
        $pdf->Ln();
        $pdf->Ln();
        //Query the results
    
        $SQL = "SELECT * FROM pupil, parent WHERE pupil.parentID = parent.parentID 
                    AND YEAR(yearStarted)BETWEEN '$startYear'  AND '$endYear' ORDER BY yearStarted ASC ";
        $results = mysqli_query($mysqli, $SQL);
    
        $pdf->SetFont('Arial','B',12);
    
        $pdf->Cell(60 ,5,'Full Name',1,0);
        $pdf->Cell(40 ,5,'Date of Birth',1,0);
        $pdf->Cell(50 ,5,'Parent Name',1,0);
        $pdf->Cell(60,5,'Address',1,0);
        $pdf->Cell(30,5,'Grade',1,0);
        $pdf->Cell(34,5,'Year Enrolled',1,1);//end of line
    
        $pdf->Cell(274, 5, '',1,1);
    
    
        if(mysqli_num_rows($results) > 0){
    
            while($getAllPupils = mysqli_fetch_assoc($results)){
    
                $pdf->Cell(60, 5, ''.$getAllPupils['pupilName'],1,0);
                $pdf->Cell(40, 5, ''.$getAllPupils['dateOfBirth'],1,0);
                $pdf->Cell(50, 5, ''.$getAllPupils['parentName'],1,0);
                $pdf->Cell(60, 5, ''.$getAllPupils['address'],1,0);
                $pdf->Cell(30, 5, ''.$getAllPupils['grade'],1,0);
                $pdf->Cell(34, 5, ''.$getAllPupils['yearStarted'],1,0);
                $pdf->Ln();
    
            }
        }
    
        $pdf->Output();
    
<<<<<<< HEAD
}else if($getParam == 'endofyear'){

    /*Do the various Date Calculations*/
    $date=date_create("today");
    $todayDateFormat = date_format($date,"Y-m-d");
    //find out what the date was 3 days ago
    $previuousDates = date_sub($date,date_interval_create_from_date_string("3 days")); 
    $previuousDateFormat = date_format($previuousDates,"Y-m-d");
    
    // $pdf->
    $pdf->Ln();
    $pdf->SetFont('Arial','',10);
    
    $pdf->Cell(270,5,'All PUPILS WHO PROCEEDED TO NEXT GRADE REPORT',0,0,'R');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(290,5,'De Progress Primary ',0,0,'C');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(290,5,'All PUPILS WHO PROCEEDED TO NEXT GRADE REPORT',0,0,'C');
    
    $pdf->Ln();
    $pdf->Ln();
    //Query the results

    $SQL = "SELECT pupil.pupilName, pupil.grade as previous_grade,  
    tracking.grade as current_grade, parent.parentName, pupil.yearStarted
                FROM pupil, tracking, parent WHERE pupil.pupilID = tracking.pupilID 
                    AND pupil.parentID = parent.parentID 
                        AND YEAR(tracking.dateModified) BETWEEN '$todayDateFormat' AND '$previuousDateFormat'
                            HAVING pupil.grade < tracking.grade";

    $results = mysqli_query($mysqli, $SQL);

    $pdf->SetFont('Arial','B',12);

    $pdf->Cell(60 ,5,'Full Name',1,0);
    $pdf->Cell(40 ,5,'Prevoius grade',1,0);
    $pdf->Cell(50 ,5,'current grade',1,0);
    $pdf->Cell(60,5,'Parent Name',1,0);
    // $pdf->Cell(30,5,'Grade',1,0);
    $pdf->Cell(34,5,'Year Enrolled',1,1);//end of line

    $pdf->Cell(244, 5, '',1,1);


    if(mysqli_num_rows($results) > 0){

        while($getAllPupils = mysqli_fetch_assoc($results)){

            $pdf->Cell(60, 5, ''.$getAllPupils['pupilName'],1,0);
            $pdf->Cell(40, 5, ''.$getAllPupils['previous_grade'],1,0);
            $pdf->Cell(50, 5, ''.$getAllPupils['current_grade'],1,0);
            $pdf->Cell(60, 5, ''.$getAllPupils['parentName'],1,0);
            // $pdf->Cell(30, 5, ''.$getAllPupils['grade'],1,0);
            $pdf->Cell(34, 5, ''.$getAllPupils['yearStarted'],1,0);
            $pdf->Ln();

        }
    }

    $pdf->Output();
=======
}else if($getParam == 'singlePupil'){

    //This is the main report of the system.
    
>>>>>>> Report

}


?>