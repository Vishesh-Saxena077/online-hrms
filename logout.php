<?php

session_start();
include 'db_Connection.php';

if(isset($_SESSION['employee_id']))
{
  $id = $_SESSION['employee_id'];
  $selectquery = "select * from hr_table where employee_id = '$id' ";
  $query = mysqli_query($con, $selectquery);
  if($num = mysqli_num_rows($query) > 0)
  {
    while($row = mysqli_fetch_array($query))
    {
      $acc_stat = $row['account_status'];
    }
    if($acc_stat === "ONLINE")
    {
      $acc_stat2 = "OFFLINE";
      	$query = "UPDATE hr_table SET account_status = '$acc_stat2' WHERE employee_id = '$id'";
        $uquery = mysqli_query($con, $query);

        if($con)
        {
          ?>

          <html>
          <style>
          body{
            margin:0;
            padding:0;
            box-sizing: border-box;
            display: flex;
            justify-content:center;
            align-items: center;
          }
          button{
            height: 50px;
            width: 100px;
          }
          </style>
          <body>
            <h1>ARE YOU SURE YOU WANT TO EXIT ?</h1>
            <br>
            <a href="hrd.php">
              <button class="logout_btn">NO</button>
            </a>
            <a href="html1.php">
              <button class="logout_btn">YES</button>
            </a>
          </body>
          </html>

          <?php
        }else{
          echo "issue in connection";
        }
    }
  }
  else
  {
    echo "no data";
  }

}
?>
