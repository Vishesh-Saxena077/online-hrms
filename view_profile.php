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
<!DOCTYPE html>
<html>
<head>
  <title>Add New Employee</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="view_detail.css">
</head>
<boby>
  <center>
    <header id="header">
      <a href="hrd.php">
       <button class="btn"><i class="fa fa-home"></i></button>
       </a>
    </header>
    <main>
      <div class="div1">
        <div class="div1_1">
          <center>
            <table>
              <tr>
                <td>Employee ID : </td>
                <td><?php echo $employee_id; ?></td>
              </tr>
              <tr>
                <td>First Name : </td>
                <td><?php echo $name; ?></td>
              </tr>
              <tr>
                <td>Last Name : </td>
                <td><?php echo $lname; ?></td>
              </tr>
              <tr>
                <td>Email : </td>
                <td><?php echo $email; ?></td>
              </tr>
              <tr>
                <td>Address : </td>
                <td><?php echo $address; ?></td>
              </tr>
              <tr>
                <td>Country : </td>
                <td><?php echo $country; ?></td>
              </tr>
              <tr>
                <td>State : </td>
                <td><?php echo $state; ?></td>
              </tr>
              <tr>
                <td>City: </td>
                <td><?php echo $city; ?></td>
              </tr>
              <tr>
                <td>Phone : </td>
                <td><?php echo $phone_number; ?></td>
              </tr>
              <tr>
                <td>Gender : </td>
                <td><?php echo $gender; ?></td>
              </tr>
              <tr>
                <td>Age : </td>
                <td><?php echo $age; ?></td>
              </tr>
              <tr>
                <td>DOB : </td>
                <td><?php echo $dob; ?></td>
              </tr>
              <tr>
                <td>Hiering date : </td>
                <td><?php echo $hiering_date; ?></td>
              </tr>
              <tr>
                <td>Post : </td>
                <td><?php echo $status; ?></td>
              </tr>
              <tr>
                <td>Current Status : </td>
                <td><?php echo $current_status; ?></td>
              </tr>
              <tr>
                <td>Basic Pay : </td>
                <td><?php echo $basic_pay; ?></td>
              </tr>
            </table>
          </center>
        </div>
      </div>
    </main>
  </center>
</body>
</html>
