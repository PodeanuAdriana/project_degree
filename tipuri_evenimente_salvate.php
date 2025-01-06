<?php
// include 'header.php';
include 'includes/connect_bd.php';
session_start();
$id=$_SESSION['id'];
$dat_rez_id=$_SESSION['id_dat_rez'];
$sql_select="SELECT * FROM evenimente_tipuri WHERE uti=$id  and dat_rez=$dat_rez_id ;";

$rezultat_dat=mysqli_query($conn,$sql_select);
if(mysqli_num_rows($rezultat_dat)>0)
{     
    while($row = mysqli_fetch_array($rezultat_dat)){
        $festival=$row['festival'];
        $concert=$row['concert'];
        $spectacol=$row['spectacol'];
        $teatru=$row['teatru'];
        $spectacol_pentru_copii=$row['spectacol_pentru_copii'];
        $uti=$row['uti'];
        $dat_rez=$row['dat_rez'];
    }
}
?>
    <!-- <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">Preferinte evenimente</h5>
            <div class="dropdown-divider"> -->

            </div>
                        <form action="#" id="formii" method="POST">
                            <label >Preferati un anumit tip de eveniment?</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="festival"<?php if($festival==1) echo "checked='checked'" ?>>
                                        <label for="festival">festival</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="concert" <?php if($concert==1) echo "checked='checked'" ?>>
                                        <label for="concert">concert</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="spectacol" <?php if($spectacol==1) echo "checked='checked'" ?>>
                                        <label for="spectacol">spectacol</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="teatru" <?php if($teatru==1) echo "checked='checked'" ?>>
                                        <label for="teatru">teatru</label><br>
                                    <input type="checkbox"  class="largerCheckbox" name="tip_eve[]" value="spectacol_pentru_copiii" <?php if($spectacol_pentru_copii==1) echo "checked='checked'" ?>>
                                        <label for="spectacol_pentru_copiii">spectacol pentru copiii</label><br>
                                    </div>
                                    <div class="butoane">
                            <input type="submit" class="btn btn-outline-dark" name="save4" id="butonel1" value="Salveaza">
                        <input type="submit" class="btn btn-secondary" name="submit" id="butonel" value="Trmite">
                        
                        </div>
                        </form>
                        <!-- </div>
        </div> -->
 <?php
include 'footer.php';

?>