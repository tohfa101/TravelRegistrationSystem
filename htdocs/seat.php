<?php
	include_once 'header.php';
	include('includes/dbh.inc.php');
	?>
<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bus Ticket Booking</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-responsive.css">
	</HEAD>

	<BODY>
		<br /><br /><br />
		<section class ="main-container">
	<div class="main-wrapper">
		
					<form action="book.php" method="POST" onsubmit="return validateCheckBox()";>
					 <div class="row">
      				 <div class="col-lg-12">
      				 <center><img src="img/bus.jpg"></center>
    				 <div class="button-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-truck"></span> <span class="caret"></span></button>
<ul class="dropdown-menu">
							<?php
							if (isset($_POST['bus'])) {
								$s = "SELECT * from tbl_booking";
								$results = mysqli_query($conn,$s);
								$n=mysqli_num_rows($results);
								$date= "SELECT doj from tbl_booking where ID='$n'";
								$resultss = mysqli_query($conn, $date);
						        if (mysqli_num_rows($resultss) > 0) {
						          while($rowss = mysqli_fetch_assoc($resultss)) {
						            $dat=$rowss['doj'];	
						            $sql = "SELECT * FROM tbl_seats WHERE Date = '$dat'";
									$result = mysqli_query($conn, $sql);
									if ( mysqli_num_rows($result) == 0 )
									{
										for($i=1; $i<17; $i++)
										{		
											echo "<label class='checkbox'>
														<input type='checkbox' name='ch$i'/>Seat.$i
														</label>";
											}
										}	
									else
									{
										$seats = array( 0, 0, 0, 0, 0, 0, 0, 0, 0 ,0, 0, 0, 0, 0, 0, 0);
										while($row = mysqli_fetch_array($result))
										{
											$pnr = $row['seatno'];
											$seats[$pnr] = 1;
										}
										for($i=1; $i<17; $i++)
										{
											$j = $i - 1;
											if($seats[$j] == 1)
											{
														echo "<label class='checkbox'>
															<input type='checkbox' name='ch$i' disabled/>Seat.$i	
														</label>";
													}
										
										
											else
											{
														echo "<label class='checkbox'>
														<input type='checkbox' name='ch$i'/>Seat.$i
														</label>";
											}
										}								
									}
								}
							}
				}



						?>
						</ul>
    
</div>
						</ul>
					</div>
				</div>
						<center>
							<button type="submit" class="btn btn-info">
								<i class="icon-ok icon-white"></i> Submit
							</button>
							<button type="reset" class="btn">
								<i class="icon-refresh icon-black"></i> Clear
							</button>
							<a href="./index.php" class="btn btn-danger"><i class="icon-arrow-left icon-white"></i> Back </a>
						</center>
					</form>
				
		</div>
		

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 ticket.');
				return false;
			}
		</script>
	</BODY>
</HTML>