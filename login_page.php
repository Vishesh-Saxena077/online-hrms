<?php
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
   <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Login Page</title>


<head>
</head>

<body>


  <?php
  include 'db_Connection.php';
  if(isset($_POST['submit'])){
    $employee_id = $_POST['employee_id'];
    $password = $_POST['password'];

    $employee_id_search = " select * from hr_table where employee_id = '$employee_id' ";
    $query = mysqli_query($con, $employee_id_search);

    $employee_id_count = mysqli_num_rows($query);

    if($employee_id_count){
          $employee_id_pass = mysqli_fetch_assoc($query);

          $db_pass = $employee_id_pass['password'];

          $_SESSION['employee_id'] = $employee_id_pass['employee_id'];

          $pass_decode = password_verify($password, $db_pass);

          if($pass_decode)
          {
              ?>


<script>
var delay0 = 0000;
setTimeout(function(){
var audio = document.getElementById("audio");
        audio.play();
},delay0);

var delay0 = 0000;
setTimeout(function(){
   document.getElementById("demo").innerHTML = "Processing . . . .";
},delay0);

var delay = 0000;
setTimeout(function(){
  const fas = document.getElementById('fas');
  fas.style.color = '#00e640';
  fas.classList.toggle("fa-unlock");
},delay);

var delay2 = 4000;
setTimeout(function(){
  location.href="hrd.php";
},delay2);

</script>

              <?php
          }else{
            ?>
<script>
var delay0 = 0000;
setTimeout(function(){
var audio2 = document.getElementById("audio2");
        audio2.play();
},delay0);
    alert("worng password");
</script>
            <?php
          }
    }else{
      ?>
<script>
alert("Invalid Email");
</script>
      <?php
    }
}
?>


<?php

if(isset($_POST['submit']))
{
  $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']) ;

#----------------------encrypting password -------------------------
  $acc_stat =  "ONLINE";
    $query = "UPDATE hr_table SET  account_status = '$acc_stat' WHERE employee_id = '$employee_id'";

    $uquery = mysqli_query($con, $query);
}
?>



  <main>
    <center>

      <div class="form_base_div">
        <div class="logo_div">
          <i style="color:red; font-size:100px;" class="fa fa-lock" id="fas"></i>
          <p style="color:white"; id="demo"></p>
        </div>
        <br>
        <form action="#" method="POST" autocomplete="off" class="form_div">

          <lable class="l1">
            LOGIN TO ACCOUNT
          </lable>

          <input placeholder="Enter Employe id" type="text" name="employee_id" required >
          <input placeholder="Enter Password" name="password" type="password" required >

          <button type="submit" name="submit"> Login </button>
          <audio id="audio" src="unlock.mp3" loop="loop"></audio>
          <audio id="audio2" src="lock.mp3" ></audio>

            <div style="margin-top:10px; height:auto; color:white; width:300px; float:right;">
                <span style="float:right; text-decoration:underline;"><a href="recover_password.php" style="color:#22a7f0;">forgot password</a></span>
                <br><hr>
                Don't Have an Account? <a href="new_registration.php" style="color:#22a7f0;">Sign Up</a>
            </div>
            <p id="alert"></p>
        </form>

      <div>

    </center>
  </main>

</body>

</html>
