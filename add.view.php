<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<div class="container">
    <div class="row">
        <?php 
            $oglasId = $_GET['oglas_id'];

            $result = addView($oglasId);

            foreach($result as $r):
        ?>
        <!-- Prikaz kartice pojedinacnog oglasa koja ima vise detalja i prikazuje full tekst oglasa -->
        <?php require "add.card.generate.full.text.php"; ?>

        <?php endforeach; ?>
         
    </div>
</div>

<?php require_once "partials/footer.php"; ?>