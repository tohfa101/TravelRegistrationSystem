
<!DOCTYPE HTML>
<?php
include('includes/dbh.inc.php');
include('header.php');

?>
		<div class="container">
			<div class="row">
				<div class="span10">
					
					<?php
						if(isset($_POST['submit'])) 
						{
							if(isset($_POST['formSeat']))
								$aSeat = $_POST['formSeat'];
							
							if(empty($aSeat)) 
						    {
								echo("<div class='alert alert-error'>You didn't select any ticket.</div>\n");
							} 
						    else 
						    {	echo"hello";
						        $N = count($aSeat);
								for($i=0; $i < $N; $i++)
								{
									$sql = "DELETE from tbl_seats where seatno = '" . $aSeat[$i] . "'";
									$result = mysqli_query($conn,$sql);

								}
									header("Location: ../index.php?signup=success");
									exit();
							}   
						}
					?>
			
				</div>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</BODY>
</HTML>
