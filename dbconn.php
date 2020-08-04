	<?php
		// $servername = "162.222.225.87:3306";
		//$servername = "127.0.0.1:3306" ;
		//$username ="u685553724_nareshkhurana" ;
		//$password = "Khurana123" ;
		$servername = "localhost" ;
	//	$username ="smspsite_fees" ;
	//	$password = "yvj90}j*3_dF" ;
	$username ="root" ;
	$password = "" ;
		//$username = "naresh";
		// $password = "Khurana$%1234";
		$db = "bpschool" ;
		//$db = "smspsite_fee";
		$conn = mysqli_connect($servername, $username, $password);
		mysqli_select_db($conn, $db);
		if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	// echo "Connected successfully";
}
		?>
