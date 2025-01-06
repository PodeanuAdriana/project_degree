<?php
include 'header.php';

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
<h3 class="titlulet" style="text-align:center;">Restaurante selectate:</h3>
</div>
<table class="table">
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
       <th class="coloana" scope="col"> Preferata</th>
     </tr>
   </thead>
   <tbody>
    <?php
    if(isset($_POST['submit']))
    { 
    foreach($_SESSION['jud'] as $item )
    {
        if(isset($_POST['speci']))
        {
            $sp=$_POST['speci'];
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
               <td>'.$specificuri.'</td>
               <td>'.$evaluare.'</td>
               <td>'.$telefon.'</td>
               <td>'.$email.'</td>
               <td>'.$website.'</td>
               <td>'.$judet.'</td>
               <td>'.$localitate.'</td>';
               if($strada==0 || $nr_adresa==0)
                    echo '<td>-</td>
                    <td>-</td>
                    <td><a href="wishlist.php?obiectiv_adaugat='.$id_restaurant.'"><i class="fa fa-heart-o"></i></a>';
                    echo'
               <td>'.$strada.'</td>
               <td>'.$nr_adresa.'</td>
               <td><a href="wishlist.php?restaurant_adaugat='.$id_restaurant.'"><i class="fa fa-heart-o"></i></a>
             </tr> ';   
       }
    
    }}
  }
}
echo'</tbody>
</table>
    </div>';
include 'footer.php';
  ?>