<?php
// include 'header.php';
include 'includes/connect_bd.php';
include 'includes/meniu_log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="css/preferinte_selectate.css" rel="stylesheet"> 
   <title>Preferinte selectate</title>
</head>
  <div class="titluri">
  <h3 class="titlulet" style="text-align:center;">Camere selectate:</h3></div>
    <div class="container">

<?php
//session_start();
//$buget=$_SESSION['buget'];
if(isset($_GET['cazare_id']))
{   $ok=0;
    $buget=$_GET['buget'];
    $checkin=$_GET['checkin'];
    $_SESSION['in']=$checkin;
    $checkout=$_GET['checkout'];
    $_SESSION['out']=$checkout;
    $nr_camere=$_GET['nr_camere'];
    $_SESSION['camere_utilizator']=$nr_camere;
    $id_cazare=$_GET['cazare_id'];
    $_SESSION['cazare_sele']=$id_cazare;
    $nr_persoane=$_GET['nr_persoa'];
    //  echo $nr_persoane;
    
    $select_join="SELECT * FROM(SELECT c.id_cazare,c.denumire_cazare,c.tip_cazare,ca.cod_camera,ca.tip_camera,ca.nr_camere_disponibile,p.camera_pret
    FROM camere ca LEFT JOIN preturi p
    on ca.pret_camera=p.cod_pret
    LEFT JOIN cazari c 
    on ca.caza_cod=c.id_cazare) as cazari_preturi where id_cazare=$id_cazare and camera_pret<=$buget ;";
      $checkin = new DateTime($checkin);
      $checkout = new DateTime($checkout);
      $nr_zile=(($checkout->diff($checkin))->days)-1;

    //  echo $nr_zile;

    function  calcul_camera_pers($camera_pret,$nr_camere,$nr_zile){

              //  pret_camera * nr_zile  pt o persoana
              $pret_pers= $camera_pret * $nr_camere * $nr_zile ;
              //$pret_total=$pret_pers * $nr_persoane;
              return $pret_pers;
             
            }
            function  calcul_camera_total($camera_pret,$nr_camere,$nr_zile, $nr_persoane){

              //  pret_camera * nr_zile  pt o persoana
              $pret_pers= $camera_pret * $nr_camere * $nr_zile ;
              $pret_total=$pret_pers * $nr_persoane;
              return $pret_pers;
             
            }


    $result=mysqli_query($conn,$select_join);
    if(mysqli_num_rows($result)>0)
    {       echo '
        <table class="table">
    
         <thead>
        
             <tr>
        
            <th class="coloana" scope="col">Cazare</th>
            <th class="coloana" scope="col">Tip</th>
            <th class="coloana" scope="col">Camera</th>
            <th class="coloana" scope="col">Disponibile</th>
            <th class="coloana" scope="col">Pret/Pers/Noapte</th>
            <th class="coloana" scope="col">Total</th>
            <th class="coloana" scope="col">Rezerva</th>
        
            </thead>
            <tbody>';
        foreach( $result as $row)
        { 
          $cod_camera=$row['cod_camera'];
         $id_cazare=$row['id_cazare'];
            $denumire_cazare=$row['denumire_cazare'];
            $tip_cazare=$row['tip_cazare'];
            $tip_camera=$row['tip_camera'];
            $camere_disponibile=$row['nr_camere_disponibile'];
            $camera_pret=$row["camera_pret"];
            // echo $camera_pret;
          
            $pret_pers=calcul_camera_pers($camera_pret,$nr_camere,$nr_zile);
            $pret_total=calcul_camera_total($camera_pret,$nr_camere,$nr_zile, $nr_persoane);
            // $pret_calculat=calcul_camera();
            echo' <tr>
            
            <td>'.$denumire_cazare.'</td>
            <td>'.$tip_cazare.'</td>
            <td>'.$tip_camera.'</td>
            <td>'.$camere_disponibile.'</td>
            <td>'.$pret_pers.'</td>
            <td>'.$pret_total.'</td>
            <td><a href=rezerva.php?cod_camera='.$cod_camera.'&cod_cazare='.$id_cazare.'&camera_pret='.$camera_pret.'&pret_total='.$pret_total.'&nr_nopti='.$nr_zile.'><input type="submit" class="buttonbtn btn-dark" value="Rezerva"></a></td>
        </tr> ';
        }
   
    }else echo'<h3><center>Nu exista rezultate!</center></h3>';

  
}
?>
 </tbody>
  </table>
</div>
  </div>
    
<script>

</script>

<?php
include 'footer.php';
?>