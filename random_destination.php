<?php
include 'meniu_logat.php';
       // $nr_generat1= rand(1,124);
       // $cod_loc_vizizitat='';
        // fac select cu join intre tabela istoric si cazari cu adrese si le elimin pe cele asemanatoare
        //valoarea o iau cu cate un for si testez 
        //if($nr_generat1!=)
     $apasat=0;
     $judete=['1'=>'Prahova','2'=>'Brasov','3'=>'Alba Iulia','4'=>'Arad','5'=>'Arges',
     '6'=>'Baia Mare','7'=>'Botosani','8'=>'Bucuresti','9'=>'Caras Severin','10'=>'Cluj',
     '11'=>'Constanta','12'=>'Dambovita','13'=>'Gorj','14'=>'Hunedoara','15'=>'Iasi',
     '16'=>'Maramures','17'=>'Mures','18'=>'Neamt','19'=>'Sibiu','20'=>'Suceava','21'=>'Tulcea','22'=>'Valcea'];
      for($i=1;$i<=22;$i++){
          $numar_ales= rand(1,22);
          $judet_ales=$judete[$numar_ales];
           
          }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preferinte_calatorie.css">
    <title>Preferinte calator</title>
</head>
<body>
    <div class="container">
        <div class="card" style="width:20cm;">
            <div class="card-body">   
                
                <h5 class="card-title">Destinatii random</h5>
                    <?php
                        // if(!(isset($_POST['submit'])))
                        //     echo'<img src="imagini/locuri_random.gif" style="width: 400px; height 450px">';
                        
                        // else 
                        if(isset($_POST['submit']))
                            { 
                                 $apasat=1;
                        
                                
                                switch($judet_ales){
                                    case 'Prahova':
                                        echo'<img src="imagini/PRAHOVA/peles.jpeg" onclick="paginaincarcata("deltalii_destinatie.php")" style="width:400px; height:450px">';
                                        break;
                                    case 'Brasov':
                                        echo'<img src="imagini/BRASOV/biserica_neagra_Brasov.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Arges':
                                        echo'<img src="imagini/ARGES/manastirea_arges.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Alba Iulia':
                                        echo'<img src="imagini/ALBA IULIA/catedrala_incoronarii.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Arad' :
                                        echo'<img src="imagini/ARAD/gara_arad.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Baia Mare' :
                                        echo'<img src="imagini/BAIA MARE/centru_vechi.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Botosani':
                                        echo'<img src="imagini/BOTOSANI/piata_botosani.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Bucuresti':
                                        echo'<img src="imagini/BUCURESTI/Bucuresti3.jpeg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Caras Severin':
                                        echo'<img src="imagini/CARAS SEVERIN/complex_caras.jpeg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Cluj':
                                        echo'<img src="imagini/CLUJ/salina.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Constanta':
                                        echo'<img src="imagini/CONSTANTA/Cazinoul_Constanta1.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Dambovita':
                                        echo'<img src="imagini/DAMBOVITA/turnul_chindiei.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Gorj':
                                        echo'<img src="imagini/GORJ/muzeul_satului.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Hunedoara':
                                        echo'<img src="imagini/HUNEDOARA/cetate3.jpeg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Iasi':
                                        echo'<img src="imagini/IASI/palatul_culturii.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Maramures':
                                        echo'<img src="imagini/ARGES/manastirea_arges.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Mures':
                                        echo'<img src="imagini/MARAMURES/maramu.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Neamt':
                                        echo'<img src="imagini/NEAMT/neamt.jpg" onclick="paginaincarcata("deltalii_destinatie.php")style="width:400px; height:450px"">';
                                        break;
                                    case 'Sibiu':
                                        echo'<img src="imagini/SIBIU/astra2_sibiu.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Suceava':
                                        echo'<img src="imagini/SUCEAVA/suceava.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Tulcea':
                                        echo'<img src="imagini/TULCEA/Dunarea.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    case 'Valcea':
                                        echo'<img src="imagini/VALCEA/CASA.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
                                        break;
                                    default:
                                        echo'<img src="imagini/locuri_random.gif" style="width: 400px; height 450px">';
                                        break;
                                }
                               echo' <br>';
                                echo $judet_ales;
                         }
                        
                    ?>
                    
                
                    <form action="" id="formii" method="POST">
                
                <input type="submit" name="submit" id="butonel" value="Trmite">
                    </form>

 

    
               </div>
            </div>
    </div>
</body>
</html>