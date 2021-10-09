<?php

$showAlert = false;
$showError = false;
$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  include 'php/connect.php';

  $username = $_POST["username"];
  $password = $_POST["password"];
  $f_name = $_POST["f_name"];
  $m_name = $_POST["m_name"];
  $l_name = $_POST["l_name"];
  $email = $_POST["email"];
  $branch = $_POST["branch"];
  $batch = $_POST["batch"];

  $sql = "Select * from login where s_user='$username'";

  $result = mysqli_query($link, $sql);

  $num = mysqli_num_rows($result);

  // Check if username is already present or not in our Database
  if ($num == 0) {
    if ($exists == false) {

      // inserting to 
      $sql1 = "INSERT INTO `student` (`f_name`, `m_name`,`l_name`,`s_email`,`branch`,`batch`) VALUES ('$f_name', '$m_name','$l_name','$email','$branch','$batch')";
      $result1 = mysqli_query($link, $sql1);

      // fetch s_id of the student from student table
      $sql3 = 'SELECT max(s_id) as id FROM student';
      $retval = mysqli_query( $link,$sql3);

      if (!$retval) {
        die('Could not get data: ' );
      }

      $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
      $id=$row['id'];

      // Inserting to login table

      $sql2 = "INSERT INTO `login` ( `s_id`,`s_user`, `s_pass`) VALUES ('$id','$username','$password')";
      $result2 = mysqli_query($link, $sql2);

      if ($result1 || $result2) {
        $showAlert = true;
      }
    } else {
      $showError = "Passwords do not match";
    }
  }

  if ($num > 0) {
    $exists = "Username not available";
  }
} 

?>
<?php
include_once "php/adminheader.inc.php";
?>
<style>
  #contain4 {
    text-align: left;
    font-size: 25px;
    top: 40px;
  }

  .bord3 {
    padding-bottom: 5px;
    margin-top: 10px;
  }

  .ip-create {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    background-color: white;
    border-radius: 4px;
    box-sizing: border-box;
  }

  #submit-e {
    color: white;
    font-size: 20px;
    border-color: transparent;
    border-radius: 10px;
    background-color: rgb(47, 148, 43);
  }

  #submit-e:hover {
    background-color: #518f49;
    transition: .3s;
  }

  #reset-e {
    color: white;
    font-size: 20px;
    border-color: transparent;
    border-radius: 10px;
    background-color: rgb(241, 0, 0);
    margin-bottom: 100px;
    margin-top: 50px;
  }

  #reset-e:hover {
    background-color: rgb(180, 23, 23);
    transition: .3s;
  }
</style>
<?php

if ($showAlert) {

  echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> New account is 
            now created ! 
            
        </div> ';
}
// <button type="button" class="close"
//                 data-dismiss="alert" aria-label="Close"> 
//                 <span aria-hidden="true">×</span> 
//             </button> 

if ($showError) {

  echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> ' . $showError . '
    
       
     </div> ';
}

if ($exists) {
  echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> ' . $exists . '
        
       </div> ';
       
}

?>
<!-- title start-->
<div class="title">
  <p style="font-size: 50px" class="title-text" id="title">Add new student</p>
</div>
</div>
<!-- title end -->
<!-- form starts -->
<div id="contain4" style="margin-left:auto;margin-right:auto;width:700px;">
  <div align="center">
    <div class="bord3">
      <form method="post" action="reg_student.php">
        <table>
          <tr>
            <td>
              <p><label>First Name</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="f_name" class="ip-create" type="text" required/></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Middle Name</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="m_name" class="ip-create" type="text" required/></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Last Name</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="l_name" class="ip-create" type="text" required/></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Email</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="email" class="ip-create" type="email" required/></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Branch</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="branch" class="ip-create" type="text" required/></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Batch</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="batch" class="ip-create" type="text" required/></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>User Name</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="username" class="ip-create" type="text" required/>
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Password</label>
            </td>
            <td>:</td>
            <td>
              <p><input name="password" class="ip-create" type="password" required/>
              </p>
            </td>
          </tr>
        </table>
        <input id="submit-e" type="submit" value="Submit" style="height:45px; width:80px" />
        <input id="reset-e" type="reset" value="Reset" style="height:45px; width:80px" />
      </form>
    </div>
  </div>
</div>
<!-- form ends -->
</body>
<footer>
  <style>
    .footer- {
      margin: 0;
      background-color: dodgerblue;
      color: white;
      font-size: 10px;
      bottom: 0;
      width: 100%;
      vertical-align: end;
      position: relative;
    }
  </style>
  <div class="footer-">
    <p>Authors: Irene , Deekshita , Dileep , Abhinav</p>
    <p><a href="#">eventima@team6.com</a></p>
  </div>
</footer>

</html>