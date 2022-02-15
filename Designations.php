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
  <link rel="stylesheet" type="text/css" href="designation.css">
</head>
<body>
	<center>
		<header id="header">
			<button class="bra_btn" onclick="openbox()">
				<i style="font-size:2rem" class="fa fa-bar">&#xf0c9;</i>
			</button>
		</header>

		<main>

			<div class ="title"> DESIGNATIONS </div>

			<section>
			</section>
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
