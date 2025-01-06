<?php
include 'includes/connect_bd.php';
// error_reporting(0);
session_start();
$id= $_SESSION['id'];
// echo $id;
if(isset($_POST['save'] ) || isset($_POST['trimite']))
{   $values=array();
                       
     $buget=$_POST['buget'];
      $_SESSION['buget']=$buget;
       $values[]=$_POST['buget'];
                       
                       $checkin=$_POST['checkin'];
                       $_SESSION['checkin']=$checkin;
                       $values[]=$_POST['checkin'];

                       $checkout=$_POST['checkout'];
                       $_SESSION['checkout']=$checkout;
                       $values[]=$_POST['checkout'];
                       
                       $nr_pers=$_POST['nr_persoane'];
                       $_SESSION['nr_pers']=$nr_pers;

                       // $nr_zile=(($checkout->diff($checkin))->days)-1;
                       // $_SESSION['nr_zile']=$nr_zile;

                       $judet=$_POST['judete'];
                       $_SESSION['jud']=$judet; 
                       foreach($judet as $j)
                       {$values[]=$j;}

                    //    $nr_pers=$_POST['nr_persoane'];
                    //    $_SESSION['nr_per']=$nr_pers;
                       $values[]=$_POST['nr_persoane'];

                       $nr_cam=$_POST['nr_camere'];
                       $_SESSION['nr_cam']=$nr_cam;
                       $values[]=$_POST['nr_camere'];

                    //    $val_provizorie=1;

                       $data_curenta=date("Y-m-d");
                      
                      $mycheckin=date("Y-m-d",strtotime($checkin));
                   
                       $mycheckout=date("Y-m-d",strtotime($checkout));
                      
                       if ($mycheckin < $data_curenta) {
                           echo '<script>alert("Date incorecte!");</script>';
                       } elseif ($mycheckin> $mycheckout) {
                           echo '<script>alert("Date incorecte!");</script>';
                       } else {
                          
                           $stmt = $conn->prepare("INSERT INTO date_rezervare (data_check_in, data_check_out, nr_persoane, buget_pers, nr_camere,ut) 
                           VALUES (?, ?, ?, ?, ?, ? )");
                           $stmt->bind_param("ssiiii", $mycheckin, $mycheckout, $nr_pers, $buget, $nr_cam,$id);
                           $stmt->execute();
                       
                       }
}

if(isset($_POST['trimite']))
{
  header('location:preferinte_cazari.php');
}
include 'includes/meniu_log.php';
echo'


    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">Preferinte generale</h5>
            <div class="dropdown-divider">

            </div>
                        <form  id="formii" method="POST">
                                <div class="intrebare">
                                                
                                                <label class="intrb">Preferati un anumit buget?</label><br>
                                                <input type="number" id="buget" name="buget" min="100"  step="50" value="100">
                                                <br>
                                                <label >Data check-in</label>
                                                <br>
                                                <input type="date" id="checkin" name="checkin">
                                                <br>
                                                <label >Data check-out</label>
                                                <br>
                                                <input type="date" id="checkout"name="checkout">
                                                <br>
                                                <label class="intrb" >Preferati o anumita destinatie(judet)?</label><br>
                                                
                    
                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Prahova">
                                                <label for="Prahova">Prahova</label>
                                            
                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Brasov">
                                                <label for="Brasov">Brasov</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Constanta">
                                                <label for="Constanta">Constanta</label><br>
                                                
                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Alba_Iulia">
                                                <label for="Alba_Iulia">Alba Iulia</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Mures">
                                                <label for="Mures">Mures</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Arad">
                                                <label for="Arad">Arad</label><br>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Neamt">
                                                <label for="Neamt">Neamt</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Arges">
                                                <label for="Arges">Arges</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Dambovita">
                                                <label for="Dambovita">Dambovita</label><br>
                                                
                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Suceava">
                                                <label for="Suceava">Suceava</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Bucuresti">
                                                <label for="Bucuresti">Bucuresti</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Sibiu">
                                                <label for="Sibiu" >Sibiu</label><br>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Botosani">
                                                <label for="Botosani">Botosani</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Iasi">
                                                <label for="Iasi">Iasi</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Tulcea">
                                                <label for="Tulcea">Tulcea</label><br>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Severin">
                                                <label for="Severin">Severin</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Gorj">
                                                <label for="Gorj">Gorj</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Hunedoara">
                                                <label for="Hunedoara">Hunedoara</label><br>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Valcea">
                                                <label for="Valcea">Valcea</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Cluj">
                                                <label for="Cluj">Cluj</label>

                                                <input type="checkbox"  class="largerCheckbox" name="judete[]" value="Maramures">
                                                <label for="Maramures">Baia Mare</label><br>
                                </div>

                              
                                    <label class="intrb">Cate camere doriti?</label><br>
                                    <input type="number" id="nr_camere" name="nr_camere" min="1"  value="1">
                                    <br> <label class="intrb">Cate persoane calatoriti?</label><br>
                                    <input type="number" id="nr_persoane" name="nr_persoane" min="1"  value="1">
                                
                            <br>
                            <div class="butoane"> 
                                <input type="submit" class="btn btn-dark" name="save" id="butonel1" value="Save">
                                <input type="submit" class="btn btn-dark" name="trimite" id="butonel1" value="Trimite">
                               
                        </div>
                        </form> 
        </div>
    </div>
    </body>
    </html>';?>
<?php
include 'footer.php';
?>