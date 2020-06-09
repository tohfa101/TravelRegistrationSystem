<?php
	include_once 'header.php';
  ?>

<section class="main-container">
	<div class="main-wrapper">

		<nav>
      <?php
     
			if (isset($_SESSION['u_id'])) {
				echo '<center> <h2>Welcome</h2>
					<a class="btn" href="Newbooking.php">Newbooking</a>
          <a class="btn" href="cancel.php">Previous Booking</a></center></nav>';

} 

echo'<script src="slides.js"></script>
<section class="bg-light" id="team">
    
    </div>
  <div id="slideshow">
   <div>
     <img src="img/1.jpg">
   </div>
   <div>
     <img src="img/2.jpg">
   </div>
   <div>
     <img src="img/3.jpg">
   </div>  
</div>
          
    </section>
  <img src="img/11.png">
';
		?>
	</div>






<?php
	include_once 'footer.php';
?>
