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
     if($num = mysqli_num_rows($query) > 0)
     {
       while($row = mysqli_fetch_array($query))
       {
         $name = $row['name'];
         $email = $row['email'];
         $gender = $row['gender'];
       }
     }else{
       echo "no data";
     }
   }

   ?>
<!DOCTYPE html>
<html>
   <head>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="hrd_style.css">
      <title>HRD DASBOARD</title>
   </head>
   <body>
      <center>
         <header>
            <button class="bra_btn" onclick="openbox()">
            <i style="font-size:30px" class="fa">&#xf0c9;</i>
            </button>
            <a href="User_PersonalInfo.php">
               <button class="user_info">
                  <div class="avtar">
                     <img src="#" id="img" class="img">
                  </div>
                  <div class="user_info_div">
                  <div class="user_info_div2">
                  <br><br><br>
                  <span style="font-size:30px;color:white;border-bottom:1px solid gray;">WELCOME</span><br>
                  <span id="detail1" class="detail1"></span><br>
                  <span id="detail2" class="detail2"></span>
                  <div>
                  </div>
               </button>
            </a>
            <a href="logout.php">
            <button class="logout_btn">LOGOUT</button>
            </a>
            <div class="try">
            </div>
         </header>
         <main>
            <!-- side nav bar -->
            <div class="navpanel_div" id="navpanel_div">
               <div class="navpanel_inner_div">
                  <button class="closing" onclick="closebox()">
                  <i style="font-size:30px;"class="fa fa-close"></i>
                  </button>
                  <nav>

                    <!-- DASHBOARD -->
                     <div class="nav_head_div1" onclick="op()">
                        <i class="fa fa-rocket" id="i1" style="font-size:30px"></i>
                        <span id="it1">
                          HRMS
                        </span>
                        <div class="icon">
                           <i class='fa fa-angle-down' id="fas" style='font-size:25px'></i>
                        </div>
                     </div>
                     <div class="dashboard_main_div" id="toggle" style="display: none;">
                        <a href="hrd.php">Dashboard</a><br>
                        <a href="user_info.php">HRMS Users</a><br>
                        <a href="reports.php">Reports</a><br>
                        <a href="recritment.php">Recruitment Section</a><br>
                     </div>


                     <!-- APPS -->
                     <div class="nav_head_div1" onclick="op2()">
                        <i class="fa fa-cube"  id="i2" style="font-size:30px"></i>
                        <span id="it2">
                          Apps
                        </span>
                        <div class="icon">
                           <i class='fa fa-angle-down' id="fas" style='font-size:25px'></i>
                        </div>
                     </div>
                     <div class="dashboard_main_div" id="toggle2" style="display: none;">
                        <center>
                           <a href="calander.php">Calender</a><br>
                        </center>
                     </div>

                     <!-- EMPLOYEES -->
                     <div class="nav_head_div1" onclick="op3()">
                        <i class="fa fa-user" id="i3" style="font-size:30px"></i>
                        <span id="it3">
                          Employees
                        </span>
                        <div class="icon">
                           <i class='fa fa-angle-down' id="fas" style='font-size:25px'></i>
                        </div>
                     </div>
                     <div class="dashboard_main_div" id="toggle3" style="display: none;">
                        <center>
                           <a href="All_Employees_List.php">Employees list</a><br>
                           <a href="All_Employees_Salary_List.php">Employees Salary</a><br>
                           <a href="attendance_view.php">Employees Attendence</a><br>
                        </center>
                     </div>

                     <!-- PROJECTS -->
                     <div class="nav_head_div1" onclick="op4()">
                        <i class="fa fa-briefcase" id="i4" style="font-size:30px"></i>
                        <span id="it4">
                          Projects
                        </span>
                        <div class="icon">
                           <i class='fa fa-angle-down' id="fas" style='font-size:25px'></i>
                        </div>
                     </div>
                     <div class="dashboard_main_div" id="toggle4" style="display: none;">
                        <center>
                           <a href="#">Projects</a><br>
                        </center>
                     </div>

                     <!-- ACCOUNTING -->
                      <div class="nav_head_div1" onclick="op5()">
                        <i class='far fa-file' id="i5" style='font-size:36px'></i>
                         <span id="it5">
                           Accounting
                         </span>
                         <div class="icon">
                            <i class='fa fa-angle-down' id="fas" style='font-size:25px'></i>
                         </div>
                      </div>
                      <div class="dashboard_main_div" id="toggle5" style="display: none;">
                         <a href="payslip1.php">Payslip</a><br>
                      </div>

                      <!-- setting -->
                       <div class="nav_head_div1" onclick="op6()">
                         <i class='fa fa-gear fa-spin' id="i6" style='font-size:36px'></i>
                          <span id="it6">
                            Settings
                          </span>
                          <div class="icon">
                             <i class='fa fa-angle-down' id="fas" style='font-size:25px'></i>
                          </div>
                       </div>
                       <div class="dashboard_main_div" id="toggle6" style="display: none;">
                         <button id="button" onclick="theme('1');">Theme 1</button><br>
                         <button id="button" onclick="theme('2');">Theme 2</button>
                       </div>

                  </nav>
               </div>
            </div>


            <!-- ++++++++++++++++++++++++++++ clock Section ++++++++++++++++++++++++++++ -->
            <div class="dashboard_div1">
               <div class="clock">
                  <div class="hour">
                     <div class="hr" id="hr"></div>
                  </div>
                  <div class="min">
                     <div class="mn" id="mn"></div>
                  </div>
                  <div class="sec">
                     <div class="sc" id="sc"></div>
                  </div>
               </div>
            </div>

            <div class="dashboard_div2">
              <p id="date"></p>
              <script type="text/javascript">
                n =  new Date();
                y = n.getFullYear();
                m = n.getMonth() + 1;
                d = n.getDate();
                document.getElementById("date").innerHTML = m + "-" + d + "-" + y;
              </script>
            </div>

         </main>
      </center>

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

      <!--============================================== script for fecthing and display Users data  =============================================-->
      <script type="text/javascript">
         var var1 ="<?php echo "$name" ?>";
         var var2 = "<?php echo "$email" ?>";
         var v = var1.charAt(0).toUpperCase() + var1.slice(1);


         document.getElementById("detail1").innerHTML = v ;
         document.getElementById("detail2").innerHTML = var2 ;

         /*fetching data and displaying img according to the gender*/
         var gender = "<?php echo "$gender" ?>";
         if(gender == 'M') {
           document.getElementById("img").src = "male.jpg";
         }else{
           document.getElementById("img").src = "female.jpg";
         }
      </script>

      <!--========================================================= script for clock ===============================================================-->
      <script type="text/javascript">
         const deg = 6;
         const hr = document.querySelector('#hr');
         const mn = document.querySelector('#mn');
         const sc = document.querySelector('#sc');

         setInterval(() => {

         let day = new Date();
         let hh = day.getHours() * 30;
         let mm = day.getMinutes() * deg;
         let ss = day.getSeconds() * deg;

         hr.style.transform = `rotateZ(${(hh)+(mm/12)}deg)`;
         mn.style.transform = `rotateZ(${mm}deg)`;
         sc.style.transform = `rotateZ(${ss}deg)`;
         })
      </script>

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



      <script>
      function theme(val)
      {
        if(val == 1)
        {
          var element1_1 = document.body;
          var element1_2 = document.getElementById("header");
          element1_1.classList.toggle("theme1");
          element1_2.classList.toggle("header1");
        }

        else if (val == 2)
        {
            var element2_1 = document.body;
            var element2_2 = document.getElementById("header");
            element2_1.classList.toggle("theme2");
            element2_2.classList.toggle("header2");
        }

        else
        {
          alert("error");
        }

      }

      </script>

   </body>
</html>
