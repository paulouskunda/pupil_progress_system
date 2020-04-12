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

    $SQL = "SELECT * FROM pupil, parent WHERE pupil.parentID = parent.parentID";
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
    
        $SQL = "SELECT * FROM pupil, parent WHERE pupil.parentID = parent.parentID AND pupil.grade = '$grade'";
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
                
    
            }
        }
    
        $pdf->Output();
    

} else if($getParam == ''){
    
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
    
        $SQL = "SELECT * FROM pupil, parent WHERE pupil.parentID = parent.parentID AND pupil.grade = '$grade'";
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
                
    
            }
        }
    
        $pdf->Output();
    
}

?>