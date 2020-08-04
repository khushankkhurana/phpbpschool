<?php
ob_start() ;
$acno=$_GET['acno'];
$id= $_GET['id'];
//echo $acno ;
 function getIndianCurrency(float $number)
    {
        $no = floor($number);
        $decimal = round($number - $no, 2) * 100;
        $decimal_part = $decimal;
        $hundred = null;
        $hundreds = null;
        $digits_length = strlen($no);
        $decimal_length = strlen($decimal);
        $i = 0;
        $str = array();
        $str2 = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }

        $d = 0;
        while( $d < $decimal_length ) {
            $divider = ($d == 2) ? 10 : 100;
            $decimal_number = floor($decimal % $divider);
            $decimal = floor($decimal / $divider);
            $d += $divider == 10 ? 1 : 2;
            if ($decimal_number) {
                $plurals = (($counter = count($str2)) && $decimal_number > 9) ? 's' : null;
                $hundreds = ($counter == 1 && $str2[0]) ? ' and ' : null;
                @$str2 [] = ($decimal_number < 21) ? $words[$decimal_number].' '. $digits[$decimal_number]. $plural.' '.$hundred:$words[floor($decimal_number / 10) * 10].' '.$words[$decimal_number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str2[] = null;
        }
        
        $Rupees = implode('', array_reverse($str));
        $paise = implode('', array_reverse($str2));
        $paise = ($decimal_part > 0) ? $paise . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }
 function fetch_data($acno1,$id1) { 
		include "../dbconn.php" ;
		$total=0;
		   $disc = 0 ;
		   $net =0 ;
		   $balance =0 ;
		// Attempt select query execution
		$sql = "SELECT * FROM `student` where `acno`= $acno1";
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
			 $sql = "SELECT * FROM `transaction` where `acno`= $acno1 && `id` = $id1";
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
		   
		$total=$admfee  + $annual + $tuition + $stationary+ $book+$diary + $misc + $concharge + $pbalance;
				
				if ($concession ==1 )
						 $disc = 0 ;
						
					else {
						$disc = ($total - $pbalance - $concharge)* $concession/100  ;
					}
					
						$net  = $total - $disc -$splconcession ;
						$disc = $disc + $splconcession ;		
		 // Close connection
		 //mysqli_close($conn);

		  $heading2 = '' ;
			  $heading2  .= '<table border="1px">
			<tr>
			<td width="20%" > Date: ' .  Date("d-m-Y")  . ' </td> 
			
		<td width="60%"> Rcpt No:    ' . $id . ' </td>
		<td width="20%">Pay.Date: ' . date("d-m-Y", strtotime($paiddate)).  '</td>
		</tr>
		<tr>
		<td width="20%">Acno: ' . $acno . ' </td>
		<td width="60%"> Name : ' . $name .     '</td>
		<td width="20%">Class: ' . $classname .  '</td> 
			</tr>
			<tr>
		<td width="15%" align="center">S.No.</td>
		<td width="60%" align="center">PARTICULARS </td>
		<td width="25%" align="center">AMOUNT</td>
		</tr>
		<tr>
		<td width="15%" align="left"> 1. </td>
		<td width="60%">Admisssion fees</td>
		<td width="25%" align="right">' . (number_format($admfee,2)) . '</td>
		</tr>
		<tr>
		<td align="left"> 2.</td>
		<td>Annual Charges</td>
		<td align="right">' .(number_format($annual,2)). '</td>
		</tr>
		<tr>
		<td align="left"> 3.</td>
		<td>Tutition Fees</td>
		<td align="right">'   . (number_format($tuition,2)). '</td>
		</tr>
		<tr>
		<td align="left"> 4. </td>
		<td> Book Charges </td>
		<td align="right">'   . (number_format($book,2)) .  '</td>
		</tr>
		<tr>
		<td align="left"> 5. </td>
		<td> Stationary Charges </td>
		<td align="right">'   . (number_format($book,2)) .  '</td>
		</tr>
		<tr>
		<td align="left"> 6. </td>
		<td> Diary Charges </td>
		<td align="right">'   . (number_format($diary,2)) .  '</td>
		</tr>
		<tr>
		<td align="left"> 7. </td>
		<td> Exam Charges </td>
		 <td align="right">'   . (number_format($exam,2)) .  '</td>
		</tr>
		<tr>
		<td align="left"> 8. </td>
		 <td> Misc. Charges </td>
		 <td align="right">'   . (number_format($misc,2)) .  '</td>
		  </tr>
		  <tr>
		   <td align="left"> 9. </td>
		   <td> Transport. Charges </td>
		   <td align="right">'   . (number_format($concharge,2)) .  '</td>
		   </tr>
		   <tr>
		   <td align="left">10. </td>
		   <td> Previous Balance</td>
		   <td align="right">'   . (number_format($pbalance,2)) .  '</td>
			</tr>
			<tr>
			 <td colspan="2"  > Total  </td>
			  <td align="right">'   . (number_format($total,2)) .  '</td>
			  </tr>
			  <tr>
			  <td colspan="2" > Less Discount   </td>
				  <td align="right">'   . (number_format($disc,2)) .  '</td>
				</tr>
				<tr>
				 <td colspan="2" > Net Payable  </td>
				 <td align="right">'   . (number_format($net,2)) .  '</td>
				</tr>
				<tr>
				<td colspan="2" > Paid  </td>
				 <td align="right">'   . (number_format($paid,2)) .  '</td>
				</tr>
				<tr>
				 <td colspan="2" > Balance  </td>
				  <td align="right">'   . (number_format($balance,2)) .  '</td>
		  </tr>
		   <p>' . getIndianCurrency($paid) . '</p>
		   <p> </p> 
		   <p> Authorised Signatory </p> ';
		     return $heading2 ;
		  } 
		  

// Include the main TCPDF library (search for installation path).
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
//$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(15, 25, 10,10);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(False, PDF_MARGIN_BOTTOM);

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
ob_end_clean();
// add a page
$pdf->AddPage('P','A4');
	 
      $content = ''; 
	   // $content  .= '<tbody>' ; 
	 // $content .= '</thead> ' ;
	  $content .= fetch_data($acno,$id) .$rup . '</table>';  
     //$content .= '</table>' ; 
	  //$heading = '<font size="14" color="red"> Collection from  ' ;
       //$pdf->writeHTML($content);  
       // Number are align right 
	   $pdf->writeHTML($content,true,true,false,false,'L') ;
	   //$pdf->writeHTML($content ,true,false,true,false,'R');
	  // $this->SetFont('times', 'BI', 16);
	  $pdf->SetFont('helvetica', 'B', 14);
	  //$pdf->Cell(0, 0, $heading, 0, 0, 'C', 0, '', 2);
	 // $pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'L', true);
	  //$pdf->SetFont('helvetica', 'B', 10);
	  $pdf->ln(7);
	  //$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'R', true);      
//$pdf->MultiCell(80, 5, $content."\n", 0, 'L', 0, 1, '' ,'', true);

	  //$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, 'R', true);      
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
      <body>  <table align="center">
				<tr>
				  <td> Welcome </td>
				  <td> <?php echo  getIndianCurrency(7834.23) ?> </td>
				  </tr>
                     <?php  
                     echo fetch_data($acno,$id);  
                     
					 ?>  
                     </table >  
                       
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
         <script>

      </body>  
 </html>  