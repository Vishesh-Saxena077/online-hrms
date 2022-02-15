<?php
session_start();
if(!isset($_SESSION['employee_id'])) {
	echo "LOGGED OUT ERROR";
	header("location:login_page.php");
}
?>
<?php
include 'db_Connection.php';

$ide=$_GET['id'];
echo $ide;

$selectquery = "select * from hr_table where employee_id = '$ide' ";

$query = mysqli_query($con, $selectquery);

if($num = mysqli_num_rows($query) > 0) {
  while($row = mysqli_fetch_array($query))
  {
    $employee_id = $row['employee_id'];
    $name = $row['name'];
    $desig = $row['desig'];
  }
}else{
  echo "no data";
}


?>

<?php
$selectquery2 = "select * from employees_salary where employee_id = '$ide' ";

$query2 = mysqli_query($con, $selectquery2);

if($num2 = mysqli_num_rows($query2) > 0) {
  while($row2 = mysqli_fetch_array($query2))
  {
    $sal_month = $row2['sal_month'];
    $basic_pay = $row2['basic_pay'];
    $pf = $row2['pf'];
    $HRA = $row2['HRA'];
    $mediclaim = $row2['mediclaim'];
    $tax_for_month = $row2['tax_for_month'];
    $bonus = $row2['bonus'];
    $TA = $row2['TA'];
    $DA = $row2['DA'];
    $others = $row2['others'];
  }
}else{
  echo "no data";
}
$total = (int)$basic_pay - (int)$pf
+ (int)$HRA + (int)$mediclaim - (int)$tax_for_month + (int)$bonus
+ (int)$TA + (int)$DA + (int)$others;

$date= date('l - jS');

?>



<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Employees Data</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap');
  body
  {
    box-sizing: border-box;
    padding:0;
    margin: 0;
    background-color: #141414;
    color:white;
    font-family: 'Nunito', sans-serif;
  }
main{
  margin-top: 100px;
  margin-left: 100px;
  height:300px;
  width:500px;
  background-color: #191919;
  border:1px solid white;
}

  </style>
</head>
<body>
    <main>
      <span style="float:left;">
        <b style="color:yellow;">NAME:</b> <?php echo $name; ?><br><br>
        <b style="color:yellow;">DESIGNATION:</b> <?php echo $desig; ?>
      </span>
      <span style="float:right;color:skyblue;"><?php echo $date; ?> </span>
      <br><br>
      <b style="color:yellow;">Month:</b><?php echo $sal_month." ";?><br><br>
      <b style="color:yellow;">Basic Pay:</b> <?php echo $basic_pay." ";?><br><br>
      <b style="color:yellow;">CTC:</b><?php echo $total." ";?>
      <br><center><button type="">Genrate</button></center>
    </main>
</body>
</html>
