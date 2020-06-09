<?php
	include_once 'header.php';
  include_once 'includes/dbh.inc.php';
?>
<section class ="main-container">
	<div class="main-wrapper">

<?php
$userid=$_SESSION['u_id'];
$sql = "SELECT * from tbl_seats where userid = '$userid'";
            $result = mysqli_query($conn,$sql);
            if ( mysqli_num_rows($result) == 0 )
            {
              echo "You have not booked any tickets.";
            }
            else
            {  echo ' <center>';
              echo "<form action='cancelled.php' method='POST' onsubmit='return validateCheckBox();'>";
                echo "<table align='center' class='table table-hover table-bordered span6' align='center'>";
                  echo "<thead>";
                    echo "<tr>";
                      echo "<th>Select</th>";
                      echo "<th>Seat Number</th>";
                      echo "<th>Date</th>";
                    echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
                
                  while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                      echo "<td><input type='checkbox' name='formSeat[]' value='".$row['seatno']."'/></td>";
                      echo "<td>". $row['seatno'] ."</td>";
                      echo "<td>". $row['date'] ."</td>";
                    echo "</tr>";       
                  }
                  echo "<tr>";
                     echo "</td>";
                  echo "</tr>";
                    echo"</form>";

                  }
                    
                 echo ' 
                <div>
                <caption align="bottom">
                <button type="submit" name="submit" class="btn btn-danger">
              <a href="cancelled.php" "><i class="icon-remove icon-white"></i> Cancel Ticket </a></td></button>
              <button type="reset" class="btn">
                <i class="icon-refresh icon-black"></i> Clear
              </button>
             <a href="index.php" class="btn btn-info"><i class="icon-ok icon-white"></i> Back</a> 
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
  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<?php
	include_once 'footer.php';
?>
