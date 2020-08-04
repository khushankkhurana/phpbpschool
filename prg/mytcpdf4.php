 <?php  
 ob_start();
 session_start() ;
$schoolname = $_SESSION['schoolname'];
$line1 = $_SESSION['line1'];
$logo = $_SESSION['logo'];
 $logo = "/icon/logo.jpeg";
 $token=$_GET['start'];
$ar=Array();
$token = strtok($token, ",");
$ar[]=$token ; 
while ($token !== false)
   {
   //echo "$token<br>";
   $token = strtok(",");
   $ar[]=$token ; 
   }
$startdate =$ar[0] ;
$enddate = $ar[1];
$nstartdate =date("d-m-Y", strtotime($startdate));
$nenddate =date("d-m-Y", strtotime($enddate));
$heading = "Collection From " . $nstartdate . " to " . $nenddate ;
// echo $startdate ;
$total=0;
$totbalance=0;
 function fetch_data($start,$end)  
 {    
 //$start = date("Y-m-d", strtotime($start));
      $output = ''; 
	   
      $connect = mysqli_connect("localhost", "root", "", "fees");  
      $sql = "SELECT * FROM `student` INNER JOIN `transaction` ON student.acno=transaction.acno WHERE `paiddate` >= '$start' && `paiddate` <= '$end' ";
    $result = mysqli_query($connect, $sql);  
      $co=0 ;
	  while($row = mysqli_fetch_array($result))  
      {      $co =$co+1; 
      $output .= '<tr>  
                         <td width="5%">' . $co . '</td>  
                          <td align="left" width="10%">'.$row["acno"].'</td>  
                          <td align="left" width="25%">'.$row["name"].'</td>  
                          <td align="left" width="25%">'.$row["father_name"].'</td>  
                          <td align="left" width="15%">'.$row["paidmonth"].'</td>  
						  <td width="10%">'.$row["paid"].'</td>  
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
		    
		   <tr style="background-color:grey;color:white;">
                <th width="5%">SNo</th>  
                <th width="10%">Ac. No</th>  
                <th width="25%">Name</th>  
                <th width="25%">Father\'s Name</th>  
				<th width="15%">Paid Month</th>  
                <th align="right" width="10%">Paid Amt.</th>  
           </tr> </thead>
		   
		   ';
		     
    // $content  .= '<tbody>' ; 
	 // $content .= '</thead> ' ;
	  $content .= fetch_data($startdate,$enddate);  
     $content .= '</table>' ; 
	  //$heading = '<font size="14" color="red"> Collection from  ' ;
      //$obj_pdf->writeHTML($content);  
       // Number are align right 
	   //$pdf->writeHTML($heading,true,true,false,false,'C') ;
	   //$pdf->writeHTML($content ,true,false,true,false,'R');
	  // $this->SetFont('times', 'BI', 16);
	  $pdf->Cell(0, 0, $heading, 0, 1, 'C', 0, '', 2);
	  //$pdf->writeHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
	  $pdf->ln(7);
	  $pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'R', true);      

	 // $pdf->writeHTMLCell(0, 0, '', '', $content1, 0, 1, 0, true, 'R', true);      

	  $pdf->Output('sample.pdf', 'I'); 
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML Table data to PDF using TCPDF in PHP</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br/><br/>  
           <div class="container" style="width:700px;">  
                <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br />  
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
                     echo fetch_data($startdate,$enddate);  
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