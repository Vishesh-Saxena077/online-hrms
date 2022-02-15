<?php

include 'db_Connection.php'; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = "delete from hr_table where employee_id = '$id' ";
$query = mysqli_query($con,$del); // delete query

if($query)
{
  ?>
  <script>
  alert("sucessfully deleted");
  </script>
  <?php
  header('location:All_Employees_List.php');
}
else {?>
  <script>
  alert("sucessfully deleted");
  </script>
<?php
}
?>
