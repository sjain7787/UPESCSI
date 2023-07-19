<?php

$connection = mysqli_connect("localhost","upescit8_upescsi","UPESCSI@2021s");
$db = mysqli_select_db($connection,'upescit8_contact');


if(isset($_POST['contact']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

require_once 'config.php';

$query = " insert into contact(name, email, message)
values ('$name','$email','$message')";

mysqli_query($connection, $query);

header('location:Thankc.html');
    
}

?>