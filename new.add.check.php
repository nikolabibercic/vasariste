<?php

require_once "functions.php";

if(isset($_SESSION['korisnik_id'])){
    header('Location: new.add.view.php');
}else{
    header('Location: login.view.php');
}

?>