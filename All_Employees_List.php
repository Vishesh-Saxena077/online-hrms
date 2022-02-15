<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>All Employees Data</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="All_Epmloy_List.css">
</head>
<body onload="getRand()">
  <center>
    <header id="header">
       <button class="bra_btn"><a href="hrd.php"><i class="fa fa-home act_btn"></i></a></button>

       <button id="btn_add" class="btn1" onclick="o()">+ ADD </button>
       <input type="text"
       class="search_box"
       id="myInput"
       onkeyup="myFunction()"
       placeholder="Search for names.."
       title="Type in a name"
       style="width:50%;background:rgb(255,255,255,0.2);border-color:white;float:right;margin-top:60px;margin-right:50px">

    </header>

    <main>


      <section id="to">
        <div class="container">
          <div class="form_base_div">
            <i class="fa fa-close icon" onclick="c()"></i>
            <form autocomplete="off" action="" method="POST">
							<div class="label">Add New Data</div>
							<br>
							<div class="_input_tags">Employee ID:</div>
							<input type="text" class="input_type1" name="employee_id" id="number" readonly style="width:100%; letter-spacing: 20px; text-align: center;">
							<br>
							<br>
							<div class="_input_tags">Name :</div>
							<br>
							<input type="text" name="name" placeholder="First Name" required>
							<input type="text" name="lname" placeholder="Last Name" required>
							<br>
							<br>
							<div class="_input_tags">Email / Address :</div>
							<br>
							<input type="email" name="email" placeholder="Email Id" required>
							<input type="text" name="address" placeholder="Address" required>
							<br>
							<br>
							<div class="_input_tags">Country / State / City :</div>
							<br>
							<!-- COUNTRY -->
							<input type="text" class="input_type2" placeholder="Country" name="country" required>
							<input type="text" class="input_type2" placeholder="State" name="state" required>
							<input type="text" class="input_type2" placeholder="City" name="city" required>
							<br>
							<br>
							<div class="_input_tags">Phone Number</div>
							<input type="tel" name="phone_number" pattern="^\d{10}$" placeholder="Format (xxxxxxxxxx)" required style="width: 60%;letter-spacing: 5px;" />
							<br>
							<br>
							<div class="_input_tags">Gender</div>
							<br>
							<input type="radio" name="gender" value="M" style="width: 10%;">MALE
							<input type="radio" name="gender" value="F" style="width: 10%;">FEMALE
							<input type="radio" name="gender" value="F" style="width: 10%;">OTHERS
							<br>
							<br>
							<div class="_input_tags" style="width: 30%;">
								Age<input type="number" min="20" name="age" required style="width: 20%;">
							</div>
							<br>
							<br>
							<div class="_input_tags">Date Of Birth<input type="date" name="dob" required style="width: 60%;"></div>

							<br>
							<br>
							<div class="_input_tags">Hiering Date<input type="date" name="hiering_date" required style="width: 60%;"></div>

							<br>
							<br>
							<div class="_input_tags">Post</div>
							<br>
							<select class="select" name="status" required>
								<option value="NULL">NULL</option>
								<option value="Super Admin">Super Admin</option>
								<option value="HR-Admin">HR-Admin</option>
								<option value="Employee">Employee</option>
								<option value="Employee">Intern</option>
							</select>
							<br>
							<br>
							<div class="_input_tags">Current Status</div>
							<br>
							<select class="select" name="current_status" required>
								<option value="NULL">NULL</option>
								<option value="Project Head of Web Developement">Project Head of Web Developement</option>
								<option value="Project Head of Android Development">Project Head of Android Development</option>
								<option value="Head of Web Development Department">HOD-Web Developement</option>
								<option value="Head of Android Development Department">HOD-Android Development</option>
							</select>
							<br>
							<br>
							<div class="_input_tags">Designation</div>
							<br>
							<select class="select" name="designation" required>
								<option value="NULL">NULL</option>
								<option value="CEO">CEO</option>
								<option value="Full Stack Web Developer">Full Stack Web Developer</option>
								<option value="Front-End Web Developer">Front-End Web Developer</option>
								<option value="Back-End Web Developer">Back-End Web Developer</option>
								<option value="Full Stack Adroid Developer">Full Stack Adroid Developer</option>
								<option value="Front-End Adroid Developer">Front-End Adroid Developer</option>
								<option value="Back-End Adroid Developer">Back-End Adroid Developer</option>
								<option value="Back-End Adroid Developer">Marketing Mannager</option>
								<option value="Back-End Adroid Developer">Marketing Finnace Mannager</option>
							</select>
							<br>
							<br>
							<div class="_input_tags">Department</div>
							<br>
							<select class="select" name="department" required>
								<option value="NULL">NULL</option>
								<option value="HR-Department"> HR-Department</option>
								<option value="Web Development Department">Web Development Department</option>
								<option value="Android Development">Android Development Department</option>
								<option value="Android Development">IT Development Department</option>
								<option value="Android Development">Marketing Department</option>
							</select>
							<br>
							<br>
							<div class="_input_tags">Department Id</div>
							<br>
							<select class="select" name="department_id" required>
								<option value="NULL">NULL</option>
								<option value="0101">0101</option>
								<option value="2512"> 2512 </option>
								<option value="1356"> 1356 </option>
								<option value="5010"> 5010 </option>
								<option value="6061"> 6061 </option>
							</select>
							<br>
							<div class="form_btn">
								<button class="submit_btn" type="submit" name="submit">Submit</button>
							</div>
						</form>
          </div>
        </div>
      </section>

      <div class="title">
        ALL EMPLOYEES LIST
      </div>

      <div class="list-base-div">
        <div class="base-div">
          <table id="myTable" >

            <div style="font-size:1rem">
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


            $selectquery = "SELECT * FROM hr_table";

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
                      <div style="font-size:1.5rem">
                        <?php echo ucfirst($res['name'])." "; ?>
                        <?php echo ucfirst($res['lname']) ; ?>
                      </div>
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
                            echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:#f03434;border-radius:0.5rem; line-height:30px;\"> Super Admin </span>";
                          }
                          else if (strpos($stat, "HR Admin")!==false)
                          {
                            echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:chartreuse;border-radius:0.5rem; line-height:30px;\"> HR Admin </span>";
                          }
                          else if (strpos($stat, "Employee")!==false)
                          {
                            echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:#f89406;border-radius:0.5rem; line-height:30px;\"> Employee </span>";
                          }
                          else if (strpos($stat, "Manager")!==false)
                          {
                            echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:#1e824c;border-radius:0.5rem; line-height:30px;\"> Employee </span>";
                          }
                          else if (strpos($stat, "Financee Officer")!==false)
                          {
                            echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:#8c14fc;border-radius:0.5rem; line-height:30px;\"> Employee </span>";
                          }
                          else if (strpos($stat, "Recruting Officer")!==false)
                          {
                            echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:#96281b;border-radius:0.5rem; line-height:30px;\"> Employee </span>";
                          }
                          else
                          {
                            echo "<span style=\"height:30px; width:120px;font-weight:bolder;background-color:black;border-radius:0.5rem; line-height:30px;\"> NULL </span>";
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


<!--  -->
  <?php
  include 'db_Connection.php';

  if(isset($_POST['submit']))
  {
    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $phone_number = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $hiering_date = $_POST['hiering_date'];
    $status = $_POST['status'];
    $current_status = $_POST['current_status'];
    $designation = $_POST['designation'];
    $department_id = $_POST['department_id'];
    $department = $_POST['department'];
    $current_status = $_POST['current_status'];

    /*----------------
    Query for checking that weather the given id or email is reapting or not in data base.
     -------------------*/
     //___________________________STRAT

    $check1=mysqli_real_escape_string($con, $employee_id);
    $check2=mysqli_real_escape_string($con, $email);

    $employee_id_query = "select * from hr_table where employee_id = '$employee_id' ";
    $email_query = "select * from hr_table where email = '$email' ";

    $query = mysqli_query($con,$employee_id_query);
    $query2 = mysqli_query($con,$email_query);

    $employee_id_count = mysqli_num_rows($query);
    $email_count = mysqli_num_rows($query2);
    if($employee_id_count>0)
    {
      echo"already existing";
      ?>
        <script type="text/javascript">
          location.replace("output_page.php");
        </script>
      <?php
    }else{
      if($email_count>0){
        echo"email id alreadry exits";
    }
      else{

        $_SESSION['emp_id'] = $employee_id;

        $insertquery = " insert into hr_table
                      (name, lname, employee_id, desig,
                      department, email, country, state, city,
                      phone_number, address, dob, department_id,
                      gender, age, hiering_date, status, current_status)
                      VALUES ('$name', '$lname', '$employee_id',
                      '$designation', '$department', '$email', '$country',
                      '$state', '$city', '$phone_number', '$address', '$dob',
                      '$department_id', '$gender', '$age' ,'$hiering_date',
                      '$status' ,'$current_status') ";

    $result = mysqli_query($con,$insertquery);

    if($result){
      echo "done";
      ?>
        <script type="text/javascript">
          location.replace("emp_salary.php");
        </script>
      <?php
    }else{
      echo "NOT DONE";
    }
      }
    }

  }
  ?>
