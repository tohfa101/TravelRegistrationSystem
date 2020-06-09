<?php
session_start();

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';
	$userid=$_SESSION['u_email'];
	$pickup = $_POST['place_Pickup'];
	$destination =$_POST['place_Destination'];
	$date = strip_tags( utf8_decode( $_POST['doj'] ) );
	$today = date("Y-m-d");
	
	//Error handlers
	//Check for empty fields
	if (empty($pickup) || empty($destination) || empty($date)) {
		header("Location: ../Newbooking.php?signup=empty");
		exit();
	}
	else {	$id = "SELECT place_ID from tbl_Places where place_Pickup='$pickup' and place_Destination='$destination'"; 
			$sql = "INSERT INTO tbl_booking(pickup,destination,doj,UID,bookedon) VALUES ('$pickup','$destination','$date','$userid','$today');";
			mysqli_query($conn, $sql);
			header("Location: ../booking.php?signup=success");
			exit();
		} 
}

else {
	header("Location: ../Newbooking.php");
	exit();
}
