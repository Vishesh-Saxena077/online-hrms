<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Employees Data</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="reports.css">
  <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

  <?php
    include 'db_Connection.php';
    $c1=$c2=$c3=0;
    $selectquery = "SELECT * FROM hr_table";
    $selectquery2 = "SELECT * FROM employees_salary";

    $query = mysqli_query($con, $selectquery);
    $query2 = mysqli_query($con, $selectquery2);

    $num = mysqli_num_rows($query);
    $num2 = mysqli_num_rows($query);

    $c=0;
    if($num > 0)
    {
    while($res = mysqli_fetch_array($query))
    {
      $c++;
      if ($res['gender']=='M')
      {
        $c1++;
      }
      else if ($res['gender']=='F')
      {
        $c2++;
      }
      else if($res['gender']=='O')
      {
        $c3++;
      }else{}

    }
  }

$value=0;
  if($num2 > 0)
  {
  while($res2 = mysqli_fetch_array($query2))
  {
    $value = $value+intval($res2['basic_pay']);
  }
}
  ?>

  <header id="header">
     <button class="bra_btn"><a href="hrd.php"><i class="fa fa-home act_btn"></i></a></button>
  </header>

  <div class="grid-container">
    <div class="item1">
      <table>
        <tr>
          <td>
            <div class="div0">
              <i class="fa fa-user" style="font-size:80px;float:left;margin-left:10px;margin-top:10px;"></i>
              EMPLOYEES<br>
              <div style="float:right;margin-top:30px;margin-right:10px;font-size:50px"><?php echo $c;?></div>
            </div>
          </td>
          <td>
            <div class="div0">
              <i class="fa fa-address-card" style="font-size:80px;float:left;margin-left:10px;margin-top:10px;"></i>
              DEPARTMENTS<br>
              <div style="float:right;margin-top:25px;margin-right:10px;font-size:50px">5</div>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <div class="div0">
              <i class="fa fa-doll" style="font-size:80px;float:left;margin-left:10px;margin-top:10px;"></i>
              Monthly Salary<br>
              <div style="float:right;margin-top:25px;margin-right:10px;font-size:50px"><?php echo $value;?></div>
          </div>
          </td>
          <td>
            <div class="div0">
              <i class="fa fa-cloud" style="font-size:80px;float:left;margin-left:10px;margin-top:10px;"></i>
              Vacancies<br>
              <div style="float:right;margin-top:25px;margin-right:10px;font-size:50px">48</div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div class="item3" id="container">
      Gender Ratio<br>
    </div>
    <div class="item4">
      <table>
        <tr><td><div class="over_time">
          <i class="fas fa-calendar-alt" style="font-size:100px;"> 15 hrs</i>
          <br><br>Average Overtime Per Week
        </div></td></tr>
        <tr><td><div class="over_time">
          <i class="fas fa-clock" style="font-size:100px;">
            12%
          </i>
          <br><br>More Overtime This Year
        </div></td></tr>
      </table>
    </div>
    <div class="item5">
      Company Expense rate per Year
      <div id="container2" style="height:350px"></div>
    </div>
  </div>


  <script>
  var v1='<?php echo $c1;?>';
  var v2='<?php echo $c2;?>';
  var v3='<?php echo $c3;?>';
  var data = [
    {x: "Male", value: v1},
    {x: "Female", value: v2},
    {x: "Others", value: v3}
  ];
    chart = anychart.pie(data);
    chart.innerRadius("0%");
    chart.container("container");
    chart.height("50%");
    chart.labels().position("outside");
    chart.connectorStroke({color: "#595959", thickness: 2, dash:"2 2"});
    chart.draw();
  </script>

  <script type="text/javascript">
  var data = [
  ["2017", 600000],
  ["2018", 300000],
  ["2019", 500000],
  ["2020", 900000],
  ["2021", 470900]
  ];
  chart = anychart.column();
  var series = chart.column(data);
  chart.container("container2");
  chart.height("100%");
  chart.draw();
  </script>
</body>
</html>
