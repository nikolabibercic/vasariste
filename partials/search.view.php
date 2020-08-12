<?php require_once "functions.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="adds.view.php" method="get"><br>
                <h1>Pretraži oglase:</h1><br><br>
                <input type="text" name="search" placeholder="Bilo koja reč..." class="form-control"><br>
                Kategorija:<br>
                <select name="kategorija" id="">
                    <option value="0">Sve</option>
                    <?php $result = categoryList(); foreach($result as $x):  ?>
                        <option value=<?php echo $x['kategorija_id']; ?> class="form-control"><?php echo $x['opis']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
                <div class="row">
                    <div class="col">
                        Cena od:
                        <input value=0 type="number" class="form-control" name="cenaOd" placeholder="Cena od">
                    </div>
                    <div class="col">
                        Cena do:
                        <input value=0 type="number" class="form-control" name="cenaDo" placeholder="Cena do">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        Datum objave od:
                        <input type="date" value="2020-01-01" class="form-control" name="datumOd">
                    </div>
                    <div class="col">
                        Datum objave do:
                        <input type="date" value=<?php echo date('Y-m-d'); ?> class="form-control" name="datumDo">
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary">Pretraži</button><br><br>
            </form>
        </div>
    </div>
</div>