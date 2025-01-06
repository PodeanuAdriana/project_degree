<?php
// include 'header.php';
include 'includes/connect_bd.php';
session_start();
$id=$_SESSION['id'];
$dat_rez_id=$_SESSION['id_dat_rez'];
$sql_select="SELECT * FROM specific_restaurant WHERE utilizator=$id  and dat_rez=$dat_rez_id ;";

$rezultat_dat=mysqli_query($conn,$sql_select);
if(mysqli_num_rows($rezultat_dat)>0)
{     
    while($row = mysqli_fetch_array($rezultat_dat)){
            $tip=$row['sp'];
            $american=$row['american'];
            $asiatic=$row['asiatic'];
            $european=$row['european'];
            $german=$row['german'];
            $grecesc=$row['grecesc'];
            $international=$row['international'];
            $italian=$row['italian'];
            $mediteranean=$row['mediteranean'];
            $romanesc=$row['romanesc'];
            $sarbesc=$row['sarbesc'];
            $seafood=$row['seafood'];
            $steakhouse=$row['steakhouse'];
            $gratar=$row['gratar'];
            $unguresc=$row['unguresc'];
            $utilizator=$row['utilizator'];
            $data_rez=$row['dat_rez'];
    }
}

    ?>
<!-- <div class="card" style="width:20cm;">
                <div class="card-body">
                    <h5 class="card-title">Preferinte restaurante</h5>
                    <div class="dropdown-divider"></div> -->
                        <form action="#" id="formii" method="POST">
                            <div class="intrebare">
                                    <label >Specificul restaurantului </label><br>
                                
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="american" <?php if($american ==1) echo "checked='checked'"?> >
                                        <label for="american">american</label>

                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="asiatic" <?php if($asiatic ==1) echo "checked='checked'"?>>
                                        <label for="asiatic">asiatic</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="bar" <?php if($european ==1) echo "checked='checked'"?>>
                                        <label for="european">european</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="german" <?php if($german ==1) echo "checked='checked'"?>>
                                        <label for="german">german</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="grecesc" <?php if($grecesc ==1) echo "checked='checked'"?> >
                                        <label for="grecesc">grecesc</label><br>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="international" <?php if($international ==1) echo "checked='checked'"?>>
                                        <label for="international">international</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="italian" <?php if($italian ==1) echo "checked='checked'"?> >
                                        <label for="italian">italian</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="mediteranean" <?php if($mediteranean ==1) echo "checked='checked'"?> >
                                        <label for="mediteranean">mediteranean</label>


                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="romanesc" <?php if($romanesc ==1) echo "checked='checked'"?> >
                                        <label for="romanesc">romanesc</label><br>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="sarbesc" <?php if($sarbesc ==1) echo "checked='checked'"?>>
                                        <label for="sarbesc">sarbesc</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="seafood" <?php if($seafood ==1) echo "checked='checked'"?>>
                                        <label for="seafood">seafood</label>

                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="steakhouse" <?php if($steakhouse ==1) echo "checked='checked'"?> >
                                        <label for="steakhouse">gratar</label>
                                    
                                    <input type="checkbox"  class="largerCheckbox" name="speci[]" value="unguresc"<?php if($unguresc ==1) echo "checked='checked'"?> >
                                        <label for="unguresc">unguresc</label><br>

                            </div>   
                            <div class="butoane">
                                <input type="submit" class="btn btn-dark" name="save3" id="butonel1" value="Salveaza">
                                <input type="submit"name="submit" id="butonel" value="Trmite">
                        </div></form>
<!-- </div>           
       
</div> -->


<?php
include 'footer.php';

?>