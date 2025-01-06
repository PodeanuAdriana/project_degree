<?php
// include 'header.php';
include 'includes/connect_bd.php';
session_start();
// include 'includes/meniu_log.php';
$id=$_SESSION['id'];
// echo $id;
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
<h3 class="titlulet" style="text-align:center;">Evenimente selectate:</h3>
</div>
<table class="table">
      
      <thead>
      
        <tr>
          
          <th class="coloana" scope="col">Denumire </th>
          <th class="coloana" scope="col">Tip Eveniment</th>
          <th class="coloana" scope="col">Data eveniment incepere</th>
          <th class="coloana" scope="col">Judet</th>
          <th class="coloana" scope="col">Localitate</th>
          <th class="coloana" scope="col">Strada</th>
          <th class="coloana" scope="col">Numar adresa</th>
     
        </tr>
      </thead>
  <tbody>
  <?php
 
    $fe=0;$con=0;$spe=0;$tea=0;$spcop=0;
    $sql_eve="SELECT * FROM evenimente_tipuri WHERE uti=$id ORDER BY eve_tip_id LIMIT 1;";
    $rez=mysqli_query($conn,$sql_eve);
    if(mysqli_num_rows($rez)>0){
      foreach($rez as $j)
      {
        $fe=$j['festival'];
        $con=$j['concert'];
        $spe=$j['spectacol'];
        $tea=$j['teatru'];
        $spcop=$j['spectacol_pentru_copii'];
      }
      $tip_eve=array($fe,$con,$spe,$tea,$spcop);
      if($fe==1)
      {
        $fe='festival';
      }
      if($con==1)
      {
        $con='concert';
      }
      if($spe==1)
      {
        $spe='spectacol';
      }
      if($tea==1)
      {
        $tea='teatru';
      }
      if($spcop==1)
      {
        $spcop='spectacol_pentru_copii';
      }
      $eve=array($fe,$con,$spe,$tea,$spcop);
    }

    if(isset($_SESSION['jud'])){
    foreach($_SESSION['jud']  as $item)
    {
       
      foreach($eve as $tip_eveniment){

        $select_eveniment="SELECT * FROM (SELECT eve.id_eveniment,eve.denumire_eveniment, eve.tip_eveniment,eve.inceput_eveniment,
         eve.durata_eveniment, a.judet,a.localitate,a.strada,a.nr_adresa from evenimente eve left join adrese a ON
         eve.adresa_eve = a.id_adresa where a.judet='$item') as eveniment_judet 
         where tip_eveniment='$tip_eveniment';";

    $result=mysqli_query($conn,$select_eveniment);


    foreach($result as $row)
        {       $id_eveniment=$row['id_eveniment'];
                $cazare_denumire=$row['denumire_eveniment'];
                $tip_eveniment=$row['tip_eveniment'];
                $inceput_data=$row['inceput_eveniment'];
                $nr_zile=$row['durata_eveniment'];
                $judet=$row['judet'];
                $localitate=$row['localitate'];
                $strada=$row['strada'];
                $nr_adresa=$row['nr_adresa'];
            echo' <tr>
              <td>'.$cazare_denumire.'</td>
              <td>'.$tip_eveniment.'</td>
              <td>'.$inceput_data.'</td>
              <td>'.$judet.'</td>
              <td>'.$localitate.'</td>';
              
              if( $nr_adresa==0 || $strada==0)
               echo'
              <td>-</td>
              <td>-</td>';
              else    echo'
              <td>'.$strada.'</td>
              <td>'.$nr_adresa.'</td>
            </tr> ';    
        }

}}}
echo'</tbody>
</table>
    </div>';
include 'footer.php';
?>