<?php
session_start() ;

?>
<?php
$acno = $_POST["acno"];
//$dateofbirth =$_POST["dateofbirth"];
// $orgDate = "17-07-2012";
//$ndateofbirth = date("Y-m-d", strtotime($dateofbirth));
// echo $ndateofbirth ;
//$dateofjoining = $_POST["dateofjoining"];

//$ndateofjoining = date("Y-m-d", strtotime($dateofjoining));

//$name = $_POST["name"] ;
//$fathername = $_POST["fathername"];
//$mothername = $_POST["mothername"] ;
//$mobileno =$_POST["mobileno"];
// $status = 1 ;
$classname= $_POST["temp_class"];
/*$admfee = $_POST["admfee"];
$annual = $_POST["annual"];
$tuition = $_POST["tuition"];
$bookcharge =$_POST["bookcharge"];
$stationary=$_POST["stationarycharge"];
$diary = $_POST["diarycharge"];
$misc = $_POST["misccharge"];
$examfee =$_POST["examcharge"];
$station = $_POST["station"];
$charges = number_format($_POST["charges"],2) ;
$concession = number_format($_POST["concession1"],2) ;
$splconcession = number_format($_POST["splconcession"],2) ;
$gender = $_POST["gender"] ;
$file = $_POST["file"] ;
$balance = $_POST["balance"] ;
$newold = $_POST["txtnewold"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];*/
//$file = $_files["file"];
//echo $address1;
//echo $address1;
//echo $city;
//echo ($file);
//exit(address1);
include '../dbconn.php' ;
  $sql1="SELECT * FROM `student` where `acno`= '$acno'" ;
				$result=mysqli_query($conn,$sql1);
				$row_cnt = $result->num_rows;
				if  ($row_cnt>0)
				{ ?> <script>
			     alert("This Account No Alreay Exist !");
				javascript:history.back();
				 </script>
				<?php }
					else
					// echo "dhhdhhhds" ;
					{
$sql1="INSERT INTO `student` set
 (`acno`= $acno,
   `date_of_birth`='$ndateofbirth',
    `date_of_joining`= '$ndateofjoining'
    ,`name` = '$name' ,
    `gender`='$gender',
    `father_name`='$fathername',
    `mother_name`='$mothername',
    `mobile_no`='$mobileno',
    `class_name`='$classname',
    `station`='$station',
    `transport`=$charges,
    `concession`=$concession,
    `spl_concession`=$splconcession,
    `filename`='$file',
    `balance`=$balance,
     `status`=1,
     `newold`='$newold',
     `address_1`='$address1'
     ,`address_2`='$address2',
     `city`='$city', )";


// `mobile_no`,`class_name`,`transport`,`concession`,`spl_concession`, `concession`,`status`
//  '$tclass',$charges, $concession,$splconcession,1 )";
//$sql1="INSERT INTO `student` ( `stat` ) VALUES(1)";

	//		$sql1 = "INSERT INTO  `class_wise`  (`class_name` , `adm_fee`,`annual_charge`, `tuition_fee`,`book_charge`, `stationary_charge`,`diary_charge`, `misc_charge`,`exam_charge` VALUES ('$tclass',$admfee , $annual ,$tuition,$bookcharge,$stationary, $diary, $misc,$examfee )";

		$result = mysqli_query( $conn, $sql1);
$sql1="SELECT * FROM `transmonth`";
$result=mysqli_query($conn,$sql1);
$sql1 = "INSERT INTO `transmonth` (`acno`) VALUES ($acno) " ;
$result = mysqli_query( $conn, $sql1);
if(! $result ) {
               die('Could not enter data: ' . mysqli_error());
            }

			            echo "Entered data successfully\n";
            //$message = '<div style="text-align: center;>The username or password you entered are not good.</div>';
            $message="Record Enter Successfully" ;
			echo "<script> alert('$message');</script>";
			mysqli_close($conn);
					header ("location: student.php" ) ;}
?>
