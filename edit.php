<?php
session_start();
include 'db_Connection.php';

  $id = $_GET['id'];

  $selectquery = "select * from hr_table where employee_id = '$id' ";
  $query = mysqli_query($con, $selectquery);
  if($num = mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_array($query))
    {
      $employee_id = $row['employee_id'];
      $name = $row['name'];
      $lname = $row['lname'];
      $email = $row['email'];
      $gender = $row['gender'];
      $age = $row['age'];
      $address = $row['address'];
      $dob = $row['dob'];
      $phone_number = $row['phone_number'];
      $country = $row['country'];
      $state = $row['state'];
      $city = $row['city'];
      $desig = $row['desig'];
      $department = $row['department'];
      $department_id = $row['department_id'];
      $current_status = $row['current_status'];
      $hiering_date = $row['hiering_date'];
      $status= $row['status'];
    }
  }else{
    echo "no data";
  }
?>

<?php
$selectquery2 = "select * from employees_salary where employee_id = '$id' ";
$query2 = mysqli_query($con, $selectquery2);
if($num2 = mysqli_num_rows($query2) > 0) {
  while($row2 = mysqli_fetch_array($query2))
  {
    $basic_pay = $row2['basic_pay'];
  }
}else{
  echo "no data";
}
?>

<?php

if(isset($_POST[$submit])){

  $employee_id = $_POST['employee_id'];
  $name = $_POST['name'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $phone_number = $_POST['phone_number'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $dob = $_POST['dob'];
  $hiering_date = $_POST['hiering_date'];
  $status = $_POST['status'];
  $current_status = $_POST['current_status'];
  $designation = $_POST['designation'];
  $department_id = $_POST['department_id'];
  $department = $_POST['department'];
  $current_status = $_POST['current_status'];

  $insertquery = "UPDATE hr_table SET
  `name`='$name',
  `lname`='$lname',
  `desig`='$designation',
  `department`='$department',
  `email`='$email',
  `country`='$country',
  `state`='$state',
  `city`='$city',
  `phone_number`='$phone_number',
  `address`='$address',
  `dob`='$dob',
  `department_id`='$department_id',
  `gender`='$gender',
  `age`='$age',
  `hiering_date`='$hiering_date',
  `status`='$status',
  `current_status`= '$current_status',
  WHERE employee_id = '$employee_id'";
  $result = mysqli_query($con,$insertquery);

  if($result){
    echo "done";
    ?>
      <script type="text/javascript">
      alert("updated")
        location.replace("hrd.php");
      </script>
    <?php
  }else{
    echo "NOT DONE";
  }
}
?>
<html>
<head>
  <link rel="stylesheet" href="edit.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>

  </style>
</head>
<body>
  <header id="header">
     <button class="bra_btn"><a href="hrd.php"><i class="fa fa-home act_btn" style="font-size:50px;"></i></a></button>
  </header>
  <center>
  <div class="container">
    <div class="form_base_div">
      <i class="fa fa-close icon" onclick="c()"></i>
      <form autocomplete="off" action="" method="POST">
        <div class="label">Edit</div>
        <br>
        <div class="_input_tags">Employee ID:</div>
        <input type="text" class="input_type1" name="employee_id" id="number" value="<?php echo $employee_id;?>" readonly style="width:100%; letter-spacing: 20px; text-align: center;">
        <br>
        <br>
        <div class="_input_tags">Name :</div>
        <br>
        <input type="text" name="name" placeholder="First Name" value="<?php echo $name;?>" required>
        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>" required>
        <br>
        <br>
        <div class="_input_tags">Email / Address :</div>
        <br>
        <input type="email" name="email" placeholder="Email Id" value="<?php echo $email;?>" required>
        <input type="text" name="address" placeholder="Address" value="<?php echo $address;?>" required>
        <br>
        <br>
        <div class="_input_tags">Country / State / City :</div>
        <br>
        <!-- COUNTRY -->
        <input type="text" class="input_type2" placeholder="Country" name="country" value="<?php echo $country;?>" required>
        <input type="text" class="input_type2" placeholder="State" name="state" value="<?php echo $state;?>" required>
        <input type="text" class="input_type2" placeholder="City" name="city" value="<?php echo $city;?>" required>
        <br>
        <br>
        <div class="_input_tags">Phone Number</div>
        <input type="tel" name="phone_number" pattern="^\d{10}$" placeholder="Format (xxxxxxxxxx)" value="<?php echo $phone_number;?>" required style="width: 60%;letter-spacing: 5px;" />
        <br>
        <br>
        <div class="_input_tags">Gender</div>
        <br>
        <input type="radio" name="gender" value="M" style="width: 10%;">MALE
        <input type="radio" name="gender" value="F" style="width: 10%;">FEMALE
        <input type="radio" name="gender" value="F" style="width: 10%;">OTHERS
        <br>
        <br>
        <div class="_input_tags" style="width: 30%;">
          Age<input type="number" min="20" name="age" value="<?php echo $age;?>" required style="width: 20%;">
        </div>
        <br>
        <br>
        <div class="_input_tags">Date Of Birth<input type="date" name="dob" value="<?php echo $dob;?>" required style="width: 60%;"></div>

        <br>
        <br>
        <div class="_input_tags">Hiering Date<input type="date" name="hiering_date" value="<?php echo $hiering_date;?>" required style="width: 60%;"></div>

        <br>
        <br>
        <div class="_input_tags">Post</div>
        <br>
        <select class="select" name="status" required value="<?php echo $status;?>">
          <option value="NULL">NULL</option>
          <option value="Super Admin">Super Admin</option>
          <option value="HR-Admin">HR-Admin</option>
          <option value="Employee">Employee</option>
          <option value="Employee">Intern</option>
        </select>
        <br>
        <br>
        <div class="_input_tags">Current Status</div>
        <br>
        <select class="select" name="current_status" required value="<?php echo $current_status;?>">
          <option value="NULL">NULL</option>
          <option value="Project Head of Web Developement">Project Head of Web Developement</option>
          <option value="Project Head of Android Development">Project Head of Android Development</option>
          <option value="Head of Web Development Department">HOD-Web Developement</option>
          <option value="Head of Android Development Department">HOD-Android Development</option>
        </select>
        <br>
        <br>
        <div class="_input_tags">Designation</div>
        <br>
        <select class="select" name="designation" required value="<?php echo $desig;?>">
          <option value="NULL">NULL</option>
          <option value="CEO">CEO</option>
          <option value="Full Stack Web Developer">Full Stack Web Developer</option>
          <option value="Front-End Web Developer">Front-End Web Developer</option>
          <option value="Back-End Web Developer">Back-End Web Developer</option>
          <option value="Full Stack Adroid Developer">Full Stack Adroid Developer</option>
          <option value="Front-End Adroid Developer">Front-End Adroid Developer</option>
          <option value="Back-End Adroid Developer">Back-End Adroid Developer</option>
          <option value="Back-End Adroid Developer">Marketing Mannager</option>
          <option value="Back-End Adroid Developer">Marketing Finnace Mannager</option>
        </select>
        <br>
        <br>
        <div class="_input_tags">Department</div>
        <br>
        <select class="select" name="department" required value="<?php echo $deparment;?>">
          <option value="NULL">NULL</option>
          <option value="HR-Department"> HR-Department</option>
          <option value="Web Development Department">Web Development Department</option>
          <option value="Android Development">Android Development Department</option>
          <option value="Android Development">IT Development Department</option>
          <option value="Android Development">Marketing Department</option>
        </select>
        <br>
        <br>
        <div class="_input_tags">Department Id</div>
        <br>
        <select class="select" name="department_id" required value="<?php echo $department_id;?>">
          <option value="NULL">NULL</option>
          <option value="0000">0101</option>
          <option value="HR-Department"> 2512 </option>
          <option value="HR-Department"> 1356 </option>
          <option value="Web Development Department"> 5010 </option>
          <option value="Android Development"> 6061 </option>
        </select>
        <br>
        <div class="form_btn">
          <button class="submit_btn" type="submit" name="submit">Update</button>
        </div>
      </form>
    </div>
  </div>
</center>
</body>
</html>
