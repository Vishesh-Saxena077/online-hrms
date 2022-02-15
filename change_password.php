<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<script src="https://smtpjs.com/v3/smtp.js"></script>
	<script src="app.js"></script>
	<title>Send mail</title>
	<link rel="stylesheet" type="text/css" href="changepassword.css">
</head>
<body>


	<?php
	include 'db_Connection.php';

	if(isset($_POST['submit']))
	{
	  $employee_id = mysqli_real_escape_string($con, $_POST['employee_id']) ;
	  $password = mysqli_real_escape_string($con, $_POST['password']) ;
	  $cpassword =mysqli_real_escape_string($con, $_POST['cpassword']) ;

	#----------------------encrypting password -------------------------
	  $pass =  password_hash($password, PASSWORD_BCRYPT);
	  $cpass =  password_hash($cpassword, PASSWORD_BCRYPT);

		if($password === $cpassword)
		{

			$query = "UPDATE hr_table SET password = '$pass', cpassword = '$cpass' WHERE employee_id = '$employee_id'";

			$uquery = mysqli_query($con, $query);

			if($con)
			{
				echo "done";
			}else{
				echo "issue in connection";
			}

		} else {
			echo "N";
		}

	}
	?>

	<center>
		<main>
			<form action="#" method="POST">

				<h1>Create New Password</h1>

				<input type="text" name="employee_id"  placeholder="Employee Id" required/>

				<br>

				<input type="text" name="password"  placeholder="Change Password"
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
				title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" id="password1" required/>

				<br>

				<input type="text" name="cpassword" placeholder="Confirm password" required/><br>

				<button type ="submit" name="submit" > Submit </button>

				</form>
				<div id="message">
					<h3>Password must contain the following:</h3>
					<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
					<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					<p id="number" class="invalid">A <b>number</b></p>
					<p id="length" class="invalid">Minimum <b>8 characters</b></p>
				</div>
		</main>



	</center>

  <script>

			var myInput = document.getElementById("password1");
			var letter = document.getElementById("letter");
			var capital = document.getElementById("capital");
			var number = document.getElementById("number");
			var length = document.getElementById("length");

			// WHEN USER CLICKS OUTSIDE THE INPUT FEILD IT WILL HIDE THE MESSAGE BOX
			myInput.onfocus = function()
			{
				  document.getElementById("message").style.display = "block";
			}

			myInput.onblur = function()
			{
				document.getElementById("message").style.display = "none";
			}

			// When the user starts to type something inside the password field
			myInput.onkeyup = function()
			{

				// Validate lowercase letters
  			var lowerCaseLetters = /[a-z]/g;
  			if(myInput.value.match(lowerCaseLetters))
				{
    			letter.classList.remove("invalid");
    			letter.classList.add("valid");
  			}
				else
				{
    			letter.classList.remove("valid");
    			letter.classList.add("invalid");
  			}


				// Validate capital letters
  			var upperCaseLetters = /[A-Z]/g;
  			if(myInput.value.match(upperCaseLetters))
				{
    			capital.classList.remove("invalid");
    			capital.classList.add("valid");
  			}
				else
				{
    			capital.classList.remove("valid");
    			capital.classList.add("invalid");
				}


				// Validate numbers
  			var numbers = /[0-9]/g;
  			if(myInput.value.match(numbers))
				{
    			number.classList.remove("invalid");
    			number.classList.add("valid");
  	  	}
				else
				{
    			number.classList.remove("valid");
    			number.classList.add("invalid");
  			}


				// Validate length
  			if(myInput.value.length >= 8)
				{
    			length.classList.remove("invalid");
    			length.classList.add("valid");
  			}
				else
				{
    			length.classList.remove("valid");
    			length.classList.add("invalid");
  			}
	}

	</script>

</body>
</html>
