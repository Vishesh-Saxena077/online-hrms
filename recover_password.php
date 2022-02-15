<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="recoverpassword.css">
<title>Sign-Up Page</title>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="GetRandom()">


<?php
include 'db_Connection.php';

if(isset($_POST['submit']))
{

  $emp_id = $_POST['employee_id'];
  $str1 = $_POST['captxt1'];
  $str2 = $_POST['captxtinput'];
  if($str1 == $str2)
  {
    $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']) ;

  /*----------------
  Query for checking that weather the given id is reapting or not
   -------------------*/
    $employee_id_query = "select * from hr_table where employee_id = '$employee_id' ";

    $query = mysqli_query($con,$employee_id_query);

    $employee_id_count = mysqli_num_rows($query);

    if($employee_id_count)
    {
      $note = "VERIFIED";
      ?>
      <script>
        location.href = "change_password.php";
      </script>
    <?php
  }
    else
    {
      echo "oops";
      ?>
      <script>
      var str = new String("OPPS! \nID IS NOT CORRECT");
          alert(str);
      </script>
      <?php
    }
  }else{
    echo "captch did'nt matched refresh captch";
  }
}
?>


  <main>

    <center>

      <div class="form_base_div">
        <div class="logo_div">
          <center>
            <div class="img">
              <img src="companylogo.png" style="height:100%; width:60%;">
            </div>
          </center>
          <span class="compaylogo_text">ORGE WEBTECH</span>
        </div>

        <form action="#" method="POST" class="form_div">

          <lable class="l1">
            Enter Your ID Correctly
          </lable>

          <input style="color:#F54748; background:none;" placeholder="Employe ID..." type="text" name="employee_id" id="emp_id">
          <div class="captch_div">
            <input style="    float:left;
                height: 64px;
                width:80%;
                margin-top:0px;
                outline:none;
                border:none;
                background:none;
                color:orange;
                  letter-spacing:5px;" type="text" name="captxt1" class="noselect" id="captxt1" readonly/>
            <button class="capbtn"><i class="fa fa-refresh fa-spin" style="font-size:24px"></i></button>
          </div>
          <br>
          <input  type="text" name="captxtinput" placeholder="Captcha..." requierd>
          <button type="submit" name="submit"> Verify </button>

            <div style="margin-top:10px; height:auto; width:300px; float:right; color:black;">
                <hr>
                <a href="another_wayPasswordRecovry.php">Try Another Way</a>
            </div>
        </form>
      <div>
    </center>
  </main>
  <script>
  function GetRandom()
  {
    let r = (Math.random() + 1).toString(36).substring(7);
    var myElement = document.getElementById("captxt1")
    myElement.value = r;
  }

  </script>

</body>
</html>
