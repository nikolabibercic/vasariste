<div class="col 2">

</div>
<!-- Prikaz kartice pojedinacnog oglasa koja ima vise detalja i prikazuje full tekst oglasa -->
<div class="col-8"><br>
            <div class="card">    
                <div class="card-body">  
                    <!-- Ako je oglas aktivan pozadina zelena -->  
                    <?php 
                        if( $r['status_oglasa_id'] == '1' ):
                    ?>
                    <p class="text-success">ID oglasa: <?php echo $r['oglas_id'].", ".$r['status']; ?></p>
                    <?php endif; ?>  
                    <!-- Ako je oglas neaktivan pozadina crvena -->                 
                    <?php 
                            if( $r['status_oglasa_id'] == '2' ):
                    ?>
                    <p class="text-danger">ID oglasa: <?php echo $r['oglas_id'].", ".$r['status']; ?></p>
                    <?php endif; ?>  
                
                <h4 class="card-title">
                        <a href="add.view.php?oglas_id=<?php echo $r['oglas_id'] ?>" style="color:black">
                            <?php echo $r['naslov']; ?>
                        </a>
                        <a href="">
                            <?php
                                 if($r['tip_oglasa']=='Standardni oglas'){
                                     echo '<a href="info.add.type.php"><img src="whiteStar.png" alt="" width="30px" height="30px" class="float-right"></a>';
                                 }elseif($r['tip_oglasa']=='Istaknuti oglas'){
                                     echo '<a href="info.add.type.php"><img src="star.png" alt="" width="30px" height="30px" class="float-right"></a>';
                                 }elseif($r['tip_oglasa']=='Premium oglas'){
                                    echo '<a href="info.add.type.php"><img src="crown.png" alt="" width="40px" height="40px" class="float-right"></a>';
                                };               
                            ?>
                        </a>
                    </h4>                    
                    
                    <?php 
                    $result = addsImages($r['oglas_id']);

                    if($result){
                        echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">';
                        echo '<div class="carousel-inner" id="inner">';
 
                                   for($i=0;$i<sizeof($result);$i++){
                                        if($i==0){
                                            echo '<div class="carousel-item active">'; //ovde ima active ako je i==0
                                        }else{
                                            echo '<div class="carousel-item">'; 
                                        }                           
                                            echo '<img class="d-block w-100" src='.' " ' . $result[$i]['slika_path'] . ' " ' . 'alt="First slide" width="300px" height="300px">'; 
                                            echo '</div>';
                                };

                            echo '</div>';
                            echo    '<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">';
                            echo        '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
                            echo        '<span class="sr-only">Previous</span>';
                            echo    '</a>';
                            echo    '<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">';
                            echo        '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
                            echo        '<span class="sr-only">Next</span>';
                            echo    '</a>';
                            echo  '</div><br>';
                        }
                            ?>
               
                    <p class="card-text"><?php echo $r['tekst']; ?></p>
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
                    <!-- Ako je oglas aktivan pojavljuje se dugme deaktiviraj --> 
                    <?php 
                        if(isset($_SESSION['korisnik_id']) and $r['korisnik_id'] == $_SESSION['korisnik_id'] and $r['status_oglasa_id'] == '1' ):
                    ?>
                    <a href="deactivate.add.php?oglas_id=<?php echo $r['oglas_id'] ?>" class="btn btn-danger btn-sm float-right">Deaktiviraj oglas</a>
                    <?php endif; ?>
                    
                    <!-- Ako je oglas neaktivan pojavljuje se dugme aktiviraj --> 
                    <?php 
                        if(isset($_SESSION['korisnik_id']) and $r['korisnik_id'] == $_SESSION['korisnik_id'] and $r['status_oglasa_id'] == '2' ):
                    ?>
                    <a href="activate.add.php?oglas_id=<?php echo $r['oglas_id'] ?>" class="btn btn-success btn-sm float-right">Aktiviraj oglas</a>
                    <?php endif; ?>                      
                </div>
            </div>
</div>
<div class="col 2">
    
</div>