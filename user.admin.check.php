<?php

require_once "functions.php";

/*Ovde proveram da li je user admin ili ne, ako jeste prikazuje se stranica za admina
 ako nije onda za obicnog usera */

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
        header('Location: user.admin.view.php');
    }else{
        header('Location: user.add.view.php');
    }
}
else{
    header('Location: login.view.php');
}


?>