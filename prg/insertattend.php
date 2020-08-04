<?php 
session_start() ;
// echo "RAJDHANI EXPRESS ".$_SESSION["company"];
				// $compname = $_SESSION['company'];
				// $fileno =$_SESSION['file'] ;
				// $file ="file". $fileno ;
				// $party ="party".$fileno ;
				// $truck ="truck".$fileno ;
				// $station ="station".$fileno ;

// include 'menu.php' ;
				//echo "RAJDHANI EXPRESS               [ ".  $compname. " ] . $file "  ;
echo  "<br>" ;

?>
<?php
$acno = $_POST["acno"];
$date =$_POST["date"];
//$acno =1001 ;
//$date ="17-06-2020" ;
$ndate = date("Y-m-d", strtotime($date));  
include '..\dbconn.php' ;
  $sql1="SELECT * FROM `attendance` where `acno`= '$acno' && `attenddate`='$ndate'" ;
				$result=mysqli_query($conn,$sql1);
				$row_cnt = $result->num_rows;
				if  ($row_cnt>0)  
				{ ?> <script>
			     alert("This Account No Alreay Exist !");
				
				 </script>
				<?php 
				mysqli_close($conn);
				}
					
					// echo "dhhdhhhds" ;	
					 	
$sql1="INSERT INTO `attendance` (`acno`,`attenddate`, `status` ) VALUES( $acno,'$ndate','A')" ;
  			$result = mysqli_query( $conn, $sql1);
$sql1 ="SELECT * FROM `student` where `acno` =$acno " ;
 $result=mysqli_query($conn,$sql1);
 while ($Row =mysqli_fetch_array($result)){
 $name = $Row['name'];
 $mobile = $Row['mobile_no'];
 
			mysqli_close($conn);
	echo $name ;		

 // Declare the security credentials to use
  $username = "NARESHK";
  $password = "KHURANA1";

  // Set the attributes of the message to send
  $message  = "D/P, ". $name. " is absent today. Hope your ward is doing well ";
  //$type     = "1-way";
  $senderid = "DEVSCH";
  $to       = $mobile ;

  // Build the URL to send the message to. Make sure the 
  // message text and Sender ID are URL encoded. You can
  // use HTTP or HTTPS
  $url = "http://198.24.149.4/API/pushsms.aspx?" .
         "loginID=" . $username . "&" .
         "password=" . $password . "&" .
         
        // "type="     . $type . "&" .
    
         "mobile="       . $to . "&" .
		 "text="  . urlencode($message) . "&" .
		  "senderid=" . urlencode($senderid)  . "&" .
		 "route_id=2&Unicode=0" ; 
 echo $url ;
  // Send the request
$output = file($url);

  // The response from the gateway is going to look like 
  // this:
  // id: a4c5ad77ad6faf5aa55f66a
  // 
  // In the event of an error, it will look like this:
  // err: invalid login credentials
  $result = explode(":", $output[0]);

  if($result[0] == "id") 
  {
    echo("Message sent\n");
  }
  else
  {
    echo("Error - " . $result[1] . "\n");
  }
}
					 
?>