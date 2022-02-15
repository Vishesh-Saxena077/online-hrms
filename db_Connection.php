<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = "hr";
// Create connection
$con = new mysqli($server, $user, $password, $db);
if($con) {
  ?>
  <script type="text/javascript">
    alert("Connection established");
  </script>
<?php
}else{
?>
    <script>
        alert("Connection Problem");
    </script>
<?php
}
?>
