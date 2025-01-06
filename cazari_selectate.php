<?php
include 'includes/connect_bd.php';
session_start();
// include 'includes/meniu_log.php';
$id=$_SESSION['id'];
$checkin=$_SESSION['checkin'];

$checkout=$_SESSION['checkout'];
// $id=$_SESSION['id'];

$buget=$_SESSION['buget'];

$numar_camere=$_SESSION['nr_cam'];
// $nr_pers=$_POST['nr_persoane'];
$nr_pers=$_SESSION['nr_pers'];
// echo $nr_pers;

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
<h3 class="titlulet" style="text-align:center;">Cazari selectate:</h3>
</div>



    <table class="table">
      
        <thead>
        
          <tr>
          <!-- <th class="coloana" scope="col">ID</th>  -->
             <th class="coloana" scope="col">Cazare</th>
            <th class="coloana" scope="col">Tip Cazare</th>
            <th class="coloana" scope="col">Telefon</th>
            <th class="coloana" scope="col">Email</th>
            <th class="coloana" scope="col">Site</th>
            <th class="coloana" scope="col">Judet</th>
            <th class="coloana" scope="col">Localitate</th>
            <th class="coloana" scope="col">Strada</th>
            <th class="coloana" scope="col">Numar</th>
            <!-- <th class="coloana" scope="col">Preferata</th>  -->
         </tr>
        </thead>
    <tbody>
        <?php
      //  echo $_SESSION['tip_cazari'];
//       foreach($_SESSION['jud'] as $item)
//         echo $item;

    
                $ap=0;$aph=0;$cab=0;$camp=0;$cav=0;$ct=0;$hs=0;$h=0;$mo=0;$pen=0;$re=0;$vi=0;
                $sql_sel="SELECT * from tipuri_cazari_pref WHERE uti=$id ;";
                $rez=mysqli_query($conn,$sql_sel);
                if(mysqli_num_rows($rez)>0)
                {
                        foreach($rez as $i){
                                $tip=$i['tip'];
                                $ap=$i['Apartament'];
                                $aph=$i['Aparthotel'];
                                $cab=$i['Cabana'];
                                $camp=$i['Camping'];
                                $cav=$i['Casa_de_vacanta'];
                                $ct=$i['Complex_turistic'];
                                $hs=$i['Hostel'];
                                $h=$i['Hotel'];
                                $mo=$i['Motel'];
                                $pen=$i['Pensiune'];
                                $re=$i['Resort'];
                                $vi=$i['Vila'];
                        }
                        $tipuri_cazari=array($ap,$aph,$cab,$camp,$cav,$ct,$hs,$h,$mo,$pen,$re,$vi);
                        if($ap==1)
                               {        $ap='Apartament';}
                        if($aph==1)
                        {       $aph='Aparthotel';}
                        if($cab==1)
                        {       $cab='Cabana';}                                
                        if($camp==1)
                        {       $camp='Camping';}
                        if($cav==1)
                        {       $cv='Casa_de_vacanta';}
                                                          
                        if($ct==1)
                        {$ct='Complex_turistic';}                                             
                        if($hs==1)
                        { $hs='Hostel';}
                                                                                
                        if($h==1)
                        {       $h='Hotel';}
                                                                                          
                        if($mo==1)
                        {         $mo='Motel';}
                                                                                                 
                        if($pen==1)
                        {         $pen='Pensiune';}
                                                                                                   
                        if($re==1)
                        {       $re='Resort';}
                                                                                                
                        if($vi==1)
                          {       $vi='Vila'; }
                          $tipuri_cazari=array($ap,$aph,$cab,$camp,$cav,$ct,$hs,$h,$mo,$pen,$re,$vi);
                                                        
             
                  }
        if(isset($_SESSION['jud'])){
            foreach($_SESSION['jud'] as $item)
                {
            foreach($tipuri_cazari as $tip){
          $select_cazare="SELECT * FROM  (SELECT  ca.id_cazare, ca.denumire_cazare, ca.tip_cazare, c.telefon, c.email, c.website, a.judet, a.localitate, a.strada, a.nr_adresa 
            FROM cazari ca LEFT JOIN contacte c  on ca.id_contact = c.id_contact  LEFT JOIN adrese a on ca.adresa_cazare = a.id_adresa 
            WHERE a.judet = '$item') 
          as cazari_disponibile 
          WHERE tip_cazare='$tip';";

        $sql="SELECT * FROM(SELECT * FROM 
                        (SELECT isti.cod_uti, isti.data_vizi, dat.data_check_in, dat.data_check_out from istoric isti
                        left join date_rezervare dat ON isti.data_vizi=dat.cod_rezervare) 
                as ultima  ORDER BY data_vizi desc limit 1 )AS alla WHERE cod_uti=$id ;";
                $result=mysqli_query($conn,$select_cazare);
                $rezultat=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)){







                foreach($result as $row)
                        {       $id_cazare=$row['id_cazare'];
                                $cazare_denumire=$row['denumire_cazare'];
                                $tip_cazare=$row['tip_cazare'];
                                $telefon=$row['telefon'];
                                $email=$row['email'];
                                $website=$row['website'];
                                $judet=$row['judet'];
                                $localitate=$row['localitate'];
                                $strada=$row['strada'];
                                $nr_adresa=$row['nr_adresa'];
                        
                        // error_reporting(0);
                        
                
                                foreach($rezultat as $r)
                                {
                                $checkin=$r['data_check_in'];
                                $checkout=$r['data_check_out'];
                        
                                echo'<tr>
                        <td><a href="camere_preturi.php?cazare_id='.$id_cazare.'&buget='.$buget.'&checkin='.$checkin.'&checkout='.$checkout.'&nr_camere='.$numar_camere.'&nr_persoa='.$nr_pers.'">'.$cazare_denumire.'</a></td>
                                ';}
                                echo'
                                
                                <td><a href="camere_preturi.php?cazare_id='.$id_cazare.'&buget='.$buget.'&checkin='.$checkin.'&checkout='.$checkout.'&nr_camere='.$numar_camere.'&nr_persoa='.$nr_pers.'">'.$cazare_denumire.'</a></td>
                                <td>'.$tip_cazare.'</td>
                                <td>'.$telefon.'</td>
                                <td>'.$email.'</td>
                                <td>'.$website.'</td>
                                <td>'.$judet.'</td>
                                <td>'.$localitate.'</td>';
                                if($strada==0 )
                                echo '<td>-</td>
                                <td>'.$nr_adresa.'</td>';
                                elseif( $nr_adresa==0)
                                echo'
                                <td>'.$strada.'</td>
                                <td>-</td>';
                              
                                echo'
                                <td>'.$strada.'</td>
                                <td>'.$nr_adresa.'</td>
                                
                        </tr> ';    
                        }
        }
}
}}

  echo'</tbody>
  </table>'; 
     echo' </div>';
  include 'footer.php';
?>
