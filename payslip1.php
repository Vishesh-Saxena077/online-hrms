<?php
session_start();
if(!isset($_SESSION['employee_id'])) {
	echo "LOGGED OUT ERROR";
	header("location:login_page.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Employees Data</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="attendance_view.css">
</head>
<body>
  <center>
    <header id="header">
       <button class="bra_btn"><a href="hrd.php"><i class="fa fa-home act_btn"></i></a></button>
    </header>
    <main>
      <div class="title">
        Attendance
      </div>

      <div class="list-base-div">
        <div class="base-div">
          <table id="myTable">

            <div style="font-size:1rem">
            <thread>
              <tr>
                <th> <div class="heading_div"> # </div> </th>
                <th> <div class="heading_div"> Employee ID </div> </th>
                <th> <div class="heading_div"> Genrate </div> </th>

              </tr>

              <!-- table content starts======================================= -->
              <tbody>
                <?php
                include 'db_Connection.php';


            $selectquery = "SELECT * FROM employees_salary";

            $query = mysqli_query($con, $selectquery);

            $num = mysqli_num_rows($query);
            $c=0;
            if($num > 0) {
            while($res = mysqli_fetch_array($query))
            {
              $_SESSION['employee_id']=$res['employee_id'];

                $c++;
                ?>
                <tr>
                  <td>
                    <div class="table_content">
                      <?php echo $c; ?>
                    </div>
                  </td>
                  <td>
                    <div class="table_content">
                      <?php echo $res['employee_id']; ?>
                    </div>
                  </td>
                  <td>
                    <div class="table_content action_colum">
                      <a href="payslip.php?id=<?php echo $res['employee_id']; ?>" title="genrate">
                        <button class="del">
                          Genrate
                        </button>
                      </a>
                    </div>

                  </td>
                  </center>
                </tr>
                <?php
                       }
                     }

                ?>
              </tbody>
            </thread>
          </table>
          </table>
        </div>
      </div>

    </main>
  </center>

  <script type="text/javascript">
  function getRand(){
    var myEl = document.getElementById("number");
    var x = Math.floor(Math.random()*100000) + 939;
    myEl.value = "EMP"+x;
  }
  </script>

   <script type="text/javascript">
  		var i = document.getElementById("to");
  		var content = document.getElementById("btn_add");
  		function o()
  		{
  			i.setAttribute("style","margin-left:0px");
  			content.style.display="none";
  		}
  		function c(){
  			i.setAttribute("style","margin-left:-2000px");
  			content.style.display="block";
  		}
  	</script>



  <script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>
</body>
</html>
