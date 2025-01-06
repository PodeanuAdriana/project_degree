<?php
// include 'header.php';
include 'includes/connect_bd.php';
include 'includes/meniu_log.php';
// session_start();
//  echo $_SESSION['id'];
error_reporting(0);
include 'cautare.php';
echo'

<div class="container text-center">
      <div class="container_dest my-4">
        <h4  style="color:aliceblue;" >Destinatii turistice Romania</h4>
      </div>
    <div class="row my-4">
        <div class="col-4"> 
            <div id="carouselExampleIndicators" 
            class="carousel slide my-4" data-bs-ride="carousel">
            <h4  style="color:aliceblue;" >Brasov</h4>
            <div class="carousel-indicators">
                
                    <button type="button" data-bs-target="#carouselExampleIndicators" 
                    data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" 
                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                     data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="imagini/BRASOV/cetatuiaBrasov.jpg" class="d-block imag" alt="Cetatuia_Brasov">
                    
                    </div>
                    <div class="carousel-item">
                        <img src="imagini/BRASOV/biserica_neagra_Brasov.jpg" class="d-block imag " alt="Biserica Neagra Brasov">
                    </div>
                    <div class="carousel-item">
                    <img src="imagini/BRASOV/castelul_Bran.jpg" class="d-block imag" alt="Castelul Bran">
                    </div>
                
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        <!--carusel pe coloane -->
        <div id="carusel_coloana1" class="carousel slide my-5" data-bs-ride="carousel">
        <h4 style="color:aliceblue;">Sibiu</h4>        
        <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carusel_coloana1" 
                    data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" 
                    data-bs-target="#carusel_coloana1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button"
                     data-bs-target="#carusel_coloana1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="imagini/SIBIU/Biserica_Evanghelica.jpg" class="d-block imag" alt="Cetatuia_Brasov"> 
                    </div>
                    <div class="carousel-item">
                        <img src="imagini/SIBIU/Centrul_Vechi_Sibiu.jpg" class="d-block  imag" alt="Biserica Neagra Brasov">
                    </div>
                    <div class="carousel-item">
                    <img src="imagini/SIBIU/Casa_Intoarsa.jpeg" class="d-block  imag" alt="Castelul Bran">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carusel_coloana1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carusel_coloana1" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>



        </div>
        <div class="col-4">
            
            <div id="carusel" class="carousel slide my-4" data-bs-ride="carousel">
            <h4  style="color:aliceblue;" >Prahova</h4>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carusel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carusel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carusel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carusel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#carusel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <button type="button" data-bs-target="#carusel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagini/PRAHOVA/Castelul_Cantacuzino.jpg" class="d-block imag" alt="Castelul Cantacuzino">
                    
                </div>
                <div class="carousel-item">
                    <img src="imagini/PRAHOVA/Peles_Sinaia.jpg" class="d-block imag" alt="Castelul Peles">
                </div>
                <div class="carousel-item">
                    <img src="imagini/PRAHOVA/Busteni_Prahova.jpg" class="d-block  imag" alt="Vedere Busteni">
                </div>
                <div class="carousel-item">
                    <img src="imagini/PRAHOVA/Cascada_Urlatoarea_Prahova.jpg" class="d-block  imag" alt="Cascada Urlatoarea">
                </div>
                <div class="carousel-item">
                    <img src="imagini/PRAHOVA/lacul_Scropoasa.jpeg" class="d-block  imag" alt="Lacul Scropoasa">
                </div>
                <div class="carousel-item">
                    <img src="imagini/PRAHOVA/peles.jpeg" class="d-block  imag" alt="Castelul Peles">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carusel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carusel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- pe coloane imagini -->
            

            <div id="carusel_colo2" class="carousel slide my-5" data-bs-ride="carousel">
            <h4  style="color:aliceblue;" >Constanta</h4>
            <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carusel_colo2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carusel_colo2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carusel_colo2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="imagini/CONSTANTA/Cazinoul_Constanta.jpg" class="d-block imag" alt="Cetatuia_Brasov">
                    
                    </div>
                    <div class="carousel-item">
                        <img src="imagini/CONSTANTA/Cazinoul_Constanta1.jpg" class="d-block  imag" alt="Cazinoul Constanta">
                    </div>
                    <div class="carousel-item">
                    <img src="imagini/CONSTANTA/Delfinariu1.jpeg" class="d-block  imag" alt="Delfinariu">
                    </div>
                    <div class="carousel-item">
                    <img src="imagini/CONSTANTA/Mare.jpeg" class="d-block  imag" alt="Mare Neagra">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carusel_colo2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carusel_colo2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>





        </div>
        <div class="col-4">
            
            <div id="carusel3" class="carousel slide my-4" data-bs-ride="carousel">
            <h4  style="color:aliceblue;" >Bucuresti</h4>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carusel3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carusel3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carusel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagini/BUCURESTI/Bucuresti1.jpeg" class="d-block  imag" alt="Muzeu de arta">
                </div>
                <div class="carousel-item">
                    <img src="imagini/BUCURESTI/Bucuresti2.jpeg" class="d-block imag" alt="Raul Dambovita">
                </div>
                <div class="carousel-item">
                    <img src="imagini/BUCURESTI/Bucuresti3.jpeg" class="d-block  imag" alt="Parlament1">
                </div>
                <div class="carousel-item">
                    <img src="imagini/BUCURESTI/Bucuresti4.jpeg" class="d-block imag" alt="Parlament2">
                </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carusel3" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carusel3" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        <!-- imagini pe coloane -->
        <div id="carusel_coloana4" class="carousel slide my-5" data-bs-ride="carousel">
        <h4  style="color:aliceblue;" >Hunedoara</h4>
        <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carusel_coloana4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carusel_coloana4" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carusel_coloana4" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="imagini/HUNEDOARA/cetate1.jpeg" class="d-block imag  imag"alt="Cetatuia_Brasov">
                    
                    </div>

                    <div class="carousel-item">
                        <img src="imagini/HUNEDOARA/cetate2.jpeg" class="d-block  imag" alt="Biserica Neagra Brasov">
                    </div>
                    <div class="carousel-item">
                    <img src="imagini/HUNEDOARA/cetate3.jpeg" class="d-block  imag" alt="Castelul Bran">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carusel_coloana4" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carusel_coloana4" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>

    </div>

</div>
';
include 'footer.php'
?>