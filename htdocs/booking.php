<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>
<section class ="main-container">
	<div class="main-wrapper">
	<h2>Buses Availabe</h2>	 
		<?php
			$s = "SELECT * from tbl_booking";
			$results = mysqli_query($conn,$s);
			$n=mysqli_num_rows($results);
			$date= "SELECT doj from tbl_booking where ID='$n'";
			$resultss = mysqli_query($conn, $date);
	        if (mysqli_num_rows($resultss) > 0) {
	          while($rowss = mysqli_fetch_assoc($resultss)) {
	            $dat=$rowss['doj'];
	       	$sql = "SELECT * from tbl_bus where Date='$dat'";
			$result = mysqli_query($conn,$sql);
            if ( mysqli_num_rows($result) == 0 )
            {
              echo "No buses available on that date.";
            }
            else
            {  echo ' <center>';
              echo "<form action='seat.php' method='POST' onsubmit='return validateCheckBox();'>";
                echo "<table align='center' class='table table-hover table-bordered span6' align='center'>";
                  echo "<thead>";
                    echo "<tr>";
                      echo "<th>Select</th>";
                      echo "<th>Bus ID</th>";
                      echo "<th>Bus Number</th>";
                    echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                
                  while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                      echo "<td><a href='seat.php'><button type='submit' name='bus' value='".$row['bus_Lot']."'/></a></td>";
                      echo "<td>". $row['bus_Lot'] ."</td>";
                      echo "<td>". $row['bus_Number'] ."</td>";
                    echo "</tr>";       
                  }
                  echo "<tr>";
                     echo "</td>";
                  echo "</tr>";
                    echo"</form>";

                  }
              }
          }
                    
                 echo ' 
                <div>
                <caption align="bottom">
                     </tbody>
                    </table>
             </caption>
              </div>
            </center>
            ';

           
          ?>
        </div>
      </div>
    </div>
	
		</div>

</section>



<?php
	include_once 'footer.php';
?>
