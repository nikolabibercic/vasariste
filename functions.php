<?php 

require_once "config.php";

session_start();

function dd($val){
    echo "<pre>";
    die(var_dump($val));
    echo "<pre>";
}

function db(){
    $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die('Error');

    return $conn;
}

function login($result){

    session_start();
    $_SESSION['korisnik_id'] = $result['korisnik_id'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['ime'] = $result['ime'];

    return $result;
}

function categoryList(){
    
    $sql = "
        select ko.*
        from kategorije_oglasa as ko
        ";
    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function currencyList(){
    
    $sql = "
        select v.*
        from valute as v
        ";
    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function countryList(){
    
    $sql = "
        select d.*
        from drzave as d
        ";
    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function adTypes(){
    
    $sql = "
        select t.*
        from tipovi_oglasa as t
        ";
    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function addsList($search,$kategorija,$cenaOd,$cenaDo,$datumOd,$datumDo){
    $sql = "
        select o.*, ko.opis as kategorija, t.opis as tip_oglasa,k.*,v.opis as valuta,k.grad,d.naziv as drzava,k.telefon
        from oglasi as o
        inner join korisnici as k on k.korisnik_id = o.korisnik_id
        inner join kategorije_oglasa as ko on ko.kategorija_id = o.kategorija_id
        inner join tipovi_oglasa as t on t.tip_oglasa_id = o.tip_oglasa_id
        inner join valute as v on v.valuta_id = o.valuta_id
        inner join drzave as d on d.drzava_id = k.drzava_id
        where ( o.naslov like '%$search%' or o.tekst like '%$search%' or ko.opis like '%$search%' or k.email like '%$search%' )
        and ( ko.kategorija_id = $kategorija or $kategorija = 0)
        and ( o.cena >= $cenaOd or $cenaOd = '')
        and  ( o.cena <= $cenaDo or $cenaDo = '')
        and ( o.datum_objave BETWEEN '$datumOd' and DATE_ADD('$datumDo', INTERVAL 1 DAY) )
    
        order by o.tip_oglasa_id desc, o.datum_objave desc
    ";

    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function userAddsList($korisnikId){
    $sql = "
        select o.*, ko.opis as kategorija, t.opis as tip_oglasa,k.*,v.opis as valuta,k.grad, d.naziv as drzava
        from oglasi as o
        inner join korisnici as k on k.korisnik_id = o.korisnik_id
        inner join kategorije_oglasa as ko on ko.kategorija_id = o.kategorija_id
        inner join tipovi_oglasa as t on t.tip_oglasa_id = o.tip_oglasa_id
        inner join valute as v on v.valuta_id = o.valuta_id
        inner join drzave as d on d.drzava_id = k.drzava_id
        where k.korisnik_id = $korisnikId
    
        order by o.tip_oglasa_id desc, o.datum_objave desc
    ";

    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function addView($oglasId){
    $sql = "
        select o.*, ko.opis as kategorija, k.grad, t.opis as tip_oglasa,k.*,v.opis as valuta,d.naziv as drzava
        from oglasi as o
        inner join korisnici as k on k.korisnik_id = o.korisnik_id
        inner join kategorije_oglasa as ko on ko.kategorija_id = o.kategorija_id
        inner join tipovi_oglasa as t on t.tip_oglasa_id = o.tip_oglasa_id
        inner join valute as v on v.valuta_id = o.valuta_id
        inner join drzave as d on d.drzava_id = k.drzava_id
        where o.oglas_id = $oglasId
    
        order by o.tip_oglasa_id desc, o.datum_objave desc
    ";

    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function categoryAddsView($kategorijaId){
    $sql = "
        select o.*, ko.opis as kategorija, k.grad, t.opis as tip_oglasa,k.*,v.opis as valuta,d.naziv as drzava
        from oglasi as o
        inner join korisnici as k on k.korisnik_id = o.korisnik_id
        inner join kategorije_oglasa as ko on ko.kategorija_id = o.kategorija_id
        inner join tipovi_oglasa as t on t.tip_oglasa_id = o.tip_oglasa_id
        inner join valute as v on v.valuta_id = o.valuta_id
        inner join drzave as d on d.drzava_id = k.drzava_id
        where o.kategorija_id = $kategorijaId
    
        order by o.tip_oglasa_id desc, o.datum_objave desc
    ";

    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function addsImages($search){
    $sql = "
        select s.*
        from slike_oglasa as s
        where s.oglas_id = '$search'
    ";

    $query = mysqli_query(db(),$sql);
    $result = mysqli_fetch_all($query,MYSQLI_ASSOC);

    return $result;
}

function uploadImage($files,$korisnik){

    $target_dir = "uploads/";
    $target_file = $target_dir . $korisnik . basename($files["name"]) ;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($files["size"] > 500000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    // echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($files["tmp_name"], $target_file)) {
        echo "The file " . basename( $files["name"] ) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }

    return $target_file;
}

?>