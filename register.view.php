<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="register.php" method="post"><br>
                Forma za registraciju:<br><br>
                <input type="text" name="name" placeholder="Ime" class="form-control"><br>
                <input type="email" name="email" placeholder="Email" class="form-control"><br>
                <input type="password" name="password" placeholder="Sifra" class="form-control"><br>
                Država:<br>
                <select name="drzava" id="">
                    <?php $result = countryList(); foreach($result as $x):  ?>
                        <option value=<?php echo $x['drzava_id']; ?> class="form-control"><?php echo $x['naziv']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <input type="text" name="mesto" placeholder="Mesto" class="form-control"><br>
                <button type="submit" class="btn btn-primary">Registruj se</button><br><br>
            </form>
        </div>
    </div>
</div>
    
<?php require_once "partials/footer.php"; ?>