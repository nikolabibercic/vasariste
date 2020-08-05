<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="login.php" method="post"><br>
                Forma za logovanje:<br><br>
                <input type="email" name="email" placeholder="Email" class="form-control"><br>
                <input type="password" name="password" placeholder="Sifra" class="form-control"><br>
                <button type="submit" class="btn btn-primary">Uloguj se</button><br><br>
            </form>
            <p>Ako nemate nalog registrujte se <a href="register.view.php">ovde</a></p>
        </div>
    </div>
</div>
    
<?php require_once "partials/footer.php"; ?>