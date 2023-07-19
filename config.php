<?php
$connection = mysqli_connect("localhost","upescit8_upescsi","UPESCSI@2021s")or die("Could not connect to MYSQL");
mysqli_select_db($connection,'upescit8_contact') or die("Could not select db");
?>