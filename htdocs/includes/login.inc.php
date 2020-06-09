<?php

session_start();


if (isset($_POST['submit'])) {
	
	include 'dbh.inc.php';

	$email =$_POST['email'];
	$pwd =$_POST['pwd'];

	//Error handlers
	//Check if inputs are empty
	if (empty($email) || empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
		}
			elseif($email=="Makalu" || $email=="Koshi" || $email=="Sagarmatha" )
			{	header("Location: ..//admin/admin.php");
					exit();}
			else{
			$sql = "SELECT * FROM users WHERE user_email='$email'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1) {
				header("Location: ../index.php?login=error");
				exit();
			} 
			else {
				if ($row = mysqli_fetch_assoc($result)) {
					//De-hashing the password
					$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
					if ($hashedPwdCheck == false) {
						header("Location: ../index.php?login=error");
						exit();
					}elseif ($hashedPwdCheck == true) {
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						header("Location: ../index.php?login=success");
						exit();
					
					
					}
				}
			}
			
		}
	}
		 else {
		header("Location: ../index.php?login=error");
		exit();
	}
