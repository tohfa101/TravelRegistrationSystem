<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';
	$FullName = $_POST['FullName'];
	
	$Phone = $_POST['Phone'];
	$Message =  $_POST['Message'];

	//Insert the user into the database
					$sql = "INSERT INTO tbl_contactUS (FullName, Phone, Message) VALUES ('$FullName','$Phone','$Message');";
					mysqli_query($conn, $sql);
					header("Location: ../index.html");
					exit();
}
	else {
	header("Location: ../index.html");
	exit();
}