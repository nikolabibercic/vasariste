<?php

require_once "functions.php";

if(isset($_SESSION['korisnik_id'])){

$korisnikId = $_SESSION['korisnik_id'];
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
$cena = $_POST['cena'];
$kategorija = $_POST['kategorija'];
$valuta = $_POST['valuta'];
$telefon = $_POST['telefon'];

$files1 = $_FILES["fileToUpload1"];
$files2 = $_FILES["fileToUpload2"];
$files3 = $_FILES["fileToUpload3"];

$korisnik = $_SESSION['korisnik_id'];

$conn = db();
    $sqlUpdatePhone = "update korisnici set telefon = '$telefon' where korisnik_id = $korisnikId ";
    $queryUpdate = mysqli_query($conn,$sqlUpdatePhone);

    $sql = "insert into oglasi values(null,'$naslov','$tekst',$cena,$kategorija,1,$korisnik,current_timestamp(),$valuta)";
    $query = mysqli_query($conn,$sql);
 
    $lastId = mysqli_insert_id($conn);

    if($_FILES["fileToUpload1"]['size'] > 0){
        $path1 = uploadImage($files1,$korisnik);
        $sql2 = "insert into slike_oglasa values(null,$lastId,'$path1')";
        $query2 = mysqli_query($conn,$sql2);
    }

    if($_FILES["fileToUpload2"]['size'] > 0){
        $path2 = uploadImage($files2,$korisnik);
        $sql3 = "insert into slike_oglasa values(null,$lastId,'$path2')";
        $query3 = mysqli_query($conn,$sql3);
    }

    if($_FILES["fileToUpload3"]['size'] > 0){
        $path3 = uploadImage($files3,$korisnik);
        $sql4 = "insert into slike_oglasa values(null,$lastId,'$path3')";
        $query4 = mysqli_query($conn,$sql4);
    }


    if($query){
        header('Location: index.php');
    }else{
        header('Location: new.add.view.php');
    }


}else{
    header('Location: login.view.php');
}

?>