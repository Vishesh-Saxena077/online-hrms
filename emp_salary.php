<?php
session_start();
echo"running......";
?>


<!--  -->
  <?php
  include 'db_Connection.php';
  if(isset($_POST['submit_sal']))
  {
    $employee_id = $_POST['employee_id'];
    $sal_month = $_POST['sal_month'];
    $basic_pay = $_POST['basic_pay'];
    $pf = $_POST['pf'];
    $HRA = $_POST['HRA'];
    $mediclaim = $_POST['mediclaim'];
    $tax_for_month = $_POST['tax_for_month'];
    $bonus = $_POST['bonus'];
    $TA = $_POST['TA'];
    $DA = $_POST['DA'];
    $others = $_POST['others'];
    $sal_status = $_POST['sal_status'];
    $sal_note = $_POST['sal_note'];


        $insertquery = " insert into employees_salary
                      (
                        employee_id,sal_month,
                        basic_pay,HRA,mediclaim,
                        pf,tax_for_month,
                        bonus,TA,
                        DA,others,sal_status,sal_note
                      )
                      VALUES
                      (
                        '$employee_id','$sal_month','$basic_pay',
                        '$HRA','$mediclaim',
                        '$pf','$tax_for_month',
                        '$bonus','$TA',
                        '$DA','$others','$sal_status',
                        '$sal_note'
                      ) ";

    $result = mysqli_query($con,$insertquery);

    if($result){
      ?>
      <script type="text/javascript">
        alert("Salary Uploaded sucessfully");
        location.href="All_Employees_List.php";
      </script>
      <?php
    }else{
      echo "NOT DONE";
    }

  }
  ?>


<!DOCTYPE html>
<html>
<head>
  <title>Salary</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="empl_salary.css">
</head>
<body>
  <center>

    <section class="sal_form_base">
      <main class="external">

        <form action="" method="POST">
          <div class="grid-container">

            <div class="item1">ADD SALARY</div>

            <div class="item2">
              <div>Employee ID</div>
              <input type="text" name="employee_id" value=" <?php echo $_SESSION['emp_id'];?> ">
              <br><br>
              <div>Salary Month</div>
              <input type="text" name="sal_month" >
              <br><br>
              <div>Basic Pay</div>
              <input type="text" name="basic_pay">
              <br><br>
              <div>HRA</div>
              <input type="text" name="HRA">
              <br><br>
              <div>Mediclaim</div>
              <input type="text" name="mediclaim">
              <br><br>
              <div>PF</div>
              <input type="text" name="pf">
              <br><br>
              <div>Tax For Month</div>
              <input type="text" name="tax_for_month">

            </div>

            <div class="item3">
              <div>Bonus</div>
              <input type="text" name="bonus">
              <br><br>
              <div>TA</div>
              <input type="text" name="TA">
              <br><br>
              <div>DA</div>
              <input type="text" name="DA">
              <br><br>
              <div>Others</div>
              <input type="text" name="others">
              <br><br>
              <div>Salary Status</div>
              <input type="text" name="sal_status">
              <br><br>
              <div>Salary Note</div>
              <input type="text" name="sal_note">
              <br><br>
                <button class="submit_btn" type="submit" name="submit_sal">SUBMIT</button>
            </div>

          </div>
        </form>

      </main>
    </section>
  </center>
</body>
</html>
