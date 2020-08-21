<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <br><h2>Ovde možeš <a href="search.view.php">pretražiti oglase</a></h2>
        </div>
        <div class="col-3"></div>
    </div><br>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <br><h4>Top 50 oglasa na sajtu:</h4>
        </div>
        <div class="col-3"></div>
    </div>
    
    <div class="row">
        <?php 

            $result = top50AddsView();

            foreach($result  as $r):
        ?>

        <?php require "adds.card.generate.php"; ?>

        <?php endforeach; ?>
         
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once "partials/footer.php"; ?>