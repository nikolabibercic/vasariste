<?php

require_once "functions.php";

if(isset($_SESSION['korisnik_id'])){

    $oglasId = $_GET['oglasId'];
    $tipOglasaId = $_GET['tipOglasa'];

    $sqlUpdateType = "update oglasi set tip_oglasa_id = $tipOglasaId where oglas_id = $oglasId ";
    $queryUpdateType = mysqli_query(db(),$sqlUpdateType);

    if($queryUpdateType){
        header('Location: user.admin.view.php');
    }else{
        header('Location: user.admin.view.php');
    }

}else{
    header('Location: login.view.php');
}



?>