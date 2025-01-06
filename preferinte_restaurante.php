<?php
// include 'header.php';
// session_start();
// error_reporting(0);
include 'includes/connect_bd.php';
session_start();
//  $id= $_SESSION['id'];
if(isset($_POST['save2'] ) || isset($_POST['trimite2']))
{

        $id= $_SESSION['id'];


        $speci=$_POST['speci'];

        $_SESSION['speci']=$speci;

        $am=0;$as=0;$eu=0;$ge=0;$gr=0;$int=0;$it=0;$med=0;$ro=0;$sar=0;$sea=0;$stea=0;$grat=0;$ung=0;

        $sql="SELECT cod_rezervare, ut from date_rezervare WHERE ut=$id order by ut desc limit 1;";

        $rezultat_data=mysqli_query($conn,$sql);
        if(mysqli_num_rows($rezultat_data)>0)
        {
        while($row =mysqli_fetch_array($rezultat_data)){
            $dat_rez_id=$row['cod_rezervare'];}
        }

        foreach ($speci as $sp){
            switch($sp){
                case 'american': $am=1;
                    break;
                case 'asiatic':$as=1;
                    break;
                case 'european':$eu=1;
                    break;
                case 'german': $ge=1;
                    break;
                case 'grecesc': $gr=1;
                    break;
                case 'international': $int=1;
                    break;
                case 'italian': $it=1;
                    break;
                case 'mediteranean': $med=1;
                    break;
                case 'romanesc': $ro=1;
                    break;
                case 'sarbesc': $sar=1;
                    break;
                case 'seafood': $sea=1;
                    break;
                    case 'steakhouse': $stea=1;
                    break;
                case 'gratar': $grat=1;
                    break;
                case 'unguresc': $ung=1;
            }

        }
        $select_tip_speci="SELECT sp from specific_restaurant where utilizator=$id order by sp DESC LIMIT 1; ";
        $re=mysqli_query($conn,$select_tip_speci);
        while($r=mysqli_fetch_array($re)){
        $pref_rest=$r['sp'];
        }
        $serverName= "localhost";
        $userName= "root";
        $password= "";
        $dbname="planificare_calatorie";
        

    
     if(mysqli_connect_errno()){
        die("Conexiune nereusita! ".mysqli_connect_error());
        }
            

        $select_upd="SELECT * FROM specific_restaurant WHERE utilizator=$id ; ";

        $interogare=mysqli_query($conn,$select_upd) or die('Nu merge!');
        if(mysqli_num_rows($interogare)>0)
        { $intr = 0; 
            if (!empty($am) || !empty($as) || !empty($eu) || !empty($ge) || !empty($gr) || !empty($int) || !empty($it) || !empty($med) || !empty($ro) || !empty($sar) || !empty($sea) || !empty($stea) || !empty($grat) || !empty($ung)) {
                $sql = "UPDATE specific_restaurant 
                        SET american = ?, asiatic = ?, european = ?, german = ?, grecesc = ?, international = ?, italian = ?, mediteranean = ?, romanesc = ?, sarbesc = ?, seafood = ?, steakhouse = ?, gratar = ?, unguresc = ?
                        WHERE utilizator = ?";
                
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->bind_param("iiiiiiiiiiiiiii", $am, $as, $eu, $ge, $gr, $int, $it, $med, $ro, $sar, $sea, $stea, $grat, $ung, $id);
                    if ($stmt->execute()) {
                        $intr++;
                    } else {
                        die('Nu merge Update: ' . $stmt->error);
                    }
                    $stmt->close();
                } else {
                    die('Nu merge Update: ' . $conn->error);
                }
            
        
            }
        }
  
        
        
        $insert_pref_ob="INSERT INTO tipuri_obiective (religios, aventuros, lacuri, cascade_a, bai_termale, muzee,  istoric,  naturale, zoo, planetariu, acvariu_delfinariu,uti, datrez,speci_resta_pref) 
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
if(isset($_POST['trimite2']))
{
  header('location:preferinte_obiective.php');
}
include 'includes/meniu_log.php';
// class Stack {
//     private $elements = array();

//     public function push($value) {
//         $this->elements[] = $value;
//     }

//     public function getElements() {
//         return $this->elements;
//     }
// }
?>

<div class="card" style="width:20cm;">
                <div class="card-body">
                    <h5 class="card-title">Preferinte restaurante</h5>
                    <div class="dropdown-divider"></div>
                        <form action="#" id="formii" method="POST">
                            <div class="intrebare">
                                    <label >Specificul restaurantului </label><br>
                                
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="american">
                                        <label for="american">american</label>

                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="asiatic">
                                        <label for="asiatic">asiatic</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="bar">
                                        <label for="european">european</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="german">
                                        <label for="german">german</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="grecesc">
                                        <label for="grecesc">grecesc</label><br>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="international">
                                        <label for="international">international</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="italian">
                                        <label for="italian">italian</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="mediteranean">
                                        <label for="mediteranean">mediteranean</label>


                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="romanesc">
                                        <label for="romanesc">romanesc</label><br>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="sarbesc">
                                        <label for="sarbesc">sarbesc</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="seafood">
                                        <label for="seafood">seafood</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="steakhouse">
                                        <label for="steakhouse">gratar</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="unguresc">
                                        <label for="unguresc">unguresc</label><br>

                            </div>   
                            <div class="butoane">
                                <input type="submit" class="btn btn-dark" name="save2" id="butonel1" value="Salveaza">
                                <input type="submit" class="btn btn-dark" name="trimite2" id="butonel1" value="Trimite">
                        </div>
                        </form>
                        <?php
                        //   error_reporting(0);
                        //          $stack = new Stack(); 
                        // if(isset($_POST['save3']))
                        // {
                        //         $speci=$_POST['speci'];

                        //         $_SESSION['speci']=$speci;
                        //         $am=0;$as=0;$eu=0;$ge=0;$gr=0;$int=0;$it=0;$med=0;$ro=0;$sar=0;$sea=0;$grat=0;$ung=0;
                        //     $sql="SELECT cod_rezervare, ut from date_rezervare WHERE ut=$id order by ut desc limit 1;";

                        //     $rezultat_data=mysqli_query($conn,$sql);
                        //     if(mysqli_num_rows($rezultat_data)>0)
                        //     {
                        //         while($row =mysqli_fetch_array($rezultat_data)){
                        //             $dat_rez_id=$row['cod_rezervare'];}


                        //             foreach ($speci as $sp){
                        //                 switch($sp){
                        //                     case 'american': $am=1;
                        //                         break;
                        //                     case 'asiatic':$as=1;
                        //                         break;
                        //                     case 'european':$eu=1;
                        //                         break;
                        //                     case 'german': $ge=1;
                        //                         break;
                        //                     case 'grecesc': $gr=1;
                        //                         break;
                        //                     case 'international': $int=1;
                        //                         break;
                        //                     case 'italian': $it=1;
                        //                         break;
                        //                     case 'mediteranean': $med=1;
                        //                         break;
                        //                     case 'romanesc': $ro=1;
                        //                         break;
                        //                     case 'sarbesc': $sar=1;
                        //                         break;
                        //                     case 'seafood': $sea=1;
                        //                         break;
                        //                     case 'gratar': $grat=1;
                        //                         break;
                        //                     case 'unguresc': $ung=1;

                        //                 }
                        //             }
    
                        //     }
                        //     $values=array();
                        //         $speci=$_POST['speci'];

                        //         $_SESSION['speci']=$speci;
                        //         foreach($speci as $sp)
                        //         {
                        //             $values[]=$sp;
                        //         }
                        //         foreach ($values as $value) {
                        //             $stack->push($value);
                                
                        //         }

                        //     // echo "Stack contents: " . implode(", ", $stack->getElements()) . "\n";
                        //     $_SESSION['stiva3']=$stack;
                        
                        // }

                        ?>
                </div>
 </div>

<?php
include 'footer.php';
?>