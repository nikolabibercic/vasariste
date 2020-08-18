<?php

//OVU STRANICU VISE NE KORISTIM JER SAM PROMENIO DA KORISNIK NE MOZE DA OBRISE OGLAS VEC DA GA DEAKTIVIRA
//SADA SE KORISTI STRANICA DEACTIVATE.ADD.PHP

require_once "functions.php";

//Ako nije ulogovan ne moze na stranicu delete.add.php, vraca ga na index.php
if(!isset($_SESSION['korisnik_id'])){
    header('Location: login.view.php');
}

//Kupim oglas_id sa linka obrisi oglas iz kartice oglasa
$oglasId = $_GET['oglas_id'];

//Brisem oglas zapise iz tabele slike_oglasa jer oglas moze imati slike
$sql1 = "

    delete from slike_oglasa
    where oglas_id = $oglasId;

";

$query = mysqli_query(db(),$sql1);

//Brisem oglas iz tabele oglasi
$sql2 = "
    delete from oglasi
    where oglas_id = $oglasId;
";

$query = mysqli_query(db(),$sql2);

/*Ovde proveram da li je user admin ili ne, ako jeste prikazuje se stranica za admina
 ako nije onda za obicnog usera */
require_once "user.admin.check.php";

?>