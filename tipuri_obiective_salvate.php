<?php
// include 'header.php';
include 'includes/connect_bd.php';
session_start();
$id=$_SESSION['id'];
$dat_rez_id=$_SESSION['id_dat_rez'];
$sql_select="SELECT * FROM tipuri_obiective WHERE uti=$id  and datrez=$dat_rez_id ;";

$rezultat_dat=mysqli_query($conn,$sql_select);
if(mysqli_num_rows($rezultat_dat)>0)
{     
    while($row = mysqli_fetch_array($rezultat_dat)){
            $id_ob_tip=$row['id_ob_tip'];
            $religios=$row['religios'];
            $aventuros=$row['aventuros'];
            $lacuri=$row['lacuri'];
            $cascade=$row['cascade_a'];
            $bai_termale=$row['bai_termale'];
            $muzee=$row['muzee'];
            $istoric=$row['istoric'];
            $naturale=$row['naturale'];
            $zoo=$row['zoo'];
            $planetariu=$row['planetariu'];
            $acvariu_delfinariu=$row['acvariu_delfinariu'];
            $uti=$row['uti'];
            $datrez=$row['datrez'];

        }
    }
    
 ?>
 <!-- <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">Preferinte obiective</h5>
            <div class="dropdown-divider"> -->

            </div>
                    <form action="#" id="formii" method="POST">
                        <div class="intrebare">
                                <label >Care sunt tipurile de obiective preferate?</label><br>
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="religios"<?php if($religios==1) echo "checked='checked'";  ?>>
                            <label for="religios" >Obiectiv de tip religios</label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="aventuros" <?php if($aventuros==1) echo "checked='checked'";  ?>>
                            <label for="aventuros" >Obiective de tip drumetii</label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="lacuri" <?php if($lacuri==1) echo "checked='checked'";  ?>>
                            <label for="lacuri" >Obiective de tip lacuri</label><br>
        
                            <input type="checkbox"  class="largerCheckbox"name="obiective_tipuri[]" value="cascade" <?php if($cascade==1) echo "checked='checked'";  ?>>
                            <label for="cascade" >Obiectiv de tip cascade</label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="bai_termale" <?php if($bai_termale==1) echo "checked='checked'";  ?>>
                            <label for="bai_termale" >Obiective de tip balneoclimaterice </label><br>
        
                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="muzee" <?php if($muzee==1) echo "checked='checked'";  ?>>
                            <label for="muzee" name="muzee" >Obiective de tip muzee</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="istoric" <?php if($istoric==1) echo "checked='checked'";  ?>>
                            <label for="istoric" name="istoric" >Obiectiv de tip istoric</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="naturale" <?php if($naturale==1) echo "checked='checked'";  ?>>
                            <label for="naturale" name="naturale" >Obiective de tip natural</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="zoo" <?php if($zoo==1) echo "checked='checked'";  ?>>
                            <label for="zoo" name="zoo" >Obiective de tip gradini zoologice</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="planetariu" <?php if($planetariu==1) echo "checked='checked'";  ?>>
                            <label for="planetariu" name="obiective_tipuri[]" >Obiective de tip planetariu</label><br>

                            <input type="checkbox"  class="largerCheckbox" name="obiective_tipuri[]" value="acvariu_delfinariu" <?php if($acvariu_delfinariu==1) echo "checked='checked'";  ?>>
                            <label for="acvariu_delfinariu" name="acvariu_delfinariu" >Obiective de tip acvarii/delfinarii </label><br>

                        </div>  
                        <div class="butoane">
                            <input type="submit" class="btn btn-outline-dark" name="save2" id="butonel1" value="Salveaza">
                            <input type="submit"name="submit" id="butonel" value="Trmite">
                        </div>
<!-- </div></div> -->
        
<?php
include 'footer.php';

?>