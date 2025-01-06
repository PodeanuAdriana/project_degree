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
   <style>
    .heart-button {
            background: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            font-size: 50px;
            color: #333;
        }
        .heart-button .fa {
            font-size: 50px;
        }
        .heart-button.active .fa {
            color: royalblue;
        }
    </style>
   <title>Preferinte selectate</title>
</head>
<div class="titluri">
<h3 class="titlulet" style="text-align:center;">Restaurante selectate:</h3>
</div>

<table class="table" style="text-align:center;">
<thead>
     <tr>
       <th class="coloana" scope="col">Restaurant</th>
       <th class="coloana" scope="col">Tip Locatie</th>
       <th class="coloana" scope="col">Specific</th>
       <th class="coloana" scope="col">Evaluare</th>
       <th class="coloana" scope="col">Telefon</th>
       <th class="coloana" scope="col">Email</th>
       <th class="coloana" scope="col">Website</th>
       <th class="coloana" scope="col">Judet</th>
       <th class="coloana" scope="col">Localitate</th>
       <th class="coloana" scope="col">Strada</th>
       <th class="coloana" scope="col">Numar</th>
   
     </tr>
   </thead>
   <tbody>
    <?php        
        
      $am=0;$as=0;$eu=0;$ge=0;$gr=0;$int=0;$it=0;$med=0;$ro=0;$sar=0;$sea=0;$stea=0;$grat=0;$ung=0;
      $sql_sele="SELECT * FROM specific_restaurant where utilizator=$id;";
      $rez=mysqli_query($conn,$sql_sele);
      if(mysqli_num_rows($rez)>0)
      {
        foreach($rez as $i)
        {
          $am=$i['american'];
          $as=$i['asiatic'];
          $eu=$i['european'];
          $ge=$i['german'];
          $gr=$i['grecesc'];
          $int=$i['international'];
          $it=$i['italian'];
          $med=$i['mediteranean'];
          $ro=$i['romanesc'];
          $sar=$i['sarbesc'];
          $sea=$i['seafood'];
          $stea=$i['steakhouse'];
          $grat=$i['gratar'];
          $ung=$i['unguresc'];
        }
         // fac array de caractere
         $carac_vector=array('american','asiatic','european','german','grecesc','international','italian','mediteranean','romanesc','sarbesc','seafood','steakhouse','gratar','unguresc');
         $sp=array($am,$as,$eu,$ge,$gr,$int,$it,$med,$ro,$sar,$sea,$stea,$grat,$ung);
                
                   if($am==1)
                    {
                      $am='american';
                    }
           if($as==1)
                {
                  $as='asiatic';
                }
         if($eu==1)
                  {
                    $eu='european';
                 
                  }
              if($ge==1)
                    {
                      $ge='german';
                      
                    }
                if($gr==1)
                      {
                        $gr='grecesc';
                     
                      }
               if($int==1)
                        {
                          $int='international';
                        
                        }
                      if($it==1)
                          {
                            $it='italian';
                      
                          }
                       if($med==1)
                            {
                              $med='meditearanean';
                           
                            }
                         if($ro==1)
                              {
                                $ro='romanesc';
                           
                              }
                           if($sar==1)
                                {
                                  $sar='sarbesc';
                                
                                }
                             if($sea==1)
                                  {
                                    $sea='seafood';
                                   
                                  }
                                  if($stea==1)
                                    {
                                      $stea='steakhouse';
                                     
                                    }
                                    if($grat==1)
                                      {
                                        $grat='gratar';
                                       
                                      }  
                                      if($ung==1)
                                        {
                                          $ung='unguresc';
                                        }
                                        $sp=array($am,$as,$eu,$ge,$gr,$int,$it,$med,$ro,$sea,$stea,$grat,$ung);   

                   }
                   
    if(isset($_SESSION['jud'])){
      foreach($_SESSION['jud'] as $item )
        {
            foreach($sp as $speci){
      $select_restaurant=" SELECT * FROM (
        SELECT  rest.id_restaurant,rest.denumire, rest.tip_locatie,rest.specificuri,rest.evaluare, 
      c.telefon,c.email,c.website,
       a.judet,a.localitate,a.strada,a.nr_adresa 
       FROM restaurante rest 
       LEFT JOIN contacte c on c.id_contact=rest.restaurant_contact
        Left join adrese a on a.id_adresa=rest.adresa_id
         WHERE a.judet='$item')
       as resta_speci WHERE specificuri='$speci';";

       $result_resta=mysqli_query($conn,$select_restaurant);

       foreach($result_resta as $row)
       {$id_restaurant=$row['id_restaurant'];
        $restaurant_denumire=$row['denumire'];
        $tip_locatie=$row['tip_locatie'];
        $specificuri=$row['specificuri'];
        $evaluare=$row['evaluare'];
        $telefon=$row['telefon'];
        $email=$row['email'];
        $website=$row['website'];
        $judet=$row['judet'];
        $localitate=$row['localitate'];
        $strada=$row['strada'];
        $nr_adresa=$row['nr_adresa'];
        echo' 
        <tr>
             
               <td>'.$restaurant_denumire.'</td>
               <td>'.$tip_locatie.'</td>
               <td>'.$specificuri.'</td>';
               if($evaluare==0){
               echo' <td>-</td>';
               }else
               echo'<td>'.$evaluare.'</td>';
               echo'
               <td>'.$telefon.'</td>
               <td>'.$email.'</td>
               <td>'.$website.'</td>
               <td>'.$judet.'</td>
               <td>'.$localitate.'</td>';
               if($strada==0 || $nr_adresa==0)
                    echo '<td>-</td>
                    <td>-</td>
                  ';
                else   echo'
               <td>'.$strada.'</td>
               <td>'.$nr_adresa.'</td>
              
             </tr> ';   
       }
      }
    }}
  

echo'
</tbody>
</table>
';?>
 <script src="script.js"></script>
 <?php echo'   </div>';
 
    // if(isset($_POST['variable'])){
    // // Primește valoarea din POST
    // $value = $_POST['variable'];
    // echo $value;
    // foreach( $value as $va)
    // // Salvează valoarea în sesiune
    //      { $val[]=$va;
    //     } echo $val;
    // $_SESSION['wishes'] = $val;
    //   }








include 'footer.php';
  ?>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.heart-button').on('click', function() {
        var heartButton = $(this);
        // var butonid=$(this).attr('id');
 
                heartButton.find('i').toggleClass('fa-heart-o fa-heart');
              
  
    });
}); -->

