

<!DOCTYPE html>
<head>
<body>
<style>
table {
  border-collapse: collapse;
  width : 100% ;
  table-layout: fixed ;
  overflow:scroll ;
  margin-left: 250px; 
}

table, th, td {
  border: 1px solid black;
  width : 30 ;
  padding: 5px;
  border-collapse:collapse;
}
.table-wrapper { 
    overflow-x:scroll;
    overflow-y:visible;
}
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #4CAF50;
  color: white;
}

.round {
  border-radius: 50%;
}

</style>
<script type="text/javascript"  src="../js/jquery321.js"> </script>





<?php
$month=$_POST['month'];
$year =$_POST['year'];
$tclass = $_POST['tclass'];
draw_calendar($month,$year);

 function draw_calendar($month,$year){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
	
	/* table headings */
	$headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat','Sun');
	$nheading = array() ;
	$nx=$running_day ;
	for ($x=$running_day;$x<$days_in_month+$running_day;$x++){
		if ($nx>6)
		{$nx=0 ;
		}
		$nheading[]=$headings[$nx] ;
		$nx=$nx+1;
	}
	
	// $nheading[0] ="Name of :" .$nheading
	$calendar.= '<tr>  <td style="width:150"> Name of Student </td>	<td>'.implode('</td><td>', $nheading).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();
 
	/* row for week one */
	
	$calendar.= '<tr>';

	/* print "blank" days until the first of the current week */
	//for($x = 0; $x < $running_day; $x++):
	//	$calendar.= '<td class="calendar-day-np"> </td>';
	//	$days_in_this_week++;
	//endfor;

	/* keep going with days.... */
	
	 $calendar.= '<td>  </td>' ;
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$calendar.= '<td class="calendar-day">';
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			
		$calendar.= '</td>';
		//if($running_day == 6):
			//$calendar.= '</tr>';
			//if(($day_counter+1) != $days_in_month):
				//$calendar.= '<tr class="calendar-row">';
			//endif;
		//	$running_day = -1;
			//$days_in_this_week = 0;
		//endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';

	/* all done, return result */
	return $calendar;
 }

/* sample usages */





//mon($mon) ;
//$mon=6;
//$year = 2020;
$month_name = date("F", mktime(0, 0, 0, $month, 10));
$daysinmonth = date('t',mktime(0,0,0,$month,1,$year));
echo "<h2 style='text-align:center'> $month_name $year </h2>";
echo draw_calendar($month,$year);

echo "<table cellpadding='0' cellspacing='0'  >" ;



echo "<tr>" ;
$date =date("Y/m/d") ;
$date = date("Y-m-d", strtotime($date));
//echo $date ;
include "../dbconn.php" ; 
$sql = "SELECT * FROM attendance";

$tacno = array() ;
$tdate = array();
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
$tacno[]=$row['acno'];
$tdate[]=$row['attenddate'];
}
// count the size of attendance
$size = count($tdate);
$holiday =array() ;
$sql = "SELECT * FROM  holidays";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
$holiday[] =$row['date_of_holiday'];
}
$sizeholi = count($holiday) ;	

$sql = "SELECT * FROM  student where class_name = '$tclass' ";
// on attendance.acno=student.acno";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {

echo "<td style='width:150'>" .$row['name']. "</td>";

$day=1;
$acno = $row['acno'];
for ($xy=1; $xy<=$daysinmonth; $xy++){
	// $xx = $row['attenddate'];
	 $xx= $date ;
	 // current date
	 $date1 = date("Y-m-d", strtotime($xx));
	// calender  running date 
	$date2 =("$year-$month-$xy");
	$date2 = date("Y-m-d", strtotime($date2));
 //echo $date2 ;
  $count1 =0 ;
  $flag1=0 ;
   
   while ($count1 < $sizeholi){
    if ($holiday[$count1] == $date2) 
	{ $flag1 =1 ; 
       break ;
	}
		$count1 = $count1 +1 ;
   }	   
	$checkdate= date("l", mktime(0,0,0,$month,$day,$year));
	 //echo $checkdate ;
	 $flag =0 ;
	 $coun=0;
	 while ($coun < $size ){
		 if ($date2==$tdate[$coun] && $acno==$tacno[$coun])
		 {	 
		 $flag=1;
		 //echo $date2.$acno ;
		 break ;
		 }
	 $coun=$coun+1;
	 }
	 
	 echo  "<td>" ;
	 if ($checkdate=="Sunday" || $flag1==1){
	  
	echo "<input style='color:red'	type='Button' id=".$row['acno'].".$xy value='H' disabled onclick='button(this.id)'/>";
	 }

else if ($flag==1) {
	echo "<input style='color: green 'type='Button' id=".$row['acno'].".$xy value= 'A' disabled onclick='button(this.id)'/>";
}
else if ($date1==$date2) {
	echo "<input style='color: #1d1d1f ' type='Button' id=".$row['acno'].".$xy value= 'P'  onclick='button(this.id)'/>";
}
 else
	 {
	echo "<input style='color: #1d1d1f ' type='Button' id=".$row['acno'].".$xy value= 'P' disabled onclick='button(this.id)'/>";
}

	
   
	
	echo "</td>";
$day=$day+1;
}
echo "</tr>" ;
echo "<tr>" ;

}

Mysqli_close($conn);
?>
</body>
</head>
</html>