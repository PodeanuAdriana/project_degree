    <?php
    include 'meniu_logat.php';
//session_start();
error_reporting(0);
$serverName= "localhost";
$userName= "root";
$password= "";
$dbname="planificare_calatorie";

$conn=mysqli_connect($serverName,$userName,$password,$dbname);
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
<body>
  <div class="titluri">
    <h3 class="titlulet">Cazari selectate:</h3></div>
    <table class="table">
      
        <thead>
        
          <tr>
            
            <th class="coloana" scope="col">Denumire Cazare</th>
            <th class="coloana" scope="col">Tip Cazare</th>
            <th class="coloana" scope="col">Telefon</th>
            <th class="coloana" scope="col">Email</th>
            <th class="coloana" scope="col">Site</th>
            <th class="coloana" scope="col">Judet</th>
            <th class="coloana" scope="col">Localitate</th>
            <th class="coloana" scope="col">Strada</th>
            <th class="coloana" scope="col">Numar adresa</th>
          </tr>
        </thead>
    <tbody>
    <?php
    if(isset($_POST['submit']))
      { $judet=$_POST['judete'];
        $tipuri_cazari=$_POST['tipuri_cazari'];
      }
        foreach($judet as $item)
        {
          foreach($tipuri_cazari as $tip){
            $select_cazare="SELECT * FROM 
            (SELECT ca.denumire_cazare, ca.tip_cazare,
             c.telefon, c.email, c.website,
              a.judet, a.localitate, a.strada, a.nr_adresa 
              FROM cazari ca LEFT JOIN contacte c 
              on ca.id_contact = c.id_contact 
              LEFT JOIN adrese a on ca.adresa_cazare = a.id_adresa 
              WHERE a.judet = 'Prahova') 
            as cazari_disponibile 
            WHERE tip_cazare='$tip';";

        $result=mysqli_query($conn,$select_cazare);

   
        foreach($result as $row)
            {
                    $cazare_denumire=$row['denumire_cazare'];
                    $tip_cazare=$row['tip_cazare'];
                    $telefon=$row['telefon'];
                    $email=$row['email'];
                    $website=$row['website'];
                    $judet=$row['judet'];
                    $localitate=$row['localitate'];
                    $strada=$row['strada'];
                    $nr_adresa=$row['nr_adresa'];
                echo' <tr>
                  <td>'.$cazare_denumire.'</td>
                  <td>'.$tip_cazare.'</td>
                  <td>'.$telefon.'</td>
                  <td>'.$email.'</td>
                  <td>'.$website.'</td>
                  <td>'.$judet.'</td>
                  <td>'.$localitate.'</td>
                  <td>'.$strada.'</td>
                  <td>'.$nr_adresa.'</td>
                </tr> ';    
            }

    }}
    ?>
    </tbody>
  </table>



  <div class="titluri">
<h3 class="titlulet">Restaurante selectate:</h3></div>
<table class="table">
<thead>
     <tr>
       <th class="coloana" scope="col">Denumire Restaurant</th>
       <th class="coloana" scope="col">Tip Locatie</th>
       <th class="coloana" scope="col">Specific</th>
       <th class="coloana" scope="col">Evaluare</th>
       <th class="coloana" scope="col">Telefon</th>
       <th class="coloana" scope="col">Email</th>
       <th class="coloana" scope="col">Website</th>
       <th class="coloana" scope="col">Judet</th>
       <th class="coloana" scope="col">Localitate</th>
       <th class="coloana" scope="col">Strada</th>
       <th class="coloana" scope="col">Numar adresa</th>
       <th class="coloana" scope="col"> Preferata</th>
     </tr>
   </thead>
   <tbody>
  <?php
if(isset($_POST['submit']))
{  $judet=$_POST['judete'];
  $specificuri=$_POST['specificuri'];
}
foreach($judet as $item )
    {
      foreach($specificuri as $speci)
      {
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
              <td>'.$id_restaurant.'</td>
               <td>'.$restaurant_denumire.'</td>
               <td>'.$tip_locatie.'</td>
               <td>'.$specificuri.'</td>
               <td>'.$evaluare.'</td>
               <td>'.$telefon.'</td>
               <td>'.$email.'</td>
               <td>'.$website.'</td>
               <td>'.$judet.'</td>
               <td>'.$localitate.'</td>
               <td>'.$strada.'</td>
               <td>'.$nr_adresa.'</td>
               <td><a href="wishlist.php?restaurant_adaugat='.$id_restaurant.'"><i class="fa fa-heart-o"></i></a>
             </tr> ';   
       }
    }
  }
?>
</tbody>
</table>






<h3 class="titlulet">Obiective selctate:</h3>
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
     </tr>
   </thead>
   <tbody>
    <?php
if(isset($_POST['submit']))
{  $judet=$_POST['judete'];
    $obiective=$_POST['obiective_tipuri'];
  }
  foreach($judet as $item )
  {
    foreach($obiective as $obie)
    {
        $select_obiectiv="SELECT * From (
          SELECT o.denumire_obiectiv,o.tip_obiectiv,o.informatii, 
          a.judet, a.localitate, a.strada, a.nr_adresa 
          FROM obiective o 
          LEFT JOIN adrese a on o.adresa_obiectiv=a.id_adresa 
          where a.judet='$item') 
        as obie where tip_obiectiv='$obie';";
      $result_obiectiv=mysqli_query($conn,$select_obiectiv);
      foreach($result_obiectiv as $row)
      {
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
              <td>'.$strada.'</td>
              <td>'.$nr_adresa.'</td>
            </tr> ';   
      }
      
      
      
    }

  }
?>
</tbody>
</table>
    </div>
 </body>
 </html>