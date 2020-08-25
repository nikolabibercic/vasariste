<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<?php // require_once "partials/search.view.php"; ?>



<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <br><h2>Nazad na <a href="search.view.php">pretragu</a></h2>
        </div>
        <div class="col-3"></div>
    </div>
    
    <div class="row">
        <?php 
            $search = $_GET['search'];
            $kategorija = $_GET['kategorija'];
            $podkategorija = $_GET['podkategorija'];
            $cenaOd = $_GET['cenaOd'];
            $cenaDo = $_GET['cenaDo'];
            $datumOd = $_GET['datumOd'];
            $datumDo = $_GET['datumDo'];

            $podkategorija = trim($podkategorija);

            $result = addsList($search,$kategorija,$cenaOd,$cenaDo,$datumOd,$datumDo,$podkategorija);

           if(!$result){
                header('Location: search.view.php');
            }else{
                foreach($result  as $r){
                    require "adds.card.generate.php";
                };
            }; 
                
        ?>
  
    </div>
</div>

<?php require_once "partials/footer.php"; ?>