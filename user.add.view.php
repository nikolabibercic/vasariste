<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<div class="container">

    <div class="row">

            <div class="col-12 text-center">
                <br><h2>Idi na <a href="index.php">pretragu oglasa</a></h2>
            </div>

    </div>

    <div class="row">

        <div class="col-12 text-center">
            <br><h1>Moji oglasi:</h1><br>
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