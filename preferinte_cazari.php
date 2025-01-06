<?php
 session_start();
include 'includes/connect_bd.php';
// $id= $_SESSION['id'];
if(isset($_POST['save1'] ) || isset($_POST['trimite1'])){

    $judet=$_SESSION['jud'];
    // foreach ($judet as $j)
    //  echo $j;
     $id= $_SESSION['id'];
   $tip_cazare=$_POST['tipuri_cazari'];
   $_SESSION['tip_cazari']=$tip_cazare;
   $buget=$_SESSION['buget'];
   $checkin=$_SESSION['checkin'];
   $checkout=$_SESSION['checkout'];
   $numar_camere=$_SESSION['nr_cam'];



    $ap=0;$aph=0;$cab=0;$camp=0;$cav=0;$ct=0;$hs=0;$h=0;$mo=0;$pen=0;$re=0;$vi=0;

  $sql="SELECT cod_rezervare, ut from date_rezervare WHERE ut=$id order by ut desc limit 1;";

  $rezultat_data=mysqli_query($conn,$sql);
  while($row =mysqli_fetch_array($rezultat_data)){
    $dat_rez_id=$row['cod_rezervare'];
$_SESSION['id_dat_rez']=$dat_rez_id;
// echo $_SESSION['id_dat_rez'];
}
// $_SESSION['tip_cazari']=$tip_cazare;
foreach($tip_cazare as $i)
{
switch($i){
    case 'Apartament': $ap=1;
   
            break;
    case 'Aparthotel': $aph=1;
            break;
    case 'Cabana': $cab=1;
            break;
    case 'Camping':$camp=1;
            break;
    case 'Casa de vacanta':$cav=1;
            break;
    case 'Complex turistic':$ct=1;
            break;
    case 'Hostel': $hs=1;
            break;
    case 'Hotel':$h=1;
            break;
    case 'Motel':$mo=1;
            break;
    case 'Pensiune':$pen=1;
            break;
    case 'Resort':$re=1;
            break;
    case 'Vila':$vi=1;
            break;

        }
    }
  
    // echo $dat_rez_id;
    // echo $id;


    $stmt ="INSERT INTO tipuri_cazari_pref (Apartament, Aparthotel, Cabana, Camping, Casa_de_vacanta, Complex_turistic, Hostel, Hotel, Motel, Pensiune, Resort, Vila, uti, dat) 
    VALUES ($ap, $aph, $cab, $camp, $cav, $ct, $hs, $h, $mo, $pen, $re, $vi, $id,$dat_rez_id)";

    $select_tip_pref_caz="SELECT tip from tipuri_cazari_pref where uti=$id order by uti desc limit 1;";
    $re=mysqli_query($conn,$select_tip_pref_caz);
    while($r=mysqli_fetch_array($re)){
    $tip_pref_caz=$r['tip'];
    }





 if ($conn->query($stmt) === TRUE) {
           
            // echo 'reusit';
        
} else {
    echo "Error: " . $conn->error;
}

$insert_pref_rest="INSERT INTO specific_restaurant (american, asiatic, european,
                                                     german,grecesc,international,
                                                     italian, mediteranean,romanesc,
                                                     sarbesc,seafood,steakhouse,gratar,unguresc,
                                                     utilizator,dat_rez,tip_caz_pref)
  VALUES (0,0, 0,0, 0,0, 0,0, 0,0, 0,0 ,0,0, '$id','$dat_rez_id','$tip_pref_caz');";
    


            if ($conn->query($insert_pref_rest) === TRUE) {
            
                    // echo 'reusit';
            
            } else {
                    echo "Error: " . $conn->error;
            }






    $select_tip_speci="SELECT sp from specific_restaurant where utilizator=$id order by utilizator desc limit 1; ";
    $re=mysqli_query($conn,$select_tip_speci);
    while($r=mysqli_fetch_array($re)){
    $pref_rest=$r['sp'];
    }


$insert_pref_ob="INSERT INTO tipuri_obiective (religios, aventuros, lacuri, cascade_a, bai_termale, muzee,
                                               istoric,  naturale, zoo, planetariu, acvariu_delfinariu,uti,
                                               datrez,speci_resta_pref) 
                VALUES (0,0, 0,0 ,0,0, 0,0 ,0,0, 0, $id,$dat_rez_id,$pref_rest)";

    

            if ($conn->query($insert_pref_ob) === TRUE) {
                    
                    // echo 'reusit';
            
            } else {
                    echo "Error: " . $conn->error;
            }

    $select_ob_pref="SELECT id_ob_tip from tipuri_obiective where uti=$id order by uti desc limit 1;";
    $recuperare=mysqli_query($conn,$select_ob_pref);
    while($rt=mysqli_fetch_array($recuperare)){
    $ob_pref=$rt['id_ob_tip'];
    }

$insert_pref_eve="INSERT INTO evenimente_tipuri (festival,concert,spectacol,teatru,spectacol_pentru_copii,uti,dat_rez,ob_pref) VALUES (0,0,0,0,0,$id,$dat_rez_id,$ob_pref);";
    

            if ($conn->query($insert_pref_eve) === TRUE) {
                    
                    // echo 'reusit';
            
                    } else {
                            echo "Error: " . $conn->error;




}
}
if(isset($_POST['trimite1']))
{
  header('location:preferinte_restaurante.php');
}
include 'includes/meniu_log.php';
class Stack {
    private $elements = array();

    public function push($value) {
        $this->elements[] = $value;
    }

    public function getElements() {
        return $this->elements;
    }
}


?>

<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">Preferinte cazari</h5>
    <div class="dropdown-divider"></div>
    <form action="#" id="formii" method="POST">
             
                <div class="intrebare">
                    <label class="intrb" >Tipul de cazare preferat: </label><br>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Apartament" >
                    <label for="Apartament">Apartament</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Aparthotel">
                        <label for="Aparthotel">Aparthotel</label>
                    
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Cabana">
                        <label for="Cabana">Cabana</label>   <br>


                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Camping">
                        <label for="Camping">Camping</label>

                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Casa de vacanta">
                        <label for="Casa de vacanta">Casa de vacanta</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Complex turistic">
                        <label for="Complex turistic">Complex turistic</label>
                         <br>
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Hostel">
                        <label for="Hostel">Hostel</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Hotel">
                        <label for="Hotel">Hotel</label>

                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Motel">
                        <label for="Motel">Motel</label>
                         <br>
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Pensiune">
                        <label for="Pensiune">Pensiune</label>

                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Resort">
                        <label for="Resort">Resort</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Vila">
                        <label for="Vila">Vila</label>
                        <br>
                        
                        
                </div>
                <br>
                <div class="butoane">
                    <input type="submit" class="btn btn-dark" name="save1" id="save1" value="Salveaza">
                    <input type="submit" class="btn btn-dark" name="trimite1" id="butonel1" value="Trimite">
             
              
                        </div>
                </form>
                <?php
   

                ?>
  </div>
</div>
<?php
include 'footer.php';
?>
