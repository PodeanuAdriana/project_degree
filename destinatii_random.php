<?php
// error_reporting(0);
include 'includes/connect_bd.php';
session_start();
$id=$_SESSION['id'];
$dat_rez_id=$_SESSION['id_dat_rez'];
include 'includes/meniu_log.php';
// session_start();
// include 'header.php';
// class Stack {
//     private $elements = array();

//     public function push($value) {
//         $this->elements[] = $value;
//     }

//     public function getElements() {
//         return $this->elements;
//     }

//     public function pop() {
//         if ($this->isEmpty()) {
//             throw new Exception("Stack is empty");
//         }
//         return array_pop($this->elements);
//     }
  
//     public function isEmpty() {
//         return empty($this->elements);
//     }

    
// }

$apasat=0;
$judete=['1'=>'Prahova','2'=>'Brasov','3'=>'Alba Iulia','4'=>'Arad','5'=>'Arges',
'6'=>'Baia Mare','7'=>'Botosani','8'=>'Bucuresti','9'=>'Caras Severin','10'=>'Cluj',
'11'=>'Constanta','12'=>'Dambovita','13'=>'Gorj','14'=>'Hunedoara','15'=>'Iasi',
'16'=>'Maramures','17'=>'Mures','18'=>'Neamt','19'=>'Sibiu','20'=>'Suceava','21'=>'Tulcea','22'=>'Valcea'];
 for($i=1;$i<=22;$i++){
     $numar_ales= rand(1,22);
     $judet_ales=$judete[$numar_ales];
      
     }
     
     echo'<div class="card" style="width: 14rem;">
    
     <div class="card-body">
       <h5 class="card-title">Destinatie de vizitat</h5>
       <p class="card-text"></p>';
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
                                        echo'<img src="imagini/NEAMT/neamt.jpg" onclick="paginaincarcata("deltalii_destinatie.php") style="width:400px; height:450px"">';
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


    <form  action="" method="POST">
    <button type="submit" name="submit"class="btn btn-dark">Trimite</button>
    </form>
    <br>
 
     
  </div>
</div>
<br>
   <?php

//     function popAndAddToArray(Stack $stiva2, &$locuri_vizitate) {
//         try {
//             $elements = $stiva2->pop();
//             $locuri_vizitate[] = $elements;
//         } catch (Exception $e) {
//             echo "Error: " . $e->getMessage();
//         }
//     }

// foreach( $locuri_vizitate as $lcv)
//     echo $lcv;



//     }
// foreach( $obiective as $ob)
//          echo $ob;
    // $obiectiv= $stiva2->toArray();
//     $obiectiv= array();
// while ($this->isEmpty() === false) {
//     $obiectiv[] = $this->pop();
// }
    // echo "Stack contents: " . implode(", ", $stiva2->getElements()) . "\n";

if(isset($_POST['submit']))
  { echo'<div class="card" style="width: 40rem;">
    
     <div class="card-body">
        <h5 class="card-title" style="text-align:center;">Destinatie de vizitat</h5>
   <table class="table">
   <thead>
        <tr>
          <th class="coloana" scope="col">Obiectiv</th>
          <th class="coloana" scope="col">Tip</th>
          <th class="coloana" scope="col">Informatii</th>
          <th class="coloana" scope="col">Judet</th>
          <th class="coloana" scope="col">Localitate</th>
          <th class="coloana" scope="col">Strada</th>
          <th class="coloana" scope="col">Numar</th>
          
        </tr>
      </thead>
      <tbody>';
    $sql_tipuri_obi_salv="SELECT * FROM tipuri_obiective where uti=$id ";
    //am selectat ultima data rezervare si salvare a tipurilor de obiective preferate 
    $rez_tip_ob_slav=mysqli_query($conn,$sql_tipuri_obi_salv);
    
    // $tipuri_preferate=array($religios,$aventuros,$lacuri,$cascade,$bai_termale,$muzee,$istoric,$naturale,$zoo,$planetariu,$acvariu_delfinariu);
    if(mysqli_num_rows($rez_tip_ob_slav)>0)
      {
    foreach($rez_tip_ob_slav as $r)
    {
        $religios=$r['religios'];
        $aventuros=$r['aventuros'];
        $lacuri=$r['lacuri'];
        $cascade=$r['cascade_a'];
        $bai_termale=$r['bai_termale'];
        $muzee=$r['muzee'];
        $istoric=$r['istoric'];
        $naturale=$r['naturale'];
        $zoo=$r['zoo'];
        $planetariu=$r['planetariu'];
        $acvariu_delfinariu=$r['acvariu_delfinariu'];
        $uti=$r['uti'];
        $datrez=$r['datrez'];
    }
       if($religios==1)
       {
         $religios='religios'; 
       }
       if($aventuros==1)
       {
        $aventuros='aventuros';
       }
       if($lacuri==1)
       {
        $lacuri='lacuri';} 
       if($cascade==1)
       { 
        $cascade='cascade';}
       if($bai_termale==1)
       {$bai_termale='bai_termale';}
       if($muzee==1)
       {$muzee='muzee';}
       if($istoric==1)
       {
        $istoric='istoric';
       }
       if($naturale==1)
       {
        $naturale='naturale';}
        if($zoo==1)
        {
            $zoo='zoo';
        }
        if($planetariu==1)
        {
            $planetariu='planetariu';
        }
        if($acvariu_delfinariu==1)
        {
            $acvariu_delfinariu='acvariu/delfinariu';
        }
    
    
      }
     $tipuri_preferate=array($religios,$aventuros,$lacuri,$cascade,$bai_termale,$muzee,$istoric,$naturale,$zoo,$planetariu,$acvariu_delfinariu);

// foreach($tipuri_preferate as $ti)
//     echo $ti;




    foreach ($tipuri_preferate as $ti)
    {   

        $select_obiectiv=" SELECT o.denumire_obiectiv,o.tip_obiectiv,o.informatii,o.id_obiectiv, 
          a.judet, a.localitate, a.strada, a.nr_adresa 
          FROM obiective o 
          LEFT JOIN adrese a on o.adresa_obiectiv=a.id_adresa 
          where judet='$judet_ales' and tip_obiectiv='$ti';";



      $result_obiectiv=mysqli_query($conn,$select_obiectiv);
      if(mysqli_num_rows($result_obiectiv)>0){
        
      foreach($result_obiectiv as $row)
      { $id_obiectiv=$row['id_obiectiv'];
       $obiectiv_denumire=$row['denumire_obiectiv'];
       $tip_obiectiv=$row['tip_obiectiv'];
       $informatii=$row['informatii'];
       $judet=$row['judet'];
       $localitate=$row['localitate'];
       $strada=$row['strada'];
       $nr_adresa=$row['nr_adresa'];
         echo' 
       <tr>
              <td>'.$obiectiv_denumire.'</td>
              <td>'.$tip_obiectiv.'</td>
              <td>'.$informatii.'</td>
              <td>'.$judet.'</td>
              <td>'.$localitate.'</td>
              '; if($strada==0 || $nr_adresa==0)
                    echo '<td>-</td>  <td>-</td>';
                else
                    echo'<td>'.$strada.'</td>
                    <td>'.$nr_adresa.'</td>    
            </tr> ';   
      }
    }
}
    }
    // }
    // }

//   }
  echo'</tbody>
  </table>
      </div>';
include 'footer.php';
?>