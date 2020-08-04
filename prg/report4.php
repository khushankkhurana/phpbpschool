<?php  
//ob_start();
$token=$_GET['classname'];
$ar=Array();
$token = strtok($token, ",");
$ar[]=$token ; 
while ($token !== false)
   {
   //echo "$token<br>";
   $token = strtok(",");
   $ar[]=$token ; 
   }

$month=trim($ar[1]) ;
$classname=trim($ar[0]) ;
if ($month!='')
	$heading = "Fee not deposit for the month of ". $month ."\n Class :" .$classname ;
else
 $heading = "Class : " . $classname ;
//$heading = "Class : " . $classname ;
// echo $startdate ;
$total=0;
$totbalance=0;
 function fetch_data($month1,$classname1)  
 {    
 //$start = date("Y-m-d", strtotime($start));
      $output = ''; 
	  include "dbconn.php" ;
      if ($month1!='')
	 
	  $sql = "SELECT  * FROM `student` INNER JOIN `transmonth` ON student.acno=transmonth.acno where student.class_name='$classname1' && $month1=2 ";
	   
	 else{
		
		  $sql ="SELECT * FROM student where class_name='$classname1' " ;
	 }
	 $result = mysqli_query($conn, $sql);  
      $co=0 ;
	  
	  while($row = mysqli_fetch_array($result))  
      {      $co =$co+1; 
			 
      $output .= '<tr>  
                         <td width="5%">' . $co . '</td>  
                          <td align="left" width="10%">'.$row["acno"].'</td>  
                          <td align="left" width="20%">'.$row["name"].'</td>  
                          <td align="left" width="20%">'.$row["father_name"].'</td>  
                          <td align="left" width="20%">'.$row["mother_name"].'</td>  
						  <td align="left" width="15%">'.$row["mobile_no"].'</td>  
						   
                     </tr> ';
					 
      } 
	  
      return $output;  
  }  
 
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf_include.php'); 
	  
		include "head.php" ;
	  $pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      // set document information
	  

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(15, 30, 10,true);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI',10 );

// add a page
$pdf->AddPage();
	 
      $content = ''; 
	  	
      $content .= '  
        
	 <table border="1" cellspacing="1" cellpadding="2">  
           <thead>
		    
		   <tr style="background-color:#f3f5ed;color:Black;">
                <th width="5%">SNo</th>  
                <th width="10%">Ac. No</th>  
                <th width="20%">Name</th>  
                <th width="20%">Father\'s Name</th>  
				<th width="20%">Mother\'s Name</th>
				<th width="15%"> Mobile No</th>  
               
           </tr> </thead>
		   
		   ';
		     
    // $content  .= '<tbody>' ; 
	 // $content .= '</thead> ' ;
	  $content .= fetch_data($month,$classname);  
     $content .= '</table>' ; 
	  //$heading = '<font size="14" color="red"> Collection from  ' ;
      //$obj_pdf->writeHTML($content);  
       // Number are align right 
	   //$pdf->writeHTML($heading,true,true,false,false,'C') ;
	   //$pdf->writeHTML($content ,true,false,true,false,'R');
	  // $this->SetFont('times', 'BI', 16);
	  //$pdf->Cell(0, 0, $heading, 0, 1, 'C', 0, '', 2);
	  //$pdf->writeHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
	  //$pdf->writeHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
	  $pdf->SetFont('helvetica', 'B', 14);
	  $pdf->Write(0, $heading , '', 0, 'C', true, 0, false, false, 0);
 $pdf->SetFont('helvetica', '', 10);
	  $pdf->ln(7);
	  $pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'R', true);      

	 // $pdf->writeHTMLCell(0, 0, '', '', $content1, 0, 1, 0, true, 'R', true);      
ob_end_clean();
	  $pdf->Output('sample.pdf', 'I'); 
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>SMSP </title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br/><br/>  
           <div class="container" style="width:700px;">  
                <h3 align="center">Report</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>   <th width="5%"> S.NO</th> 
								<th width="10%"> Ac.No</th> 
								<th width="25%"> Name</th> 
                                <th width="25%">father's Name</th>  
                               <th width="15%">Paid Month</th>  
                               <th align="right" width="10%">Paid Amt.</th>  
                          </tr>  
                     <?php  
                     echo fetch_data($month,$classname);  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  