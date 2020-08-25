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

            $podkategorijaOpis = $_GET['podkategorija_opis'];

            $result = subcategoryAddsView($podkategorijaOpis);

            foreach($result as $r):
        ?>

        <?php require "adds.card.generate.php"; ?>

        <?php endforeach; ?>
         
    </div>
</div>


    
<?php require_once "partials/footer.php"; ?>