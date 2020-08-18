<?php

require_once "functions.php";

//Ako nije ulogovan ne moze na stranicu, vraca ga na login
if(!isset($_SESSION['korisnik_id'])){
    header('Location: login.view.php');
}

//Kupim oglas_id sa linka aktiviraj oglas iz kartice oglasa
$oglasId = $_GET['oglas_id'];


        //Update statusa oglasa
        $sql1 = "
            update oglasi
            set status_oglasa_id = 1
            where oglas_id = $oglasId;
        ";

        $query1 = mysqli_query(db(),$sql1);

/*Ovde proveram da li je user admin ili ne, ako jeste prikazuje se stranica za admina
 ako nije onda za obicnog usera */
require_once "user.admin.check.php";

?>