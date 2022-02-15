<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="new_registration.css">
<title>Sign-Up Page</title>
<head></head>
<body onload="GetRandom()">


<?php
include 'db_Connection.php';

if(isset($_POST['submit']))
{
  $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']) ;
  $email_id = mysqli_real_escape_string($con, $_POST['email']) ;
  $password = mysqli_real_escape_string($con, $_POST['password']) ;
  $cpassword =mysqli_real_escape_string($con, $_POST['cpassword']) ;

#----------------------encrypting password -------------------------
  $pass =  password_hash($password, PASSWORD_BCRYPT);
  $cpass =  password_hash($cpassword, PASSWORD_BCRYPT);

/*----------------
Query for checking that weather the given id is reapting or not
 -------------------*/
  $employee_id_query = "select * from hr_table where employee_id = '$employee_id' ";
  $email_query = "select * from hr_table where email = '$email_id' ";

  $query = mysqli_query($con,$employee_id_query);
  $query2 = mysqli_query($con,$email_query);

  $employee_id_count = mysqli_num_rows($query);
  $email_count = mysqli_num_rows($query2);

  if($employee_id_count>0)
  {
    echo "employee_id already existing";
  }
  else
  {
    if($email_count>0)
    {
      echo "email already existing";
    }
    else
    {
      if($password === $cpassword)
       {
         $insertdata_query = "insert into hr_table( employee_id, password, cpassword, email )
         values( '$employee_id','$pass','$cpass', '$email_id' )";

         $iquery = mysqli_query($con, $insertdata_query);

         if($con)
         {
           echo "done";
        ?>
           <script>
              location.replace("login_Page.php");
           </script>
        <?php
      }
         else
         {
           echo "issue in connection";
         }
       }
       else
       {
         echo "password did not matched";
       }
    }
  }
}
?>


  <main>

    <center>

      <div class="form_base_div">
        <div class="logo_div">
          <center>
            <div class="img">
              <img src="companylogo.png" style="background-color: transparent;height:100%; width:60%;">
            </div>
          </center>
          <span class="compaylogo_text">ORGE WEBTECH</span>
        </div>

        <form action="#" method="POST" class="form_div">

          <lable class="l1">
            CREATE ACCOUNT
          </lable>

          <input style=" background:none;" type="text" readonly="readonly" name="employee_id" id="emp_id">
          <input placeholder="email" name="email" type="text" required>
          <input placeholder="Create Password" name="password" type="password" required>
          <input placeholder="Repeat Password" name="cpassword" type="password" required>

          <button type="submit" name="submit"> Sign up </button>

          <span id="note" style="color:red;"></span>
            <div style="margin-top:10px; color:white; height:auto; width:300px; float:right; ">
                <hr>
                Don't Have an Account? <a href="login_Page.php" style="color:blue;">Login</a>
            </div>

        </form>

      <div>

    </center>
  </main>


  <script>
  function GetRandom()
  {
    var myElement = document.getElementById("emp_id")
    var x = Math.floor(Math.random()*100000) + 939;
    myElement.value ="HR-"+ x;
  }
  </script>

</body>

</html>
