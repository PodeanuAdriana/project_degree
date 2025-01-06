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
<h3 class="titlulet" style="text-align:center;">Obiective selectate:</h3>
</div>
<table class="table">
<thead>
     <tr>
       <th class="coloana" scope="col">Obiectiv</th>
       <th class="coloana" scope="col">Tip Obiectiv</th>
       <th class="coloana" scope="col">Informatii</th>
       <th class="coloana" scope="col">Judet</th>
       <th class="coloana" scope="col">Localitate</th>
       <th class="coloana" scope="col">Strada</th>
       <th class="coloana" scope="col">Numar adresa</th>
       <th class="coloana" scope="col">Preferata</th>
     </tr>
   </thead>
   <tbody>
    <?php
if(isset($_POST['submit']))

  foreach($_SESSION['jud'] as $item )
  {     if(isset($_POST['obiective_tipuri'])){
            $obiectiv=$_POST['obiective_tipuri'];
    foreach($obiectiv as $obie)
    {
        $select_obiectiv="SELECT * From (
          SELECT o.denumire_obiectiv,o.tip_obiectiv,o.informatii,o.id_obiectiv, 
          a.judet, a.localitate, a.strada, a.nr_adresa 
          FROM obiective o 
          LEFT JOIN adrese a on o.adresa_obiectiv=a.id_adresa 
          where a.judet='$item') 
        as obie where tip_obiectiv='$obie';";
        
      $result_obiectiv=mysqli_query($conn,$select_obiectiv);
      foreach($result_obiectiv as $row)
      { $id_obiectiv=$row['id_obiectiv'];
       $obiectiv_denumire=$row['denumire_obiectiv'];
       $tip_obiectiv=$row['tip_obiectiv'];
       $informatii=$row['informatii'];
       $judet=$row['judet'];
       $localitate=$row['localitate'];
       $strada=$row['strada'];
       $nr_adresa=$row['nr_adresa'];
       echo' 
       <tr>
              <td>'.$obiectiv_denumire.'</td>
              <td>'.$tip_obiectiv.'</td>
              <td>'.$informatii.'</td>
              <td>'.$judet.'</td>
              <td>'.$localitate.'</td>
              '; if($strada==0 || $nr_adresa==0)
                    echo '<td>-</td>
                    <td>-</td>
                    <td><a href="wishlist.php?obiectiv_adaugat='.$id_obiectiv.'"><i class="fa fa-heart-o"></i></a>';
                    else echo'
              <td>'.$strada.'</td>
              <td>'.$nr_adresa.'</td>
              <td><a href="wishlist.php?obiectiv_adaugat='.$id_obiectiv.'"><i class="fa fa-heart-o"></i></a>
                 
            </tr> ';   
      }
      
      
    }
    }

  }
  echo'</tbody>
  </table>
      </div>';
include 'footer.php';
?>