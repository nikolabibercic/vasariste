<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="new.add.php" method="post" enctype="multipart/form-data"><br>
                <h3>Unesi podatke za novi oglas:</h3><br>
                <input type="text" name="naslov" placeholder="Naslov oglasa" class="form-control" required><br>
                <textarea type="textarea" rows="8" cols="10" name="tekst" placeholder="Tekst oglasa" class="form-control" required></textarea><br>
                <input type="text" name="cena" placeholder="Cena" class="form-control" required><br>
                <input type="text" name="telefon" placeholder="Telefon" class="form-control"><br>
                Valuta:<br>
                <select name="valuta" id="">
                    <?php $result = currencyList(); foreach($result as $x):  ?>
                        <option value=<?php echo $x['valuta_id']; ?> class="form-control"><?php echo $x['opis']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>

                Izaberi kategoriju oglasa:<br><br>
                <select name="kategorija" id="">
                    <?php $result = categoryList(); foreach($result as $x):  ?>
                        <option value=<?php echo $x['kategorija_id']; ?> class="form-control"><?php echo $x['opis']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                Ubaci slike:</h4><br><br>
                Slika 1
                <input type="file" name="fileToUpload1" id="fileToUpload1" class="form-control"><br>
                Slika 2
                <input type="file" name="fileToUpload2" id="fileToUpload2" class="form-control"><br>
                Slika 3
                <input type="file" name="fileToUpload3" id="fileToUpload3" class="form-control"><br>    
                    
                <button type="submit" class="btn btn-primary">Postavi oglas</button><br><br>
            </form>
        </div>
    </div>
</div>

    
<?php require_once "partials/footer.php"; ?>