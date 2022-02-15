<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Employees Data</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="recruitment.css">
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
        Recruiters List
      </div>

      <div class="list-base-div">
        <div class="base-div">
          <table>

            <div style="font-size:1rem">
            <thread>
              <tr>
                <th> <div class="heading_div"> # </div> </th>
                <th> <div class="heading_div"> Candidate ID </div> </th>
                <th> <div class="heading_div"> email ID</div> </th>
                <th> <div class="heading_div"> Name </div> </th>
                <th> <div class="heading_div"> Status </div> </th>
                <th> <div class="heading_div"> Heiring date </div> </th>
                <th> <div class="heading_div"> Interviewer Name </div> </th>
                <th> <div class="heading_div"> Resume </div> </th>
                <th> <div class="heading_div"> Action </div> </th>

              </tr>

              <!-- table content starts======================================= -->
              <tbody>
                <?php
                include 'db_Connection.php';


            $selectquery = "SELECT * FROM recruitment";

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
                      <?php echo $res['candidate_id']; ?>
                    </div>
                  </td>
                  <td>
                    <div class="table_content">
                      <?php echo $res['email'];?>
                    </div>
                  </td>

                  <td>
                    <div class="table_content">
                      <div style="font-size:1.5rem">
                        <?php echo ucfirst($res['candidate_fname'])." "; ?>
                        <?php echo ucfirst($res['candidate_lname']) ; ?>
                      </div>
                    </div>
                  </td>

                  <td>
                    <div class="table_content" style="display:flex; justify-content:center; align-items: center;">

                          <?php

                          $stat =  $res ['heiring_status'];
                          if (strpos($stat, "INTERVIEWED")!==false)
                          {
                            echo "<span style=\"color:#2ecc71;font-weight:bold;\"> INTERVIWED </span>";
                          }
                          else if (strpos($stat, "PENDING")!==false)
                          {
                            echo "<span style=\"color:chartreuse;font-weight:bold;\"> Pending . . . </span>";
                          }
                          else if (strpos($stat, "REJECTED")!==false)
                          {
                            echo "<span style=\"color:chartreuse;font-weight:bold;\"> Rejected </span>";
                          }
                           ?>
                    </div>
                  </td>

                  <td>
                    <div class="table_content">
                      <?php echo $res['heiring_date']; ?>
                    </div>
                  </td>
                  <td>
                    <div class="table_content">
                      <?php echo $res['interviewed_by']; ?>
                    </div>
                  </td>
                  <td>
                    <div class="table_content">
                      <?php
                      $stat =  $res['resume_status'];
                      if (strpos($stat, "")!==false)
                      {
                        echo "<span style=\"color:#2ecc71;font-weight:bold;\"> Submitted </span>";
                      }
                      else if (strpos($stat, "HR Admin")!==false)
                      {
                        echo "<span style=\"font-weight:bolder;color:red;\"> Not-Submitted</span>";
                      }else{
                        echo "<span style=\"font-weight:bolder;color:white;\"> ERROR in Loading...</span>";
                      }
                       ?>
                    </div>
                  </td>

                  <td>
                    <div class="table_content action_colum">
                      <a <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new"> title="DELETE">
                        <button class="del">
                          <i class="fa fa-envelope act_btn"></i>
                        </button>
                      </a>
                      <a href="delete.php?id=<?php echo $res['candidate_id']; ?>" title="SEND REMINDER">
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
