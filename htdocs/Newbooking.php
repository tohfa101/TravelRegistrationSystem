<?php
	include_once 'header.php';
  include_once 'includes/dbh.inc.php';
?>
<section class ="main-container">
	<div class="main-wrapper">
	
	<form class="nav-login" action="includes/Newbooking.inc.php" method="POST">


		<center>

        		<label for="pickup">Pickup
              <select id="pickup" name="place_Pickup">
               
               <?php
                $sql="SELECT place_Pickup from tbl_Places";
                $result=$conn->query($sql);
                  if ($result->num_rows > 0) {
                    while  ($row =$result -> fetch_assoc()){
                    
                      echo "<option value='".$row['place_Pickup']."'>".$row['place_Pickup']."</option>" ;
                    }
                 
                  }
                  else{
                    echo"0 result ";
                  }



               ?>

                 
       			 </select></label>
          


		<center>
        
        		<label for="destination">Destination
      	
        		<select id="destination" name="place_Destination">
          		 <?php
                $sql="SELECT place_Destination from tbl_Places";
                $result=$conn->query($sql);
                  if ($result->num_rows > 0) {
                    while  ($row =$result -> fetch_assoc()){
                    
                      echo "<option value='".$row["place_Destination"]."'>".$row["place_Destination"]."</option>" ;
                    }
                 
                  }
                  else{
                    echo"0 result ";
                  }

                 


               ?>

       			 </select></label>
            


   	      <center>
            
           <label for ="Date">Date
            <input type="Date" name="doj">
            </label>
           </center>
     
            


              <center>
              <button type="submit" name ="submit" class="btn btn-info">
              <i class="icon-ok icon-white"></i> Submit</a>
              </button>
              <button type="reset" class="btn">
                <i class="icon-refresh icon-black"></i> Clear
              </button>
              <a href="index.php" class="btn btn-danger"><i class="icon-remove icon-white"></i> Back </a>
            </center>
				
	</form>
</section>


<?php
	include_once 'footer.php';
?>
