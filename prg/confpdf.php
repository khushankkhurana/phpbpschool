<?php
require  ("../prg/writehtml.php");
 
$pdf=new PDF_HTML();
$pdf->AliasNbPages();
 
//add page automatically for its true parameter
 
$pdf->SetAutoPageBreak(true, 15);
$pdf->AddPage();
 
//add logo image here
 
$pdf->Image('../image/smiley.gif',18,13,33);

//set font style
 
$pdf->SetFont('Arial','B',14);
//$pdf->WriteHTML('<para><h1>Codefixup.com - API and Web development Tutorial Website</h1><br>
// Website: <u>www.codefixup.com</u></para><br><br>How to Convert HTML to PDF with fpdf example');
 
//set the form of pdf
 
$pdf->SetFont('Arial','B',8);
 
//assign the form post value in a variable and pass it. 
 
$htmlTable='<TABLE>
$sql = "SELECT * FROM `student` "; 
//$sql ="SELECT * FROM `student` " ;
if($result = mysqli_query($conn, $sql)){
    
		while($row = mysqli_fetch_array($result)){
		 			 echo $row[1] ; 
            echo "<tr>" ;
			
			
			
						
			
			
			
			
		//	 echo "<td>" 
			// php opening here <a href="report1.php">Print  </a> <?php "</td>";
		     echo "</tr>"	;
			
		}
		echo "<tr>" ;
		echo "</tr>" ;
		
		
		
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
}


</TABLE>';
 
//Write HTML to pdf file and output that file on the web browser.
 
$pdf->writehtml("<br><br><br><br>$htmlTable");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 
 
?>