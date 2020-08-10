

<nav class="navbar navbar-expand navbar-light bg-light">
    <a href="search.view.php" class="navbar-brand">
    Vašarište<br>oglasi
    </a>

        <?php 
        
        if(isset($_SESSION['korisnik_id'])){
            require_once "partials/navbar.logged.php";
        }else{
            require_once "partials/navbar.notlogged.php";
        }

        ?>

</nav>