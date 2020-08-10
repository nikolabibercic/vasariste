<?php

require_once "functions.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$country = $_POST['drzava'];
$city = $_POST['mesto'];

$sql = "insert into korisnici values(null,'$name','','$email','$password','','','$city','',$country,current_timestamp()) ";
$query = mysqli_query(db(),$sql);

if($query){
    header('Location: login.view.php');
}else{
    header('Location: register.view.php');
}

?>