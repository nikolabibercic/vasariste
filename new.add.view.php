<?php require_once "functions.php"; ?>

<?php require_once "partials/head.php"; ?>

<?php require_once "partials/navbar.php"; ?>

<script>
        function random(){
            var oglasi = document.getElementById('kategorija').value;

            if(oglasi === '1'){
                var niz = ['Stambeni prostor','Poslovni prostor','Ostalo'];
            }   
            if(oglasi === '2'){
                var niz = ['Administracija','Trgovina, prodaja','IT','Bankarstvo','Računovodstvo, knjigovodstvo','Ekonomija','Elektrotehnika','Ostalo'];
            }   
            if(oglasi === '3'){
                var niz = ['Delovi i oprema','Automobili','Motori','Kamioni','Autobusi','Kamperi','Plovila','Prikolice','Dostavna vozila','Ostalo'];
            }  
            if(oglasi === '4'){
                var niz = ['Desktop','Laptop','Tablet','Štampači i skeneri','Monitori','Komponente','Softver','Igrice','Servis','Ostalo'];
            }   
            if(oglasi === '5'){
                var niz = ['Države','Gradovi','Sela','Reke','Planine','More','Banje','Jezera','Ostalo'];
            }   
            if(oglasi === '6'){
                var niz = ['Ona traži njega','On traži nju','Ostalo'];
            }   
            if(oglasi === '7'){
                var niz = ['Masaže','Depilacija ','Pedikir','Manikir','Šminkanje','Tetoviranje','Ostalo'];
            }   
            if(oglasi === '8'){
                var niz = ['Građevinarske usluge','Materijali','Vrata','Prozori','Bravarija','Vodovod i grejanje','Bazeni i fontane','Ostalo'];
            }   
            if(oglasi === '9'){
                var niz = ['Poljoprivredne mašine i oprema','Seme, cveće i sadnice','Domaće životinje','Pčelarstvo','Poljoprivredne usluge','Ostalo'];
            }   
            if(oglasi === '10'){
                var niz = ['Ručni i električni alati','Građevinske mašine','Industrijske mašine','Kancelarijski aparati i oprema','Elektromaterijal','Servis i popravka','Merdevine','Viljuškari','Pumpe i kompresori','Ugostiteljska i trgovinska oprema','Ostalo'];
            }   
            if(oglasi === '11'){
                var niz = ['Dvosedi, trosedi, fotelje i kauči','Ormari, plakari, vitrine i komode','Stolovi','Stolice','Kreveti','Dušeci','Kuhinje','Posuđe i escajg','Rasveta','Tepisi','Nameštaj za kancelariju','Nameštaj za dečju sobu','Ostalo'];
            }   
            if(oglasi === '12'){
                var niz = ['Frižideri i zamrzivači','Klima uređaji','Mašine za posuđe','Mašine za veš','Roštilji','Šporeti i mikrotalasne','Usisivači','Delovi za kućne aparate','Servis i popravka','Ostalo'];
            }   
            if(oglasi === '13'){
                var niz = ['Mobilni telefoni','Fiksni telefoni','Oprema za telefone','Servis telefona','Ostalo'];
            }   
            if(oglasi === '14'){
                var niz = ['Muzički instrumenti','Muzička oprema i delovi','Studijska oprema','Koncertna rasveta','Servis instrumenata','Ostalo'];
            }   
            if(oglasi === '15'){
                var niz = ['Ženska odeća','Muška odeća','Ženska obuća','Muška obuća','Odeća za devojčice','Odeća za dečake','Odeća za bebe','Obuća za bebe','Sportska odeća','Sportska obuća','Venčanice i oprema za venčanja','Nakit','Naočare','Satovi','Torbe, novčanici i kišobrani','Ostalo'];
            }   
            if(oglasi === '16'){
                var niz = ['Sportska odeća','Sportska obuća','Bicikli i trotineti','Fitnes oprema','Kamp oprema','Oprema za lov','Planinarenje i alpinizam','Sportsko oružje i oprema','Teniska oprema','Vodeni sportovi','Zimski sportovi','Sportski tereni i objekti','Sportski preparati','Ostalo'];
            }    
            if(oglasi === '17'){
                var niz = ['Psi','Mačke','Ptice','Ostalo'];
            }   
            if(oglasi === '18'){
                var niz = ['Medicinska oprema','Medicinski aparati','Ortopedska pomagala','Ostalo'];
            }  
            if(oglasi === '19'){
                var niz = ['Ostalo'];
            }  
            if(oglasi === '20'){
                var niz = ['Stručna literatura','Književnost','Beletristika','Školske knjige','Strani jezici i rečnici','Enciklopedije','Časopisi','Stripovi','Ostalo'];
            }  

            var noviNiz = '';
            for(i=0;i<niz.length;i++){
                noviNiz += '<option value=" ' + niz[i] + ' ">' + niz[i] + '</option>'; 
            };

            string = '<select name="podkategorija">' + noviNiz + '</select>';
            document.getElementById('outputSubcategory').innerHTML = string; 
        }
    </script>

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
                <select name="kategorija" id="kategorija" onclick="random()">
                    <?php $result = categoryList(); foreach($result as $x):  ?>
                        <option value=<?php echo $x['kategorija_id']; ?> class="form-control"><?php echo $x['opis']; ?></option>
                    <?php endforeach; ?>
                </select><br><br>

                Podkategorija:<br>
                <div id="outputSubcategory">
                    <select name="podkategorija" id="">
                        <option value="Stambeni prostor">Stambeni prostor</option>
                        <option value="Poslovni prostor">Poslovni prostor</option>
                        <option value="Ostalo">Ostalo</option>
                    </select>
                </div><br><br>

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