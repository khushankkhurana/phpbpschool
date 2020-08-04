<?php 


// include 'menu.php' ;
// echo "RAJDHANI EXPRESS               [ ".  $compname. " ]  " .$file  ;
echo  "<br>" ;
?> 
<html>
<head>
<style>
<style type="text/css">
    .Table
    {
        display: table;
		
		}
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
		width : 450px;
		line-height: 0px;
		
	}
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
		margin: 0px 0px 0px 0px;
    }
    .Row
    {
        display: table-row;
    }
    .Cell
    {
        display: table-cell;
        border: solid;
        border-width: 1;
        padding-left: 5px;
        padding-right: 5px;
		width:150;
		height:25;
		
    }
	.sCell
    {
        display: table-cell;
        border: solid;
        border-width: 1;
        padding-left: 5px;
        padding-right: 5px;
		width:50;
		height:15;
		
    }
	.pCell
    {
        display: table-cell;
        border: solid;
        border-width: 1;
        padding-left: 5px;
        padding-right: 5px;
		width:200;
		height:25;
		
    }
	.aCell
    {
        display: table-cell;
        border: solid;
        border-width: 1;
        padding-left: 5px;
        padding-right: 5px;
		width:100;
		height:25;
		
    }
	.Row1
    {
        display: table-row;
    }
	.Cell1
    {
        display: table-cell;
        border: 0;
        border-width: 0;
        padding-left: 0px;
        padding-right: 0px;
		font-weight : Bold ;
		width : 200;
		height:15;
		
    }
		.sCell1
    {
        display: table-cell;
        border: 0;
        border-width: 0;
        padding-left: 0px;
        padding-right: 0px;
		font-weight : Bold ;
		width : 10;
		height:15;
		
    }
	.footCell1
    {
        display: table-cell;
        border: 0;
        border-width: 0;
        padding-left: 0px;
        padding-right: 0px;
		font-weight : Bold ;
		width : 250;
		height:15;
		
    }
	.pre {
            overflow-x: auto;
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            word-wrap: break-word;
         }
    }
	
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
$acno = $_POST['acno'] ;
$id = $_POST['id'] ;
// include 'menu.php';
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include '../dbconn.php' ;
// Attempt select query execution
$sql = "SELECT * FROM `student` where `acno`= $acno   ";
if($result = mysqli_query($conn, $sql))
    
while ($row =mysqli_fetch_array($result)){ 
$name = $row['name'] ;
$fathername = $row['father_name'];
$classname = trim($row['class_name']) ;
$balance = $row['balance']; 
$concession = $row['concession'];
$splconcession = $row['spl_concession']; 
$concharge = $row['transport'] ;
$acno = $row['acno'];
//echo ($classname) ;
			}
     $sql = "SELECT * FROM `transaction` where `acno`= $acno && `id` = $id  ";
($result = mysqli_query($conn, $sql)) ;
//	echo ($classname) ;
        while($row = mysqli_fetch_array($result)){
        $balance = $row['balance'] ;
		$paid = $row['paid'] ;
		//$paid = 17232 ;
		$paiddate = $row['paiddate'];
		$paidmonth	= $row['paidmonth'];
	$nmonth = date('m',strtotime($paidmonth));
	$pbalance = $row['pbalance'];
		$id = $row['id'] ;
		}
		//echo ($paidmonth) ;
		//echo ($nmonth) ; 
		$sql = "SELECT * FROM `class_wise` WHERE  trim(class_name) = '$classname'   ";
($result = mysqli_query($conn, $sql)) ;
	   while($row = mysqli_fetch_array($result)) {
       switch ($nmonth) {
	   case "4": { 
		$admfee = $row['adm_fee'] ;
		$annual = $row['annual_charge'];
		$stationary =  $row['stationary_charge'];
		$book = $row['book_charge'];
		$diary = $row['diary_charge'];
		$book = $row['book_charge'] ;
		$tuition = $row['tuition_fee'];
		$exam =  0 ;
		$misc = $row['misc_charge'] ;
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
		$tuition = $row['tuition_fee'];
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
<form class="form" style="max-width: none; width: 1005px;">  
<div id="content" >
	<div class="Table">
		 <div class="Title">
		<p> DEV SAMAJ PUBIC SCHOOL </p>
		<p> New Colony, Palwal  </p> 
		<p> Fees for the month of :<?php echo $paidmonth ?></p>
		</div>
		<div style="display row"> 
		  <div class="cell1">
		<p>  Receipt No: <?php echo $id ?>   </p>
		 </div>
		 <div class="scell1">
		<p>  </p>
		 </div>
		 <div class="cell1">
		<p>  Date : <?php echo date("d-m-Y", strtotime($paiddate)) ?></p>
		 </div>
		 </div>
		 <div style="display row">
	<div class="cell1">
	<p> Acno: <?php echo $acno ?> </p>
	</div>
	<div class="scell1">
		<p>  </p>
		 </div>
	<div class="cell1">
	<p> Class: <?php echo $classname ?> </div>
	</div>
	<div style="display row">
	<div class="cell1">
	<p> Name : <?php echo $name ?></p>
	</div>
	<div class="scell1">
		<p>  </p>
		 </div>
	<div class="cell1">
	<p style="width:200"> Father's Name: <?php echo $fathername ?> </div>
	</div>
	</div>
	<div class="Row">
	<div class="heading">
		 <div class="sCell">
			<p> S.No. </p> 
			</div>
			<div class="pcell">
			<p>PARTICULARS </p>
			</div>
			<div class="acell">
			<p> AMOUNT  </p>
		 </div>	
	</div>	
          <div class="Row">
				<div class="sCell">		  
				<p>  1. </p>
				</div>
				<div class="cell">
				<p> Admission Fee </p>
				</div>
			<div class="acell">
		  <p style="text-align:right;width:100"> <?php echo (number_format($admfee,2)) ?> </p> 
		  </div>
		  </div>
		  <div class="row">
		  <div class="scell">
		  <p>   2. </p>
		  </div>
		  <div class="cell">
		  <p> Annual charges </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100" > <?php echo (number_format($annual,2)) ?> </p>
		  </div>
		  </div>
		  <div class="row">
			<div class="scell">
		   <p>  3. </p>
		  </div>
		  <div class="cell">
		  <p> Tuition Fees </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($tuition,2)) ?> </p>
		  </div>
		  </div>
		 <div class="row">
		 <div class="scell">
		  <p>  4. </p>
		  </div>
		  <div class="cell">
		  <p> Book Charges </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($book,2)) ?> </p>
		  </div>
		  </div>
		  <div class="row">
		  <div class="scell">
		  <p>  5. </p>
		  </div>
		  <div class="cell">
		  <p> Stationary Charges </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($book,2)) ?> </p>
		  </div>
		  </div>
		  <div class="row">
		  <div class="scell">
		  <p>  6. </p>
		  </div>
		  <div class="cell">
		  <p> Diary Charges </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($diary,2)) ?> </p>
		  </div>
		  </div>
		  <div class="row">
		  <div class="scell">
		  <p>  7. </p>
		  </div>
		  <div class="cell">
		  <p> Exam Charges </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100" > <?php echo (number_format($exam,2)) ?> </p>
		  </div>
		  </div>
		  <div class="row">
		  <div class="scell">
		  <p>  8. </p>
		  </div>
		  <div class="cell">
		  <p> Misc. Charges </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100" > <?php echo (number_format($misc,2)) ?> </p>
		</div>
		</div>
		<div class="row">
		  <div class="scell">
		  <p>  9. </p>
		  </div>
		  <div class="cell">
		  <p> Transport. Charges </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($concharge,2)) ?> </p>
		</div>
		</div>
		<div class="row">
		  <div class="scell">
		  <p>  10. </p>
		  </div>
		  <div class="cell">
		  <p> Previous Balance</p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($pbalance,2)) ?> </p>
		</div>
		</div>
			<div class="Row">
		  <div class="scell1">
		  <p>   </p>
		  </div>
		  <div class="cell">
		  <p style="font-weight:bold"> Total  </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100;font-weight:bold" > <?php echo (number_format($total,2)) ?> </p>
		</div>
		</div>
		<div class="Row">
		  <div class="scell1">
		  <p>   </p>
		  </div>
		  <div class="cell">
		  <p> Less Discount   </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($disc,2)) ?> </p>
		</div>
		</div>
		
		<div class="Row">
		  <div class="scell1">
		  <p>   </p>
		  </div>
		  <div class="cell">
		  <p> Net Payable  </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100" > <?php echo (number_format($net,2)) ?> </p>
		</div>
		</div>
		<div class="Row">
		  <div class="scell1">
		  <p>   </p>
		  </div>
		  <div class="cell">
		  <p style="font-weight:bold"> Paid  </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100;font-weight:bold"> <?php echo (number_format($paid,2)) ?> </p>
		</div>
		</div>
		<div class="Row">
		  <div class="scell1">
		  <p>   </p>
		  </div>
		  <div class="cell">
		  <p> Balance  </p>
		  </div>
		  <div class="acell">
		  <p style="text-align:right; width:100"> <?php echo (number_format($balance,2)) ?> </p>
		</div>
		</div>
		</form>
		
	<p style="width:500px;margin:5px; "><script> document.write(number2text(<?php echo ($paid) ?>)) ;</script></p>
	
	<br>
	<br>
	<br>
	<div class="Row">
		  <div class="scell1">
		  <p style="font-weight:bold"> Principal  </p>
		 
		</div>
		<div class="footcell1">
		  <p> </p>
		</div>
		  <div class="scell1">
		  <p> Accountant </p>
		
	</div>
	</div>
	
</div>

<div id="elementH"></div> 
</div>
<br>
<br>

 <input type="button" id="create_pdf" value="Generate PDF"> 
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
<script>

    (function () {  
        var  
         form = $('.form'),  
         cache_width = form.width(),  
         a4 = [595.28, 841.89]; // for a4 size paper width and height  
  
        $('#create_pdf').on('click', function () {  
            $('body').scrollTop(0);  
            createPDF();  
        });  
        //create pdf  
        function createPDF() {  
            getCanvas().then(function (canvas) {  
                var  
                 img = canvas.toDataURL("image/png"),  
                 doc = new jsPDF({  
                     unit: 'px',  
                     format: 'a4'  
                 });  
                doc.addImage(img, 'JPEG', 20, 20);  
                doc.save('Bhavdip-html-to-pdf.pdf');  
                form.width(cache_width);  
            });  
        }  
  
        // create canvas object  
        function getCanvas() {  
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
            return html2canvas(form, {  
                imageTimeout: 2000,  
                removeContainer: true  
            });  
        }  
  
    }());  
</script>  
<script>  
    /* 
 * jQuery helper plugin for examples and tests 
 */  
    (function ($) {  
        $.fn.html2canvas = function (options) {  
            var date = new Date(),  
            $message = null,  
            timeoutTimer = false,  
            timer = date.getTime();  
            html2canvas.logging = options && options.logging;  
            html2canvas.Preload(this[0], $.extend({  
                complete: function (images) {  
                    var queue = html2canvas.Parse(this[0], images, options),  
                    $canvas = $(html2canvas.Renderer(queue, options)),  
                    finishTime = new Date();  
  
                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);  
                    $canvas.siblings().toggle();  
  
                    $(window).click(function () {  
                        if (!$canvas.is(':visible')) {  
                            $canvas.toggle().siblings().toggle();  
                            throwMessage("Canvas Render visible");  
                        } else {  
                            $canvas.siblings().toggle();  
                            $canvas.toggle();  
                            throwMessage("Canvas Render hidden");  
                        }  
                    });  
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);  
                }  
            }, options));  
  
            function throwMessage(msg, duration) {  
                window.clearTimeout(timeoutTimer);  
                timeoutTimer = window.setTimeout(function () {  
                    $message.fadeOut(function () {  
                        $message.remove();  
                    });  
                }, duration || 2000);  
                if ($message)  
                    $message.remove();  
                $message = $('<div ></div>').html(msg).css({  
                    margin: 0,  
                    padding: 10,  
                    background: "#000",  
                    opacity: 0.7,  
                    position: "fixed",  
                    top: 10,  
                    right: 10,  
                    fontFamily: 'Tahoma',  
                    color: '#fff',  
                    fontSize: 12,  
                    borderRadius: 12,  
                    width: 'auto',  
                    height: 'auto',  
                    textAlign: 'center',  
                    textDecoration: 'none'  
                }).hide().fadeIn().appendTo('body');  
            }  
        };  
    })(jQuery);  
  
</script>  



  
	  

   
 
</body>

</html>
