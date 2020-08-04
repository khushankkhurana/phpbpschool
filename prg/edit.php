<?php 
		
$grno =$_POST["grno"] ;
$date = $_POST["tdate"];
$party =$_POST["tparty"];
$station=$_POST["tstation1"] ;
$challan = $_POST["challan"];
$truckno = $_POST["ttruckno"];
$panno = $_POST["panno"] ;
$self = $_POST["tself"] ;
$qty = $_POST["tqty"] ;
$party =$_POST["tparty"];
$station =$_POST["tstation1"] ;
$rate = $_POST["trate"] ;
$bag = $_POST["tbag"]; 
$billno = $_POST["tbill"];
$short1 = $_POST["short1"];
$spage = $_POST["spage"];
$freight = $_POST["tfreight"];
$labour = $_POST["labour"] ;
$lpage = $_POST["lpage"] ;
$toll = $_POST["toll"] ;
$netamt =$_POST["netamt"];
$advance = $_POST["advance"] ;
$balance = $_POST["balance"] ;
$page1 = $_POST["page1"] ;
$bilty = $_POST["bilty"]; 
$paid = $_POST["paid"] ;
$page2 = $_POST["page2"] ;
$tcomm = $_POST["tcomm"] ; 
$shortval = $_POST["tshort"] ;
$netcomm = $_POST["netcomm"] ;
$netbag = $_POST["netbag"];
$station1 = $_POST["tstation1"];
include '../dbconn.php' ;
	
	 $sql1 = "UPDATE  file1 SET  DATE= '$date', GRNO=$grno ,CHALLAN= '$challan', TRUCKNO ='$truckno', PANNO='$panno', OWNER='$self', QTY='$qty', PARTYNAME='$party', STATION='$station' , RATE=$rate, BAG=$bag, BILLNO=$billno, SHORT=$short1, SPAGE='$spage', FREIGHT=$freight,LABOUR=$labour, LPAGE='$lpage' ,TOLL=$toll, NETAMT=$netamt,ADVANCE=$advance,PAGE1=$page1, BILTY=$bilty,PAID=$paid, PAGE2=$page2,COMM=$tcomm,SHORTVAL=$shortval,NETCOMM=$netcomm,NETBAG=$netbag,STATION1='$station1'	 WHERE GRNO = '$grno'  " ;
//	 , `CHALLAN`, `TRUCKNO`, `OWNER`,`QTY`, `PARTYNAME`,`STATION`,`RATE`,`BAG`,`BILLNO`,`SHORT`,`FREIGHT`,`LABOUR`,`TOLL`, `NETAMT`, `ADVANCE`,`PAGE1`, `BALANCE`, `BILTY`, `PAID`,`PAGE2`,`COMM`,`SHORTVAL`,`NETCOMM`,`NETBAG`,`STATION1`) 
//VALUES ('$date',$grno , '$challan' , '$truckno','$self',$qty ,'$party','$station' ,$rate, $bag, $billno, $short1 , $freight, $labour , $toll, $netamt, $advance ,$page1, $balance, $bilty, $paid, $page2, $tcomm,$shortval,$netcomm, $netbag, '$station1')"; 			
	// $sql = "INSERT INTO `file1`(`grno`, `date`, `party`, `station`) VALUES ($grno,'$date','$party','$station')";
	$result = mysqli_query( $conn, $sql1);
	//echo "<select name='partyname'>";
if(! $result ) {
               die('Could not enter data: ' . mysqli_error());
            }
            
			            // echo "Entered data successfully\n";
            //$message = '<div style="text-align: center;>The username or password you entered are not good.</div>';
            $message="Record Enter Successfully" ;
			echo "<script> alert('$message');</script>";
			mysqli_close($conn);
header ("location: editgr.php" ) ;
?>
