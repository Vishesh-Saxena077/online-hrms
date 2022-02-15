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
	<meta charset="utf-8">
  <meta viewport="width=device-width, initial-scale=1">
	<title>Updation Page</title>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="hrms_users_list.css">
</head>
<body>

<center>

  <header id="header">
		<a href="hrd.php" class="home">
				<i class="fa fa-home" style="margin-top:70px;margin-left:50px;float:left;font-size:50px;"></i>
		</a>
  </header>


  <main>
    <div class="title">
      HRMS USERS LIST
    </div>

    <div class="list-base-div">
      <div class="base-div">
        <table>
          <thread>
            <tr>
              <th> <div class="heading_div"> # </div> </th>
              <th> <div class="heading_div"> Employee id </div> </th>
              <th> <div class="heading_div"> Name </div> </th>
              <th> <div class="heading_div"> Designation </div> </th>
              <th> <div class="heading_div"> Status </div> </th>
              <th> <div class="heading_div"> Action </div> </th>
            </tr>

            <!-- table content starts======================================= -->
            <tbody>
              <?php
                include 'db_Connection.php';
                $selectquerry = "SELECT * FROM hr_table";
                $query = mysqli_query($con, $selectquerry);
                $num = mysqli_num_rows($query);
                  $c=0;
                  if($num>0){
                    while($res = mysqli_fetch_array($query)){
                      if(strpos($res[3], "HR") !==false)
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
                    <div style="font-size:1.5rem">
                      <?php echo ucfirst($res['name'])." "; ?>
                      <?php echo ucfirst($res['lname']) ; ?>
                    </div>
                    <div style="font-size:1rem">
                      <?php
                      echo $res['email'];
                      ?>
                    </div>
                  </div>
                </td>

                <td>
                  <div class='table_content'>
                    <?php echo $res['desig'];?>
                  </div>
                </td>

                <td>
                  <div class="table_content" style="display:flex; justify-content:center; align-items: center;">
                    <?php
                    $stat =  $res ['status'];
                    if (strpos($stat, "Super Admin")!==false)
                    {
                      echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:#8c14fc;border-radius:0.5rem; line-height:30px; color:white;\"> Super Admin </span>";
                    }
                    else if (strpos($stat, "HR Admin")!==false)
                    {
                       echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:chartreuse;border-radius:0.5rem; line-height:30px; color:white;\"> HR Admin </span>";
                    }
                    else if (strpos($stat, "Employee")!==false)
                    {
                       echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:#1e824c;border-radius:0.5rem; line-height:30px; color:white;\"> Employee </span>";
                    }
                    else
                    {
                       echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:black;border-radius:0.5rem; line-height:30px; color:white;\"> NULL </span>";
                    }
                    ?>
                  </div>
                </td>

                <td>
                  <center></center>
                  <div class="table_content sub_table_content">
                    <a href="delete.php?id=<?php echo $res['employee_id']; ?>" title="DELETE">
                      <button>
                        <i class="fa fa-trash"></i>
                      </button>
                    </a>
                  </div>
                </td>
                </center>
              </tr>
              <?php
                     }
                   }
                 }
              ?>
            </tbody>

          </thread>
        </table>
      </div>
    </div>

  </main>
</center>



<!-- ============================hrd.php============================ -->
  <script>
     var target = document.getElementById("toggle");
     var target2 = document.getElementById("toggle2");
     var target3 = document.getElementById("toggle3");
     var target4 = document.getElementById("toggle4");
     var target5 = document.getElementById("toggle5");
     var target6 = document.getElementById("toggle6");
     function op()
     {
       if (target.style.display !== "none")
        {
          document.getElementById('i1').style.color='#42464F';
          document.getElementById('it1').style.color='#42464F';
          target.style.display = "none";
        }
        else
         {
           document.getElementById('i5').style.color='#42464F';
           document.getElementById('i4').style.color='#42464F';
           document.getElementById('i2').style.color='#42464F';
           document.getElementById('i3').style.color='#42464F';
           //CHANGING TEXT COLOR AS DEFAULT==============================
           document.getElementById('it2').style.color='#42464F';
           document.getElementById('it3').style.color='#42464F';
           document.getElementById('it4').style.color='#42464F';
           document.getElementById('it5').style.color='#42464F';

           document.getElementById('i1').style.color='#00FF40';
           document.getElementById('it1').style.color='#00FF40';
           target.style.display = "block";
           target2.style.display = "none";
           target3.style.display = "none";
           target4.style.display = "none";
           target5.style.display = "none";
         }
       }
       function op2()
     {
       if (target2.style.display !== "none")
        {
          document.getElementById('i2').style.color='#42464F';
          document.getElementById('it2').style.color='#42464F';
          target2.style.display = "none";
        }
        else
         {
           document.getElementById('i1').style.color='#42464F';
           document.getElementById('i3').style.color='#42464F';
           document.getElementById('i4').style.color='#42464F';
           document.getElementById('i5').style.color='#42464F';
           //CHANGING TEXT COLOR AS DEFAULT==============================
           document.getElementById('it1').style.color='#42464F';
           document.getElementById('it3').style.color='#42464F';
           document.getElementById('it4').style.color='#42464F';
           document.getElementById('it5').style.color='#42464F';
           document.getElementById('i2').style.color='#00FF40';
           document.getElementById('it2').style.color='#00FF40';
           target2.style.display = "block";
           target.style.display = "none";
           target3.style.display = "none";
           target4.style.display = "none";
           target5.style.display = "none";
         }
       }
       function op3()
     {
       if (target3.style.display !== "none")
        {
          document.getElementById('i3').style.color='#42464F';
          document.getElementById('it3').style.color='#42464F';
          target3.style.display = "none";
        }
        else
         {document.getElementById('i1').style.color='#42464F';
         document.getElementById('i2').style.color='#42464F';
         document.getElementById('i4').style.color='#42464F';
        document.getElementById('i5').style.color='#42464F';
        //CHANGING TEXT COLOR AS DEFAULT==============================
        document.getElementById('it1').style.color='#42464F';
        document.getElementById('it2').style.color='#42464F';
        document.getElementById('it4').style.color='#42464F';
        document.getElementById('it5').style.color='#42464F';
           document.getElementById('i3').style.color='#00FF40';
           document.getElementById('it3').style.color='#00FF40';
           target3.style.display = "block";
           target2.style.display = "none";
           target.style.display = "none";
           target4.style.display = "none";
           target5.style.display = "none";
         }
       }

       function op4()
     {
       if (target4.style.display !== "none")
        {
          document.getElementById('i4').style.color='#42464F';
          document.getElementById('it4').style.color='#42464F';
          target4.style.display = "none";
        }
        else
         {
           document.getElementById('i1').style.color='#42464F';
           document.getElementById('i2').style.color='#42464F';
           document.getElementById('i3').style.color='#42464F';
           document.getElementById('i5').style.color='#42464F';

           //CHANGING TEXT COLOR AS DEFAULT==============================
           document.getElementById('it1').style.color='#42464F';
           document.getElementById('it2').style.color='#42464F';
           document.getElementById('it3').style.color='#42464F';
           document.getElementById('it5').style.color='#42464F';
           document.getElementById('i4').style.color='#00FF40';
           document.getElementById('it4').style.color='#00FF40';
           target4.style.display = "block";
           target2.style.display = "none";
           target.style.display = "none";
           target3.style.display = "none";
           target5.style.display = "none";
         }
       }

       function op5()
     {
       if (target5.style.display !== "none")
        {
          document.getElementById('i5').style.color='#42464F';
          document.getElementById('it5').style.color='#42464F';
          target5.style.display = "none";
        }
        else
         {
           document.getElementById('i1').style.color='#42464F';
           document.getElementById('i2').style.color='#42464F';
           document.getElementById('i3').style.color='#42464F';
           document.getElementById('i4').style.color='#42464F';

           //CHANGING TEXT COLOR AS DEFAULT==============================
           document.getElementById('it1').style.color='#42464F';
           document.getElementById('it2').style.color='#42464F';
           document.getElementById('it3').style.color='#42464F';
           document.getElementById('it4').style.color='#42464F';
           document.getElementById('i5').style.color='#00FF40';
           document.getElementById('it5').style.color='#00FF40';
           target5.style.display = "block";
           target2.style.display = "none";
           target.style.display = "none";
           target3.style.display = "none";
           target4.style.display = "none";
         }
       }

       function op6()
       {
         if (target6.style.display !== "none")
          {
            document.getElementById('i6').style.color='#42464F';
            document.getElementById('it6').style.color='#42464F';
            target6.style.display = "none";
          }
          else
           {
             document.getElementById('i5').style.color='#42464F';
             document.getElementById('i4').style.color='#42464F';
             document.getElementById('i2').style.color='#42464F';
             document.getElementById('i3').style.color='#42464F';
             document.getElementById('i1').style.color='#42464F';
             //CHANGING TEXT COLOR AS DEFAULT==============================
             document.getElementById('it2').style.color='#42464F';
             document.getElementById('it3').style.color='#42464F';
             document.getElementById('it4').style.color='#42464F';
             document.getElementById('it5').style.color='#42464F';
             document.getElementById('it1').style.color='#42464F';

             document.getElementById('i6').style.color='#00FF40';
             document.getElementById('it6').style.color='#00FF40';
             target6.style.display = "block";
             target2.style.display = "none";
             target3.style.display = "none";
             target4.style.display = "none";
             target5.style.display = "none";
             target.style.display = "none";
           }
         }

  </script>

  <!--=================================================== script for side nav bar ========================================================-->
  <script type="text/javascript">
     function openbox()
     {
         document.getElementById("navpanel_div").setAttribute("style","margin-left:0px");
     }
     function closebox()
     {
         document.getElementById("navpanel_div").setAttribute("style","margin-left:-1600px");
     }
  </script>



</body>
</html>
