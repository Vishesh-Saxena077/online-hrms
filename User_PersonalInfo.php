<!DOCTYPE html>
<html>
<head>
  <title>User Info</title>
  <link rel="stylesheet" type="text/css" href="UserPersonalInfo.css">
</head>
<body>



  <?php
  session_start();

  if(!isset($_SESSION['employee_id'])) {
    echo "LOGGED OUT ERROR";
    header("location:login_page.php");
  }

  include 'db_Connection.php';

  if(isset($_SESSION['employee_id']))
  {
    $id = $_SESSION['employee_id'];
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
        $status = $row['status'];
      }
    }else{
      echo "no data";
    }
  }

  ?>
<table>
  <tr>
  <td>
    <main class="main">
      <section>
        <div class="content">
          <h1>01</h1>
          <h2>USER INFO</h2>
          <p>
            <span class="lable">EMPLOYEE ID : <?php echo "$employee_id";?></span><br><br>
            <span class="lable">NAME : <?php echo "$name"."$lname";?></span><br><br>
            <span class="lable">EMAIL ID : <?php echo "$email"; ?></span><br><br>
            <span class="lable">GENDER : <?php if($gender == 'M'){echo "Male";} else{echo "Female";} ?></span><br><br>
            <span class="lable">AGE : <?php echo "$age"; ?></span>
          </p>
        </div>
      </section>
    </main>
  </td></tr>
  <tr><td>
    <main class="main">
      <section>
        <div class="content">
          <h1>02</h1>
          <p>
            <span class="lable">ADDRESS : <?php echo "$address"; ?></span><br><br>
            <span class="lable">DATE OF BIRTH : <?php echo "$dob";?></span><br><br>
            <span class="lable">CONTACT : <?php echo "$phone_number";?></span><br><br>
            <span class="lable">COUNTRY : <?php echo "$country";?></span><br><br>
            <span class="lable">STATE : <?php echo $state;?></span><br><br>
            <span class="lable">CITY : <?php echo "$city";?></span>
          </p>
        </div>
      </section>
    </main>
</td></tr>
<tr><td>
  <main class="main">
    <section>
      <div class="content">
        <h1>03</h1>
        <p>
          <span class="lable">DESIGNATION : <?php echo "$desig";?></span><br><br>
          <span class="lable">DEPARTMENT : <?php echo "$department";?></span><br><br>
          <span class="lable">DEPARTMENT ID : <?php echo "$department_id";?></span><br><br>
          <span class="lable">STATUS : <?php echo "$status";?></span>
        </p>
      </div>
    </section>
  </main>
</td></tr>
</table>

<script type="text/javascript" src="vanilla-tilt.min.js"></script>
<script type="text/javascript">
	VanillaTilt.init(document.querySelectorAll(".main"), {
		max: 25,
		speed: 200,
	});

  ocument.querySelector("#destroy-button").addEventListener("click", function () {
    destroyBox.vanillaTilt.destroy();
});

document.querySelector("#enable-button").addEventListener("click", function () {
    VanillaTilt.init(destroyBox);
});
</script>

</body>
</html>
