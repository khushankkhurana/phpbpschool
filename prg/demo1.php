<!DOCTYPE html>
<html>
<head>
<title>Html2Pdf</title>
<link rel="stylesheet" type="text/css" href="examples.css">
<style>
table {
	margin-bottom: 1em;
	margin-left : auto ;
	margin-right : auto;
	
}

table td {
	padding: 3px;
}

.table1 {
	border: 0px solid red;
	border-collapse: collapse;
	border-spacing :0;
	bottom-spacing :0;
	
}

.table2,.table2 td {
	border: 1px solid Black;
	border-collapse: collapse;
}

.table2 td:first-child {
	background-color: white;
}

.CSSTableGenerator {
	margin: 0px;
	padding: 0px;
	width: 100%;
	box-shadow: 10px 10px 5px #888888;
	border: 1px solid #000000;
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
	border-bottom-left-radius: 0px;
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
	border-bottom-right-radius: 0px;
	-moz-border-radius-topright: 0px;
	-webkit-border-top-right-radius: 0px;
	border-top-right-radius: 0px;
	-moz-border-radius-topleft: 0px;
	-webkit-border-top-left-radius: 0px;
	border-top-left-radius: 0px;
}

.CSSTableGenerator table {
	border-collapse: collapse;
	border-spacing: 0;
	width: 100%;
	height: 100%;
	margin: 0px;
	padding: 0px;
}

.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright: 0px;
	-webkit-border-bottom-right-radius: 0px;
	border-bottom-right-radius: 0px;
}

.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft: 0px;
	-webkit-border-top-left-radius: 0px;
	border-top-left-radius: 0px;
}

.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright: 0px;
	-webkit-border-top-right-radius: 0px;
	border-top-right-radius: 0px;
}

.CSSTableGenerator tr:last-child td:first-child {
	-moz-border-radius-bottomleft: 0px;
	-webkit-border-bottom-left-radius: 0px;
	border-bottom-left-radius: 0px;
}

.CSSTableGenerator tr:hover td {

}

.CSSTableGenerator tr:nth-child(odd) {
	background-color: #ffaa56;
}

.CSSTableGenerator tr:nth-child(even) {
	background-color: #ffffff;
}

.CSSTableGenerator td {
	vertical-align: middle;
	border: 1px solid #000000;
	border-width: 0px 1px 1px 0px;
	text-align: left;
	padding: 7px;
	font-size: 10px;
	font-family: Arial;
	font-weight: normal;
	color: #000000;
}

.CSSTableGenerator tr:last-child td {
	border-width: 0px 1px 0px 0px;
}

.CSSTableGenerator tr td:last-child {
	border-width: 0px 0px 1px 0px;
}

.CSSTableGenerator tr:last-child td:last-child {
	border-width: 0px 0px 0px 0px;
}

.CSSTableGenerator tr:first-child td {
	background: -o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00));
	background: -moz-linear-gradient(center top, #ff7f00 5%, #bf5f00 100%);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");
	background: -o-linear-gradient(top, #ff7f00, bf5f00);
	background-color: #ff7f00;
	border: 0px solid #000000;
	text-align: center;
	border-width: 0px 0px 1px 1px;
	font-size: 14px;
	font-family: Arial;
	font-weight: bold;
	color: #ffffff;
}

.CSSTableGenerator tr:first-child:hover td {
	background: -o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00));
	background: -moz-linear-gradient(center top, #ff7f00 5%, #bf5f00 100%);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");
	background: -o-linear-gradient(top, #ff7f00, bf5f00);
	background-color: #ff7f00;
}

.CSSTableGenerator tr:first-child td:first-child {
	border-width: 0px 0px 1px 0px;
}

.CSSTableGenerator tr:first-child td:last-child {
	border-width: 0px 0px 1px 1px;
}
.Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
		width : 500px;
		line-height: 0px;
		left-margin:50px'
		
</style>
</head>
<body>
	
		
		<script>
function number2text(value) {
    var fraction = Math.round(frac(value)*100);
    var f_text  = "";

    if(fraction > 0) {
        f_text = "AND "+convert_number(fraction)+" PAISE";
    }

    return convert_number(value)+" RUPEE "+f_text+" ONLY";
}

function frac(f) {
    return f % 1;
}

function convert_number(number)
{
    if ((number < 0) || (number > 999999999)) 
    { 
        return "NUMBER OUT OF RANGE!";
    }
    var Gn = Math.floor(number / 10000000);  /* Crore */ 
    number -= Gn * 10000000; 
    var kn = Math.floor(number / 100000);     /* lakhs */ 
    number -= kn * 100000; 
    var Hn = Math.floor(number / 1000);      /* thousand */ 
    number -= Hn * 1000; 
    var Dn = Math.floor(number / 100);       /* Tens (deca) */ 
    number = number % 100;               /* Ones */ 
    var tn= Math.floor(number / 10); 
    var one=Math.floor(number % 10); 
    var res = ""; 

    if (Gn>0) 
    { 
        res += (convert_number(Gn) + " CRORE"); 
    } 
    if (kn>0) 
    { 
            res += (((res=="") ? "" : " ") + 
            convert_number(kn) + " LAKH"); 
    } 
    if (Hn>0) 
    { 
        res += (((res=="") ? "" : " ") +
            convert_number(Hn) + " THOUSAND"); 
    } 

    if (Dn) 
    { 
        res += (((res=="") ? "" : " ") + 
            convert_number(Dn) + " HUNDRED"); 
    } 


    var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX","SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN","FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN","NINETEEN"); 
var tens = Array("", "", "TWENTY", "THIRTY", "FOURTY", "FIFTY", "SIXTY","SEVENTY", "EIGHTY", "NINETY"); 

    if (tn>0 || one>0) 
    { 
        if (!(res=="")) 
        { 
            res += " AND "; 
        } 
        if (tn < 2) 
        { 
            res += ones[tn * 10 + one]; 
        } 
        else 
        { 

            res += tens[tn];
            if (one>0) 
            { 
                res += ("-" + ones[one]); 
            } 
        } 
    }

    if (res=="")
    { 
        res = "zero"; 
    } 
    return res;
}

// console.log(price_in_words(1250000000));
// console.log(price_in_words(9999999999))
//alert(document.getElementById("demo").value) ;
//var x =(price_in_words("demo").value);
//alert(x) ;
</script>
<?php
//$acno = $_POST['acno'] ;
//$id = $_POST['id'] ;
// include 'menu.php';
$acno=1001 ;
$id = 1 ;
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../dbconn.php' ;
// Attempt select query execution
$sql = "SELECT * FROM `student` where `acno`= $acno   ";
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
//echo ($classname) ;
			}
     $sql = "SELECT * FROM `transaction` where `acno`= $acno && `id` = $id  ";
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
	   while($Row = mysqli_fetch_array($result)) {
       switch ($nmonth) {
	   case "4": { 
		$admfee = $Row['adm_fee'] ;
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
// mysqli_close($conn);


?>
<form class="form" style="max-width: none; width: 500px;">  
<div id="content" >
	
		  
	<div class="Title">
		<p>DEV SAMAJ PUBLIC SCHOOL</p>
		<p> New colony, Palwal </p>
		<p> Fees for the month of :<?php echo $paidmonth ?></p>
		</div>
		
		<table class='table1'>
		
		
		
			<tr>
				<td> Receipt NO: <?php echo $id ?></td>
				<td>         </td>
				<td>        </td>
				<td> Date : <?php echo date("d-m-Y", strtotime($paiddate)) ?> </td>
			</tr>
			<tr>
				<td>Acno: <?php echo $acno ?> </td>
				<td> </td>
				<td> </td>
				<td>Class: <?php echo $classname ?> </td>
			</tr>
			<tr>
				<td> Name : <?php echo $name ?></td>
				<td> </td>
				<td> </td>
				<td> Father's Name: <?php echo $fathername ?> </td>
			</tr>
		</table>
		<table class='table2'>
			<tr>
				<td>S.No.</td>
				
				<td style="width: 200px">PARTICULARS </td>
				<td>AMOUNT</td>
			</tr>
			<tr>
				<td>1.</td>
				
				<td>Admisssion fees</td>
				<td><?php echo (number_format($admfee,2)) ?></td>
			</tr>
			<tr>
				<td>2.</td>
				
				<td>Annual Charges</td>
				<td><?php echo (number_format($annual,2)) ?></td>
			</tr>
			<tr>
				<td>3.</td>
				
				<td>Tutition Fees</td>
				<td> <?php echo (number_format($tuition,2)) ?></td>
				</tr>
				<tr>
				 <td>  4. </td>
				<td> Book Charges </td>
				<td> <?php echo (number_format($book,2)) ?> </td>
				</td>
				</tr>
				<tr>
				<td>  5. </td>
				<td> Stationary Charges </td>
				<td> <?php echo (number_format($book,2)) ?> </td>
				</tr>
				<tr>
				<td>  6. </td>
				
				<td> Diary Charges </td>
				<td > <?php echo (number_format($diary,2)) ?> </td>
		 		</tr>
				<tr>
				<td>  7. </td>
		   	<td> Exam Charges </td>
		 		 <td> <?php echo (number_format($exam,2)) ?> </td>
			</tr>
			<tr>
				<td>  8. </td>
		   	  <td> Misc. Charges </td>
		 	  <td> <?php echo (number_format($misc,2)) ?> </td>
			  </tr>
			  <tr>
			   <td>  9. </td>
		  	   <td> Transport. Charges </td>
		  	   <td> <?php echo (number_format($concharge,2)) ?> </td>
			   </tr>
			   <tr>
			   <td>  10. </p>
		 	   <td> Previous Balance</td>
			   <td> <?php echo (number_format($pbalance,2)) ?> </td>
				</tr>
				<tr>
				 <td> </td>
				 <td style font-weight:bold"> Total  </td>
				  <td style="font-weight:bold" > <?php echo (number_format($total,2)) ?> </td>
				  </tr>
				  <tr>
				  <td> </td>
				  <td> Less Discount   </td>
		   		  <td> <?php echo (number_format($disc,2)) ?> </td>
				</tr>
				<tr>
				<td> </td>
				 <td> Net Payable  </td>
				 <td> <?php echo (number_format($net,2)) ?> </td>
				</tr>
				<tr>
				<td> </td>
				 <td style="font-weight:bold"> Paid  </td>
		 	     <td> <?php echo (number_format($paid,2)) ?> </td>
				</tr>
				<tr>
				 <td> </td>
				  <td> Balance  </td>
				  <td> <?php echo (number_format($balance,2)) ?> </td>
				</tr>
		</table>
	<p style="width:500px;margin:5px;margin:30px "><script> document.write(number2text(<?php echo ($paid) ?>)) ;</script></p>
<br>
<br>
	
	<p style="font-weight:bold;margin:50px"> Authorised Signatory  </p>
			
		
	
	<script src='../js/jspdf.debug.js'></script>
	<script src='../js/html2pdf.js'></script>
	<script>

        var pdf = new jsPDF('p', 'pt', 'letter');
        var canvas = pdf.canvas;
        canvas.height = 72 * 11;
        canvas.width=72 * 8.5;
		
        // var width = 400;
        html2pdf(document.body, pdf, function(pdf) {
                var iframe = document.createElement('iframe');
                iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:500px');
                document.body.appendChild(iframe);
                iframe.src = pdf.output('datauristring');

               //var div = document.createElement('pre');
               //div.innerText=pdf.output();
               //document.body.appendChild(div);
            }
        );
    </script>
</body>
</html>