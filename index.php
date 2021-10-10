<?php

session_start();
 
// Check if the user is logged in or not
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
?>
<?php
  include_once "php/adminheader.inc.php";
?>
<?php
    require_once "php/connect.php";
    $result = mysqli_query($link, "select * from event where flag=false");
    $row = mysqli_num_rows($result);
    for ($i = 0; $i < $row; $i++) {
      while ($row = mysqli_fetch_array($result)) {
    ?>
  <!-- event list start -->
  <table class="event-box" style="width: 80%">
    <tr>
      <th rowspan="3" width="20%">
        <img  class="pin" src="http://localhost/Admin-Panel/images/pin.PNG" alt="Blue pin" />
      </th>
      <th width="60%">
        <p  class="ev-title"><?php echo $row['e_title']; ?></p>
      </th>
      <td rowspan="3" while="30%">
        <form action="eventdetails.php" method="POST">
          <input class="det-button" type="submit" value="View" />
          <input type="hidden"  value="<?php echo $row['e_id']; ?>" name="event_id" />
        </form>
      </td>
    </tr>
  </table>
  <!-- event list end -->
  <?php
      }
      mysqli_free_result($result);
    }
    mysqli_close($link);
    ?> 
    <?php
  include_once "php/adminfooter.inc.php";
?>
  </body>
 </html> 