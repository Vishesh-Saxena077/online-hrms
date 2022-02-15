<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add New Employee</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="All_Epmloy_List.css">
</head>
<body onload="getRand()">
  <center>
    <header id="header">
       <button class="bra_btn"><a href="hrd.php"><i class="fa fa-home act_btn"></i></a></button>
       <input type="text"
       class="search_box"
       id="myInput"
       onkeyup="myFunction()"
       placeholder="Search for names.."
       title="Type in a name"
       style="width:50%;background:rgb(255,255,255,0.2);border-color:white;float:right;margin-top:60px;margin-right:50px">

         </header>


    <main>
      <div class="title">
        ALL EMPLOYEES SALARY LIST
      </div>
      <div class="list-base-div">
        <div class="base-div">
          <table id="myTable">
            <div style="font-size:1rem">
            <thread>
              <tr class="header">
                <th> <div class="heading_div"> # </div> </th>
                <th> <div class="heading_div"> Employee id </div> </th>
                <th> <div class="heading_div"> Basic Pay </div> </th>
                <th> <div class="heading_div"> Status </div> </th>
                <th> <div class="heading_div"> Action </div> </th>
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
                    <div class="table_content">
                      <?php echo $res['basic_pay']; ?>
                    </div>
                  </td>

                  <td>
                    <div class="table_content">
                      <?php
                      if (strpos($res['sal_status'], "Approved") !== False)
                      {
                        echo "<span style=\"color:#00e640;font-weight:bold;\"> Approved </span>";
                      }
                      else if (strpos($res['sal_status'], "Rejected") !== False)
                      {
                        echo "<span style=\"color:#f22613;font-weight:bold;\"> Rejected </span>";
                      }
                      else if (strpos($res['sal_status'], "Pending") !== False)
                      {
                        echo "<span style=\"color:#f5e51b;font-weight:bold;\"> Pending . . .</span>";
                      }
                      else{
                        echo "<span style=\"color:#8c14fc;font-weight:bold;\"> Not-Updated </span>";
                      }
                      ?>
                    </div>
                  </td>


                  <td>
                    <div class="table_content action_colum">
                      <a href="view_profile.php?id=<?php echo $res['employee_id']; ?>" title="View Details">
                      <button class="view">
                        <i class="fa fa-eye act_btn"></i>
                      </button>
                    </a>
                    <a href="edit.php?id=<?php echo $res['employee_id']; ?>" title="Edit">
                      <button class="edit">
                        <i class="fa fa-edit act_btn"></i>
                      </button>
                    </a>
                      <a href="delete.php?id=<?php echo $res['employee_id']; ?>" title="DELETE">
                        <button class="del">
                          <i class="fa fa-trash act_btn"></i>
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
