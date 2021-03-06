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
        <div class="col-6 offset-3">
            <h4>Deaktivacija oglasa starijih od 30 dana:</h4><br>
            <form action="admin.deactivate.adds.php" method="get">
                <button type="submit" class="btn btn-primary">Deaktiviraj oglase starije od 30 dana</button><br><br>
            </form>
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-6 offset-3">
            <h4>Deaktivacija pojedinačnog oglasa:</h4><br>
            <form action="admin.deactivate.add.php" method="get">
                Unesi ID oglasa:
                <input type="text" name="oglasId" placeholder="Unesi ID oglasa" class="form-control" required><br>
                <button type="submit" class="btn btn-primary">Deaktiviraj oglas</button><br><br>
            </form>
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-6 offset-3">
            <h4>Forma za promenu tipa oglasa:</h4><br>
            <form action="change.add.type.php" method="get">
                Unesi ID oglasa:
                <input type="text" name="oglasId" placeholder="Unesi ID oglasa" class="form-control" required><br>

                Izaberi tip oglasa:<br>
                <select name="tipOglasa" id="">
                    <?php $result = adTypes(); foreach($result as $x):  ?>
                        <option value=<?php echo $x['tip_oglasa_id']; ?> class="form-control"><?php echo $x['opis']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <button type="submit" class="btn btn-primary">Promeni tip oglasa</button><br><br>
            </form>
        </div>
    </div><br><br>

    <div class="row">
        <div class="col-6 offset-3">
            <h4>Forma za brisanje oglasa:</h4><br>
            <form action="admin.delete.add.php" method="get">
                Unesi ID oglasa:
                <input type="text" name="oglasId" placeholder="Unesi ID oglasa" class="form-control" required><br>
                <button type="submit" class="btn btn-primary">Obriši oglas</button><br><br>
            </form>
        </div>
    </div><br><br>

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