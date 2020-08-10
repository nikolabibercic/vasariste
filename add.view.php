<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<div class="container">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <br><h2>Nazad na <a href="search.view.php">pretragu</a></h2>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row">
        <?php 
            $oglasId = $_GET['oglas_id'];

            $result = addView($oglasId);

               // Prikaz kartice pojedinacnog oglasa koja ima vise detalja i prikazuje full tekst oglasa
                if(!$result){
                    header('Location: search.view.php');
                }else{
                    foreach($result  as $r){
                        require "add.card.generate.full.text.php";
                    };
                };
        ?>
         
    </div>
</div>

<?php require_once "partials/footer.php"; ?>