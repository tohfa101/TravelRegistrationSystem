<?php
include('dbh.inc.php');
session_start();


// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save'])) {
    header('Location: book.php'); exit;
}

$userid=$_SESSION['u_id'];
$seatNumber=NULL;
$nos=0;
$today = date("Y-m-d");
for($i=1; $i<17; $i++)
{
	$chparam = "ch" . strval($i);
	$calcPNR = strval($i);
	$nos+=1;

	if( !empty($_POST[$chparam]) )
	{	$s="SELECT * FROM tbl_booking";
		$result = mysqli_query($conn,$s);
		$id = mysqli_num_rows($result);
		$sql = "INSERT INTO tbl_seat( UID,PNR,ID) VALUES ('$userid','$calcPNR','$id');";
		$results = mysqli_query($conn,$sql);
		if (!$results)
		{
			die ("Could not update seat: <br />");
		}
		$seatNumber = $seatNumber .", ". "$i";
	}
}

$userid=$_SESSION['u_id'];
$seat ="SELECT PNR from tbl_seat where UID = '$userid'";
$result = mysqli_query($conn, $seat);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $sea=$row['PNR'];
    $s="SELECT ID from tbl_seat where PNR ='$sea' and UID='$userid'";
    $results = mysqli_query($conn, $s);
    if (mysqli_num_rows($results) > 0) {
      while($rows = mysqli_fetch_assoc($results)) {
        $d=$rows['ID'];
        $date="SELECT doj from tbl_booking where ID = '$d'";
        $resultss = mysqli_query($conn, $date);
        if (mysqli_num_rows($resultss) > 0) {
          while($rowss = mysqli_fetch_assoc($resultss)) {
            $dat=$rowss['doj'];
          }
        }
      }
    }
  }
}
$sql="INSERT INTO tbl_seats(userid,seatno,date) VALUES ('$userid','$sea','$dat');";
mysqli_query($conn, $sql);
mysqli_close($conn);


header('Location: ../displayqr.php'); exit;

?>
