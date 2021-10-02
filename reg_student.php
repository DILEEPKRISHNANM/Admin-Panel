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
      <form method="get">
        <table>
          <tr>
            <td>
              <p><label>First Name</label>
            </td>
            <td>:</td>
            <td>
              <p><input class="ip-create" type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Last Name</label>
            </td>
            <td>:</td>
            <td>
              <p><input class="ip-create" type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Email</label>
            </td>
            <td>:</td>
            <td>
              <p><input class="ip-create" type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Branch</label>
            </td>
            <td>:</td>
            <td>
              <p><input class="ip-create" type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Batch</label>
            </td>
            <td>:</td>
            <td>
              <p><input class="ip-create" type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>User Name</label>
            </td>
            <td>:</td>
            <td>
              <p><input class="ip-create" type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><label>Password</label>
            </td>
            <td>:</td>
            <td>
              <p><input class="ip-create" type="text" /></p>
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