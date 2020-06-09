<?php
session_start();
?>
<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Book the ticket</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	</HEAD>

	<BODY>

		<br>
		<div class="container">
	        <div class="page-header">
	            <h1>Book the tickets</h1>
	        </div>			
			
				<form name="contactForm" action="includes/register.php" method="POST" class="form-horizontal">
				<div class='control-group'>
					<label class='control-label' for='input1'>Seat Numbers</label>
					<div class='controls'>
					<?php 
						for($i=1; $i<17; $i++)
						{
							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
								echo "<input type='text' class='span3' name=ch".$i." value=".$i." readonly/><br>";
							}
						}
					?>
				</div>
			</div>
			
	            <div class="form-actions">
	                <input type="hidden" name="save" value="contact">
					<button type="submit" class="btn btn-info">
						<i class="icon-ok icon-white"></i> Book
					</button>
					<button type="reset" class="btn">
						<i class="icon-refresh icon-black"></i> Clear
					</button>
	            </div>

			</form>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</BODY>
</HTML>