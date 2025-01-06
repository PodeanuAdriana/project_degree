<?php
// include 'header.php';
session_start();
// $id= $_SESSION['id'];
// error_reporting(0);
include 'includes/connect_bd.php';

//  $id= $_SESSION['id'];
if(isset($_POST['save4'] ) || isset($_POST['trimite4']))
{

    $id= $_SESSION['id'];




    $obiective_tipuri=$_POST['obiective_tipuri'];
    $_SESSION['obiective_tipuri']=$obiective_tipuri;

    $re=0;$ave=0;$cas=0;$lac=0;$bai=0;$muz=0;$ist=0;$nat=0;$zoo=0;$pla=0;$acv=0;         

    $sql="SELECT cod_rezervare, ut from date_rezervare WHERE ut=$id order by ut desc limit 1;";

    $rezultat_data=mysqli_query($conn,$sql);
    if(mysqli_num_rows($rezultat_data)>0)
    {
    while($row =mysqli_fetch_array($rezultat_data)){
        $dat_rez_id=$row['cod_rezervare'];}
    }
    

            foreach( $obiective_tipuri as $ob)
        {
            switch($ob)
            {
                case 'religios': $re=1;
                    break;
                case 'aventuros':$ave=1;
                    break;
                case 'lacuri': $lac=1;
                    break;
                case 'cascade':$cas=1;
                    break;
                case 'bai_termale':$bai=1;
                    break;
                case 'muzee':$muz=1;
                    break;
                case 'istoric':$ist=1;
                    break;
                case 'naturale': $nat=1;
                    break;
                case 'zoo' : $zoo=1;
                    break;
                case 'planetariu': $pla=1;
                    break;
                case 'acvariu_delfinariu': $acv=1;
                    break;
            }
        }
 
        $select_tip_speci="SELECT id_ob_tip from tipuri_obiective where uti=$id order by id_ob_tip DESC LIMIT 1; ";

        $re=mysqli_query($conn,$select_tip_speci);
        
        while($r=mysqli_fetch_array($re)){
        
            $pref_ob=$r['id_ob_tip'];
        }

            $serverName= "localhost";
            $userName= "root";
            $password= "";
            $dbname="planificare_calatorie";
            
    
    
            if ($conn->connect_error) {
                die("Conexiunea a eșuat: " . $conn->connect_error);
            }
            
            // Extragerea valorilor din interogare anterioară
            $query = "SELECT * FROM tipuri_obiective WHERE uti=$id";
            $interogare = $conn->query($query);
            
            if (mysqli_num_rows($interogare) > 0) {
                $intr = 0; 
                if (!empty($re) || !empty($ave) || !empty($lac) || !empty($cas) || !empty($bai) || !empty($muz) || !empty($ist) || !empty($nat) || !empty($zoo) || !empty($pla) || !empty($acv)) {
                    $update_s = "UPDATE tipuri_obiective SET 
                        religios = ?, 
                        aventuros = ?, 
                        lacuri = ?, 
                        cascade_a = ?, 
                        bai_termale = ?, 
                        muzee = ?, 
                        istoric = ?, 
                        naturale = ?, 
                        zoo = ?, 
                        planetariu = ?, 
                        acvariu_delfinariu = ? 
                        WHERE uti = ?";
            
                    // Pregătește declarația
                    $stmt = $conn->prepare($update_s);
                    if ($stmt === false) {
                        die('Eroare la pregătirea interogării: ' . $conn->error);
                    }
            
                    // Leagă parametrii
                    $stmt->bind_param(
                        'iiiiiiiiiiii', 
                        $re, $ave, $lac, $cas, $bai, $muz, $ist, $nat, $zoo, $pla, $acv, $id
                    );
            
                    // Execută declarația
                    if ($stmt->execute()) {
                        echo "Înregistrarea a fost actualizată cu succes!";
                    } else {
                        echo "Eroare la actualizarea înregistrării: " . $stmt->error;
                    }
            
                    $stmt->close();
                    $intr++;
                }
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

if(isset($_POST['trimite4']))
{
  header('location:preferinte_evenimente.php');
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
            <h5 class="card-title">Preferinte obiective</h5>
            <div class="dropdown-divider">

            </div>
                    <form action="#" id="formii" method="POST">
                        <div class="intrebare">
                                <label >Care sunt tipurile de obiective preferate?</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="religios">
                            <label for="religios" >Obiectiv de tip religios</label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="aventuros">
                            <label for="aventuros" >Obiective de tip drumetii</label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="lacuri">
                            <label for="lacuri" >Obiective de tip lacuri</label><br>
        
                            <input type="checkbox"  class="largerCheckbox"name="obiective_tipuri[]" value="cascade">
                            <label for="cascade" >Obiectiv de tip cascade</label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="bai_termale">
                            <label for="bai_termale" >Obiective de tip balneoclimaterice </label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="muzee">
                            <label for="muzee" name="muzee" >Obiective de tip muzee</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="istoric">
                            <label for="istoric" name="istoric" >Obiectiv de tip istoric</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="naturale">
                            <label for="naturale" name="naturale" >Obiective de tip natural</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="zoo">
                            <label for="zoo" name="zoo" >Obiective de tip gradini zoologice</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="planetariu">
                            <label for="planetariu" name="obiective_tipuri[]" >Obiective de tip planetariu</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="acvariu_delfinariu">
                            <label for="acvariu_delfinariu" name="acvariu_delfinariu" >Obiective de tip acvarii/delfinarii </label><br>

                        </div>  
                        <div class="butoane">
                        <input type="submit" class="btn btn-dark" name="save4" id="butonel1" value="Salveaza">
                        <input type="submit" class="btn btn-dark" name="trimite4" id="butonel1" value="Trimite">
                        </div>
                    </form>
                    <?php
              
                ?>
        </div>
    </div>
<?php
include 'footer.php';
?>