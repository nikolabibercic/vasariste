<div class="col-3">

</div>
<div class="col-6"><br>
            <div class="card">        
                <div class="card-body">
                <p class="">ID oglasa: <?php echo $r['oglas_id']; ?></p>
                <h4 class="card-title">
                        <a href="add.view.php?oglas_id=<?php echo $r['oglas_id'] ?>">
                            <?php echo $r['naslov']; ?>
                        </a>
                        <a href="">
                            <?php
                                 if($r['tip_oglasa']=='Standardni oglas'){
                                     echo '<img src="whiteStar.png" alt="" width="30px" height="30px" class="float-right">';
                                 }elseif($r['tip_oglasa']=='Istaknuti oglas'){
                                     echo '<img src="star.png" alt="" width="30px" height="30px" class="float-right">';
                                 }elseif($r['tip_oglasa']=='Premium oglas'){
                                    echo '<img src="crown.png" alt="" width="40px" height="40px" class="float-right">';
                                };               
                            ?>
                        </a>
                    </h4>                   
                    <div class="text-center">
            <!--        <ul class="list-group list-group-horizontal-xl">  -->
                            <?php 
                                $result = addsImages($r['oglas_id']);
                             //   foreach($result as $x){
                             //       $slika = $x['slika_path'];
                                if(count($result)>0){
                                    $slika = $result[0]['slika_path'];
                                    //    echo '<li class="list-group-item"> ';
                                    echo '<img src='.' " ' . $slika . ' " ' . ' class = "img-thumbnail" alt="" width="200px" height="200px">';
                                    //    echo '</li>';
                                }

                            //    };  
                            ?> 
               <!--      </ul><br> -->
                    </div><br>

                    <p class="card-text"><b><?php echo substr($r['tekst'],0,100); ?></b><a href="add.view.php?oglas_id=<?php echo $r['oglas_id'] ?>"><?php if(strlen($r['tekst'])>99) echo "......"; ?></a></p>
                    <p class="card-text">Email: <?php echo $r['email']; ?></p>
                    <?php
                        if(strlen($r['telefon'])>1){
                            echo '<p class="card-text">Telefon: '.$r['telefon'].'</p>';
                        };
                    ?>
                    <p class="card-text">Mesto: <?php echo $r['drzava'].', '.$r['grad']; ?></p>
                    <p class="card-text">Datum objave:<br> <?php echo $r['datum_objave']; ?></p>
                    <a href="#" class="btn btn-secondary btn-sm float-left"><?php echo $r['cena'].' '.$r['valuta']; ?></a>
                    <a href="category.adds.view.php?kategorija_id=<?php echo $r['kategorija_id']; ?>" class="btn btn-primary btn-sm float-right"><?php echo $r['kategorija']; ?></a>
                    <?php 
                    /* Ako je oglas od korisnika onda se pojavljuje dugme brisi ako nije onda se ne pojavljuje */
                        if(isset($_SESSION['korisnik_id']) and $r['korisnik_id'] == $_SESSION['korisnik_id'] ):
                    ?>
                    <a href="delete.add.php?oglas_id=<?php echo $r['oglas_id'] ?>" class="btn btn-danger btn-sm float-right">Obriši oglas</a>
                    <?php endif; ?>                   
                </div>
            </div>
</div>
<div class="col-3">

</div>