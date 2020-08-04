 <?php  
 ob_start();
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "fees");  
      $sql = "SELECT * FROM transaction ";  
      $result = mysqli_query($connect, $sql);  
      $co=0 ;
	  while($row = mysqli_fetch_array($result))  
      {      $co =$co+1; 
      $output .= '<tr>  
                         <td>' . $co . '</td>  
                          <td>'.$row["paid"].'</td>  
                          <td>'.$row["paidmonth"].'</td>  
                          <td>'.$row["paid"].'</td>  
                          <td>'.$row["balance"].'</td>  
                     </tr>
					 ';  
      }  
      return $output;  
  }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf_include.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetHeaderData("/icon/logo.jpeg", PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$obj_pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$obj_pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$obj_pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$obj_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $obj_pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$obj_pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$obj_pdf->SetFont('dejavusans', '', 9, '', true);
//$obj_pdf->SetFont('times', 'B', 10);
   
	 $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="2">  
           
		   <tr>  
                <th width="10%">Acno</th>  
                <th width="25%">Name</th>  
                <th width="25%">Father\'s Name</th>  
                <th width="25%">Designation</th>  
                <th align="right" width="15%">Balance</th>  
           </tr> 
		    ';  
      
	  $content .= fetch_data();  
      $content .= '</table>' ; 
      //$obj_pdf->writeHTML($content);  
       // Number are align right 
	   $obj_pdf->writeHTML($content ,true,false,true,false,'R');
	  $obj_pdf->Output('sample.pdf', 'I'); 
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
                          <tr>  
                                <th width="25%">father's Name</th>  
                               <th width="20%">Designation</th>  
                               <th align="right" width="10%">Age</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
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