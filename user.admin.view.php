<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>


<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
        <br><h1>Ovo je administratorska stranica!</h1><br><br>
        </div>
    </div>

    <div class="row">
        <?php 

            $korisnikId = $_SESSION['korisnik_id'];

            $result = userAddsList($korisnikId);

            foreach($result  as $r):
        ?>
        
        <?php require "adds.card.generate.php"; ?>

        <?php endforeach; ?>
        
        </div>
</div>
    
<?php require_once "partials/footer.php"; ?>