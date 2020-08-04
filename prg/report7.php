<?php 
session_start();
$schoolname = $_SESSION['schoolname'];
$line1 =$_SESSION['line1']; 
$acno=$_GET['acno'];
$id= $_GET['id'];
 
     
 //$start = date("Y-m-d", strtotime($start));
      
	  include "dbconn.php" ;
     $sql = "SELECT * FROM `student` where `acno`= '$acno'   ";
		
	 $result = mysqli_query($conn, $sql);  
      $co=0 ;
	  
	  while($row = mysqli_fetch_array($result))  
      {      include "dbconn.php" ;
		// Attempt select query execution
		$sql = "SELECT * FROM `student` where `acno`= '$acno'  ";
		if($result = mysqli_query($conn, $sql))
			
		while ($Row =mysqli_fetch_array($result)){ 
		$name = $Row['name'] ;
		$fathername = $Row['father_name'];
		$classname = trim($Row['class_name']) ;
		$balance = $Row['balance']; 
		$concession = $Row['concession'];
		$splconcession = $Row['spl_concession']; 
		$concharge = $Row['transport'] ;
		$acno = $Row['acno'];
		$newold = $Row["newold"];
		//echo ($classname) ;
					}
			 $sql = "SELECT * FROM `transaction` where `acno`= '$acno' && `id` = '$id'  ";
		($result = mysqli_query($conn, $sql)) ;
		//	echo ($classname) ;
				while($Row = mysqli_fetch_array($result)){
				$balance = $Row['balance'] ;
				$paid = $Row['paid'] ;
				//$paid = 17232 ;
				$paiddate = $Row['paiddate'];
				$paidmonth	= $Row['paidmonth'];
			$nmonth = date('m',strtotime($paidmonth));
			$pbalance = $Row['pbalance'];
				$id = $Row['id'] ;
				}
				//echo ($paidmonth) ;
				//echo ($nmonth) ; 
				$sql = "SELECT * FROM `class_wise` WHERE  trim(class_name) = '$classname'   ";
		($result = mysqli_query($conn, $sql)) ;
			   while($Row = mysqli_fetch_array($result)) 
			   {
			   switch ($nmonth) {
			   case "4": { 
				if ($newold=="Old")
				{$admfee = 0 ;}
					else
						{$admfee = $Row['adm_fee'] ; }
				
				$annual = $Row['annual_charge'];
				$stationary =  $Row['stationary_charge'];
				$book = $Row['book_charge'];
				$diary = $Row['diary_charge'];
				$book = $Row['book_charge'] ;
				$tuition = $Row['tuition_fee'];
				$exam =  0 ;
				$misc = $Row['misc_charge'] ;
				break ;
			   }
				 
				 case "9":
				 {
				 }
				 
				 default :
				 {
				$admfee = 0 ;
				$annual = 0;
				$stationary = 0;
				$book = 0;
				$diary = 0;
				$book = 0 ;
				$tuition = $Row['tuition_fee'];
				$exam =  0 ;
				$misc = 0 ;
				$splconcession =0 ;		 
		break;			
					}
					 
				
				}
			   }
				
				// Free result set
				// mysqli_free_result($result);
		   
		$total=$admfee + $annual + $tuition + $stationary+ $book+$diary + $misc + $concharge + $pbalance;
				
				if ($concession ==1 )
						 $disc = 0 ;
						
					else {
						$disc = ($total - $pbalance - $concharge)* $concession/100  ;
					}
					
						$net  = $total - $disc -$splconcession ;
						$disc = $disc + $splconcession ;		
		 // Close connection
		 mysqli_close($conn);
	  }
		  
			  $heading2 = '<table border="0px">
		<tr>
		<td> Date : </td> 
		 <td>' .  Date("d-m-Y")  . '</td>
		</tr>
		<tr>
		<td> Receipt No: </td>
		<td>' . $id . '</td>
		<td>         </td>
		<td>Payment Date :</td>
		<td>' . date("d-m-Y", strtotime($paiddate)).  '</td>
		</tr>
		<tr>
		<td>Acno: </td> 
		<td > ' . $acno . '</td>
		<td> 	</td>
		<td>Class:  </td> 
		<td>' . $classname . '</td>
		</tr>
			<tr>
		<td> Name :  </td> 
		<td>' . $name . '</td>
			<td> </td>
		<td> Father\'s Name: </td> 	
		<td>' . $fathername . '</td>
			</tr>
			</table>';
			$heading3 ='<table border="1px">
			<tr>
						<td>S.No.</td>
						<td>PARTICULARS </td>
						<td>AMOUNT</td>
					</tr>
					<tr>
						<td>1.</td>
						
						<td>Admisssion fees</td>
						<td>' . (number_format($admfee,2)) . '</td>
					</tr>
					<tr>
						<td>2.</td>
						
						<td>Annual Charges</td>
						<td>' .(number_format($annual,2)). '</td>
					</tr>
					<tr>
						<td>3.</td>
						
						<td>Tutition Fees</td>
						<td> '   . (number_format($tuition,2)). '</td>
						</tr>
						<tr>
						 <td>  4. </td>
						<td> Book Charges </td>
						<td> '   . (number_format($book,2)) .  ' </td>
						</td>
						</tr>
						<tr>
						<td>  5. </td>
						<td> Stationary Charges </td>
						<td> '   . (number_format($book,2)) .  ' </td>
						</tr>
						<tr>
						<td>  6. </td>
						
						<td> Diary Charges </td>
						<td > '   . (number_format($diary,2)) .  ' </td>
						</tr>
						<tr>
						<td>  7. </td>
					<td> Exam Charges </td>
						 <td> '   . (number_format($exam,2)) .  ' </td>
					</tr>
					<tr>
						<td>  8. </td>
					  <td> Misc. Charges </td>
					  <td> '   . (number_format($misc,2)) .  ' </td>
					  </tr>
					  <tr>
					   <td>  9. </td>
					   <td> Transport. Charges </td>
					   <td> '   . (number_format($concharge,2)) .  ' </td>
					   </tr>
					   <tr>
					   <td>  10. </p>
					   <td> Previous Balance</td>
					   <td> '   . (number_format($pbalance,2)) .  ' </td>
						</tr>
						<tr>
						 <td> </td>
						 <td > Total  </td>
						  <td  > '   . (number_format($total,2)) .  ' </td>
						  </tr>
						  <tr>
						  <td> </td>
						  <td> Less Discount   </td>
						  <td> '   . (number_format($disc,2)) .  ' </td>
						</tr>
						<tr>
						<td> </td>
						 <td> Net Payable  </td>
						 <td> '   . (number_format($net,2)) .  ' </td>
						</tr>
						<tr>
						<td> </td>
						 <td> Paid  </td>
						 <td> '   . (number_format($paid,2)) .  ' </td>
						</tr>
						<tr>
						 <td> </td>
						  <td> Balance  </td>
						  <td> '   . (number_format($balance,2)) .  ' </td>
		  </tr> </table> ';
	
		  
 
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
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(10, 5, 10,true);

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
$pdf->SetFont('times', 'BI',9 );
// add a page
$pdf->AddPage();

$html='
<table border="1" cellspacing="1" cellpadding="1">
    <tr>
        <th> Left </th>
        <th align="right">RIGHT </th>
        </tr> 
		<tr>
		<td width="60px"> Date : </td> 
		 <td width="100px">' .  Date("d-m-Y")  . '</td>
		</tr>
		<tr>
		<td width="60px"> Rcpt. No: </td>
		<td width="100px">' . $id . '</td>
		
		<td width="60px">Pay. Date :</td>
		<td width="100px">' . date("d-m-Y", strtotime($paiddate)).  '</td>
		</tr>
		<tr>
		<td width="60px">Acno: </td> 
		<td width="100px" > ' . $acno . '</td>
		
		<td width="60px">Class:  </td> 
		<td width="100px">' . $classname . '</td>
		</tr>
			<tr>
		<td width="60px"> Name :  </td> 
		<td width="100px">' . $name . '</td>
			
		<td width="60px"> F. Name: </td> 	
		<td width="100px">' . $fathername . '</td>
			</tr>
			';
//$pdf->writeHTML($html, true, false, true, false, '');
$pdf->SetFont('helvetica', 'BI', 18);
	$pdf->Cell(1, 1, $schoolname);
	$pdf->SetFont('helvetica', 'BI', 8);
	$pdf->ln(6);
		$pdf->ln(6);
$pdf->writeHTMLCell(0, 0, '', '', $html, '', 1, 0, true, 'L', true);


$left_column = ' ' ;


$right_column = ' '; 
$pdf->SetFillColor(50,255,254);


$pdf->SetFillColor(215, 235, 255);

// set color for text
$pdf->SetTextColor(127, 31, 0);

// write the second column
//$pdf->MultiCell(90, 0, $html, 1, 'J', 1, 1, '', '', true, 0, false, true, 0);
	 
      //$content ='';
	  // $content = fetch_data($acno,$id);  
       
	  //$heading = '<font size="14" color="red"> Collection from  ' ;
      //$obj_pdf->writeHTML($content);  
       // Number are align right 
	   //$pdf->writeHTML($heading,true,true,false,false,'C') ;
	   //$pdf->writeHTML($content ,true,false,true,false,'R');
	  // $this->SetFont('times', 'BI', 16);
	  //$pdf->Cell(0, 0, $heading, 0, 1, 'C', 0, '', 2);
	  //$pdf->writeHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
	  //$pdf->writeHTMLCell(0, 0, '', '', $heading, 0, 1, 0, true, 'C', true);
	  //$pdf->SetFont('helvetica', 'B', 14);
	  //$pdf->Write(0, $heading , '', 0, 'C', true, 0, false, false, 0);
		//$pdf->SetFont('helvetica', '', 10);
	  //$pdf->ln(7);
	  // $pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'R', true);      
	
	$pdf->SetFont('helvetica', 'BI', 9);
	$pdf->ln(6);
	$pdf->Cell(10, 5, $classname);
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

           <?php
                     //echo fetch_data($acno,$id);  
                     ?>  
                    
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  