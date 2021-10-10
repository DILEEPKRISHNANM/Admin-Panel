<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://localhost/Admin-Panel/css/adminstyles.css">
  </head>
  <body>
    <!-- header start -->
    <div class="header">
      <a class="logoimg" href="#">
        <img id="logo" src="http://localhost/Admin-Panel/images/logo.png" alt="Eventima logo" />
      </a>
      <div class="header-right">
        <a class="active" href="index.php">Home</a>
        <a href="reg_student.php">Add</a>
        <a href="php/adminlogout.inc.php">Logout</a>
      </div>
    </div>
    <!-- header end -->
    <?php
  require_once "php/connect.php";
  $e_id = $_POST['event_id'];
  // $result = mysqli_query($link, "select * from event where e_id='$e_id'");
  $result = mysqli_query($link, "select event.* ,student.* from event join student using(s_id) where e_id='$e_id'");
  // $result = mysqli_query($link, "select e_id ,e_title	,reg_close_date	,reg_close_time	,start_date	,start_time	,end_date	,end_time	,details	,s_id	,flag	,reg_link, s_id	,f_name,	m_name,	l_name,	s_email from event,student where e_id='$e_id' and event.s_id=student.s_id");
  while ($row = mysqli_fetch_array($result)) {
  ?>   
  <div id="left">
    <p class="h1">Event Description</p>
    <p class="p1">
      <div id="right">
        <p class="e-overview" style="text-align: center">Event Overview</p>
            <table>
            <tr>
                  <td><p class="e-ov-text">Start date</p></td>
                  <td><p class="e-ov-text">:</p></td>
                  <td><p class="e-ov-text"><?php echo $row["start_date"]; ?></p></td>
                </tr>
                <tr>
                  <td><p class="e-ov-text">Start time</p></td>
                  <td><p class="e-ov-text">:</p></td>
                  <td><p class="e-ov-text"><?php echo $row["start_time"]; ?></p></td>
                </tr>
                <tr>
                  <td><p class="e-ov-text">End date</p></td>
                  <td><p class="e-ov-text">:</p></td>
                  <td><p class="e-ov-text"><?php echo $row["end_date"]; ?></p></td>
                </tr>
                
                <tr>
                  <td><p class="e-ov-text">End time</p></td>
                  <td><p class="e-ov-text">:</p></td>
                  <td><p class="e-ov-text"><?php echo $row["end_time"]; ?></p></td>
                </tr>
                <tr>
                  <td><p class="e-ov-text">Register close date</p></td>
                  <td><p class="e-ov-text">:</p></td>
                  <td><p class="e-ov-text"><?php echo $row["reg_close_date"]; ?></p></td>
                </tr>
                <tr>
                  <td><p class="e-ov-text">Register close time</p></td>
                  <td><p class="e-ov-text">:</p></td>
                  <td><p class="e-ov-text"><?php echo $row["reg_close_time"]; ?></p></td>
                </tr>
        </table>
        <form  action="php/update.inc.php" method="post">
              <input class="reg-event" id="accept" type="submit" value="Accept">
              <input type="hidden"  value="<?php echo $row['e_id']; ?>" name="event_id" />
        </form>
        <form action="php/delete.inc.php" method="POST" >
              <input class="reg-event" id="ignore" type="submit" value="Ignore" >
              <input type="hidden"  value="<?php echo $row['e_id']; ?>" name="event_id" />
        </form>
      </div>
      <p class="p1">
      <?php echo $row["details"]; ?>
      </p>
      <p>
        <a href="<?php echo $row["reg_link"]; ?>">View registration link</a>
      </p>
      <P>Posted by <?php echo $row["f_name"]; ?> <?php echo $row["m_name"]; ?> <?php echo $row["l_name"]; ?></P>
      <P>Contact via <?php echo $row["s_email"]; }?></P>
    </p>
  </div>
</body>
<footer>
<style>
  .footer-{
  margin: 0;
  background-color: dodgerblue;
  color: white;
  font-size: 10px;
  bottom:0;
  width: 100%;
  vertical-align: end;
  position:relative;
}
</style>
    <div class="footer-">
      <p>Authors: Irene , Deekshita , Dileep , Abhinav</p>
      <p><a href="#">eventima@team6.com</a></p>
    </div>
  </footer>
</html>