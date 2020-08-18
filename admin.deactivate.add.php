<?php

require_once "functions.php";

/*Ovde proveram da li je user admin ili ne, ako jeste obrise se oglas
 ako nije salje ga na user stranicu */

 if(isset($_SESSION['korisnik_id'])){
    $korisnikId = $_SESSION['korisnik_id'];
    $sql = "
    select k.* 
    from prava as p
    inner join korisnici_prava as k on k.pravo_id = p.pravo_id
    where  p.opis = 'Administrator' and k.korisnik_id = $korisnikId
";

    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_assoc($query);

    if($result){
        //Kupim oglas_id sa linka obrisi oglas iz kartice oglasa
        $oglasId = $_GET['oglasId'];


        //Update statusa oglasa
        $sql1 = "
            update oglasi
            set status_oglasa_id = 2, tip_oglasa_id = 1
            where datum_objave <= DATE_ADD(CURRENT_DATE(), INTERVAL -30 DAY);
        ";

        $query1 = mysqli_query(db(),$sql1);

        header('Location: user.admin.view.php');
    }else{
        header('Location: user.add.view.php');
    }
}
else{
    header('Location: login.view.php');
}



?>