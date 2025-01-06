<?php
// include 'header.php';
// error_reporting(0);
session_start();
$id= $_SESSION['id'];
include 'includes/connect_bd.php';
// session_start();
//  $id= $_SESSION['id'];
if(isset($_POST['save4'] ) || isset($_POST['trimitere4']))
{

    $id= $_SESSION['id'];


    $tip_eveniment=$_POST['tip_eve'];
    //  $_SESSION['tip_eveniment']=$tip_eveniment;
    $fe=0;$co=0;$spe=0;$tea=0;$spcop=0;

    $sql="SELECT cod_rezervare, ut from date_rezervare WHERE ut=$id order by ut desc limit 1;";

    $rezultat_data=mysqli_query($conn,$sql);

    if(mysqli_num_rows($rezultat_data)>0)
    {
        while($row =mysqli_fetch_array($rezultat_data)){
            $dat_rez_id=$row['cod_rezervare'];}
        }
            foreach($tip_eveniment as $tip)
            {
                switch($tip)
                {
                    case 'festival': $fe=1;
                        break;
                    case 'concert' : $co=1;
                        break;
                    case 'spectacol': $spe=1;
                        break;
                    case 'teatru': $tea=1;
                        break;
                    case 'spectacol_pentru_copii':$spcop=1;
                        break;
                }
            }
            
        $serverName= "localhost";
        $userName= "root";
        $password= "";
        $dbname="planificare_calatorie";
        

    
    if(mysqli_connect_errno()){
        die("Conexiune nereusita! ".mysqli_connect_error());
    }
            
    
    $select_upd="SELECT * FROM evenimente_tipuri WHERE uti=$id ; ";
    $interogare=mysqli_query($conn,$select_upd) or die('Nu merge!');


    if(mysqli_num_rows($interogare)>0)
    {
        $intr=0; 
        if(!empty($fe) || !empty($co) || !empty($spe) || !empty($tea) || !empty($spcop))
        {
            $update="UPDATE evenimente_tipuri SET festival='".$fe."',concert='".$co."',spectacol='".$spe."',teatru='".$tea."', spectacol_pentru_copii='".$spcop."'";
            mysqli_query($conn,$update) or die('Nu merge Update!');
            $intr++;
        }
    }



}

if(isset($_POST['trimitere4']))
{
  header('location:cazari_selectate.php');
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
    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">Preferinte evenimente</h5>
            <div class="dropdown-divider">

            </div>
                        <form action="#" id="formii" method="POST">
                            <label >Preferati un anumit tip de eveniment?</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="festival">
                                        <label for="festival">festival</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="concert">
                                        <label for="concert">concert</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="spectacol">
                                        <label for="spectacol">spectacol</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="teatru">
                                        <label for="teatru">teatru</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="spectacol_pentru_copiii">
                                        <label for="spectacol_pentru_copiii">spectacol pentru copiii</label><br>
                                    </div>
                                    <div class="butoane">
                            <input type="submit" class="btn btn-outline-dark" name="save4" id="butonel1" value="Salveaza">
                        <input type="submit" class="btn btn-secondary" name="trimitere4" id="butonel" value="Trmite">
                        
                        </div>
                        </form>
                        <?php
                        //   error_reporting(0);
                        //   $stack = new Stack(); 
                        //     if(isset($_POST['save4']))
                        //     {      // $values=array();
                              


                        //     //  foreach($tip_eveniment as $ti)
                        //     //  {
                        //     //      $values[]=$ti;
                        //     //  }
                        //     //  foreach ($values as $value) {
                        //     //      $stack->push($value);
                             
                        //     //  }
                        //   }
                        //   echo "Stack contents: " . implode(", ", $stack->getElements()) . "\n";
                        // $_SESSION['stiva4']=$stack;
              ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
                                                