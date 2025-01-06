<?php
// include 'header.php';
include 'includes/connect_bd.php';
session_start();
$id=$_SESSION['id'];
 $dat_rez_id=$_SESSION['id_dat_rez'];
//  echo $dat_rez_id;
$sql_select="SELECT * FROM tipuri_cazari_pref WHERE  uti=$id and dat=$dat_rez_id;";

$rezultat_dat=mysqli_query($conn,$sql_select);
if(mysqli_num_rows($rezultat_dat)>0)
{     
    while($row = mysqli_fetch_array($rezultat_dat)){
        $tip=$row['tip'];
        $Apartament=$row['Apartament'];
        $Aparthotel=$row['Aparthotel'];
        $Cabana=$row['Cabana'];
        $Camping=$row['Camping'];
        $Casa_de_vacanta=$row['Casa_de_vacanta'];
        $Complex_turistic=$row['Complex_turistic'];
        $Hostel=$row['Hostel'];
        $Hotel=$row['Hotel'];
        $Motel=$row['Motel'];
        $Pensiune=$row['Pensiune'];
        $Resort=$row['Resort'];
        $Vila=$row['Vila'];
        $util=$row['uti'];
        $dat=$row['dat'];
        // echo $Apartament;
    }
    }
    // echo $Apartament;
?>
<!-- 
<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h5 class="card-title">Preferinte cazari</h5>
    <div class="dropdown-divider"></div> -->
    <form action="#" id="formii" method="POST">
             
                <div class="intrebare">
                    <label class="intrb" >Tipul de cazare preferat: </label><br>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Apartament" <?php if($Apartament == 1) echo "checked='checked'";?>>
                    <label for="Apartament">Apartament</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Aparthotel" <?php  if ($Aparthotel ==1)
                     echo "checked='checked'"?>  >
                        <label for="Aparthotel">Aparthotel</label>
                    
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Cabana" <?php if($Cabana==1)  echo "checked='checked'";?> >
                        <label for="Cabana">Cabana</label>   <br>


                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Camping" <?php if($Camping==1)  echo "checked='checked'"?>>
                        <label for="Camping">Camping</label>

                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Casa de vacanta" <?php if($Casa_de_vacanta==1)  echo "checked='checked'"?>>
                        <label for="Casa de vacanta">Casa de vacanta</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Complex turistic" <?php if($Complex_turistic==1)  echo "checked='checked'"?>>
                        <label for="Complex turistic">Complex turistic</label>
                         <br>
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Hostel" <?php if($Hostel==1)  echo "checked='checked'"?>>
                        <label for="Hostel">Hostel</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Hotel" <?php if($Hotel==1)  echo "checked='checked'"?>>
                        <label for="Hotel">Hotel</label>

                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Motel" <?php if($Motel==1)  echo "checked='checked'"?>>
                        <label for="Motel">Motel</label>
                         <br>
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Pensiune" <?php if($Pensiune==1)  echo "checked='checked'"?> >
                        <label for="Pensiune">Pensiune</label>

                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Resort" <?php if($Resort==1)  echo "checked='checked'"?> >
                        <label for="Resort">Resort</label>
                
                    <input type="checkbox"  class="largerCheckbox" name="tipuri_cazari[]" value="Vila" <?php if($Vila==1)  echo "checked='checked'"?>>
                        <label for="Vila">Vila</label>
                        <br>
                        
                        
                </div>
                <br>
                <div class="butoane">
                    <input type="submit" class="btn btn-dark" name="save1" id="butonel1" value="Salveaza">
                    <input type="submit"name="submit" id="butonel" value="Trmite">
                    <!-- <button class="btn btn-outline-dark" name="next2" id="butonel" value="Urmatorul"><a href="cazari_selectate1.php">Urmatorul</a></button>
                        -->
                        <!-- //aici voi face inser in tabela ca sa salvez datele la aspasare save -->
                        </div>
                </form>

                <!-- </div>
</div> -->

<?php
include 'footer.php';

?>