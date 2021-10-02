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
  <!-- event list start -->
  <table class="event-box" style="width: 80%">
    <tr>
      <th rowspan="3">
        <img class="pin" src="http://localhost/Admin-Panel/images/pin.PNG" alt="Blue pin" />
      </th>
      <th>
        <p class="ev-title">30 days of google cloud program</p>
      </th>
      <td rowspan="3">
        <form action="">
          <input class="det-button" type="button" value="View" />
        </form>
      </td>
    </tr>
  </table>
  <!-- event list end -->
  <!-- event list start -->
  <table class="event-box" style="width: 80%">
    <tr>
      <th rowspan="3">
        <img class="pin" src="http://localhost/Admin-Panel/images/pin.PNG" alt="Blue pin" />
      </th>
      <th>
        <p class="ev-title">30 days of google cloud program</p>
      </th>
      <td rowspan="3">
        <form action="">
          <input class="det-button" type="button" value="View" />
        </form>
      </td>
    </tr>
  </table>
  <!-- event list end -->
  <!-- event list start -->
  <table class="event-box" style="width: 80%">
    <tr>
      <th rowspan="3">
        <img class="pin" src="http://localhost/Admin-Panel/images/pin.PNG" alt="Blue pin" />
      </th>
      <th>
        <p class="ev-title">30 days of google cloud program</p>
      </th>
      <td rowspan="3">
        <form action="">
          <input class="det-button" type="button" value="View" />
        </form>
      </td>
    </tr>
  </table>
  <!-- event list end -->
  </body>
  <?php
  include_once "php/adminfooter.inc.php";
?>