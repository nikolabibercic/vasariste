<?php

require_once "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "
    select k.* 
    from korisnici as k
    where k.email = '$email' and k.password = '$password';
";

$query = mysqli_query(db(),$sql);
$result = mysqli_fetch_assoc($query);

if($result){
    login($result);
    header('Location: index.php');
}else{
    header('Location: login.view.php');
}

?>