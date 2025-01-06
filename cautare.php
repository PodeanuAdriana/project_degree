<?php
// session_start();
include 'connect_db.php';
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  
    <title>Document</title>
</head>
<body>
<div class="container my-5">
    <table class='table style="width:50cm"'><?php
      if(isset($_GET['cauta'])){ 
        $cauta=$_GET['cauta'];
        // echo $cauta;
        $validare=0;
        $sql=  'SELECT * FROM restaurante WHERE (denumire LIKE "%'.$cauta.'%") OR (specificuri LIKE "%'.$cauta.'%")';
        $rezultat=mysqli_query($conn,$sql);
        if($rezultat){
        if(mysqli_num_rows($rezultat))
          {  echo '<thead>
            <tr style="width:50cm">
            <th>Id</th>
            <th>Denumire</th>
            <th>Tip locatie</th>
            <th>specific</th>
            <th>evaluare</th>
            </tr>
            </thead>
            ';
            $row=mysqli_fetch_assoc($rezultat);
            echo '<tbody>
            <tr>
            <td>'.$row['id_restaurant'].'</td>
            <td>'.$row['denumire'].'</td>
            <td>'.$row['tip_locatie'].'</td>
            <td>'.$row['specificuri'].'</td>
            <td>'.$row['evaluare'].'</td>
            
            </tr>
            </tbody>';
          }else{ $validare++;
          } }
          $sql_sel='SELECT * FROM cazari WHERE (denumire_cazare LIKE "%'.$cauta.'%") OR (tip_cazare LIKE "%'.$cauta.'%")'; // de facut cu join 
          $re=mysqli_query($conn,$sql_sel);
          if($re){
            if(mysqli_num_rows($re))
            {
              echo '<thead>
              <tr>
              <th>Id</th>
              <th>Denumire</th>
              <th>Tip locatie</th>';
              $row=mysqli_fetch_assoc($re);
              echo '<tbody>
              <tr>
              <td>'.$row['id_cazare'].'</td>
              <td>'.$row['denumire_cazare'].'</td>
              <td>'.$row['tip_cazare'].'</td>
               </tr>
            </tbody>
              ';

            }
            else{ $validare++;
            } 
            
          }
          //cautare obiective 
          $sql_obie='SELECT * FROM obiective WHERE (denumire_obiectiv LIKE "%'.$cauta.'%") OR (tip_obiectiv LIKE "%'.$cauta.'%") OR (informatii LIKE "%'.$cauta.'%")';
          $rezu=mysqli_query($conn,$sql_obie);
          if($rezu){
            if(mysqli_num_rows($rezu))
            {
              echo'<thead>
              <tr>
              <th>Id</th>
              <th>Denumire</th>
              <th>Tip locatie</th>
              <th>Informatii</th>';
              $row=mysqli_fetch_assoc($rezu);
              echo '<tbody>
              <tr>
              <td>'.$row['id_obiectiv'].'</td>
              <td>'.$row['denumire_obiectiv'].'</td>
              <td>'.$row['tip_obiectiv'].'</td>
               <td>'.$row['informatii'].'</td>
               </tr>
            </tbody>
              ';
            }else{ $validare++;
            } 
          }
          // cautare evenimente
          $sql_eve='SELECT * FROM evenimente WHERE ( denumire_eveniment LIKE "%'.$cauta.'") OR (tip_eveniment LIKE "%'.$cauta.'%")';
          $rez=mysqli_query($conn,$sql_eve);
          if($rez){
            if(mysqli_num_rows($rez))
            {
              echo'<thead>
              <tr>
              <th>Id</th>
              <th>Denumire</th>
              <th>Tip eveniment</th>';
               $row=mysqli_fetch_assoc($rez);
               echo'
               <tbody>
               <tr>
               <td>'.$row['id_eveniment'].'</td>
               <td>'.$row['denumire_eveniment'].'</td>
               <td>'.$row['tip_eveniment'].'</td>';
 
            } else{ $validare++;
            } 
      }
      


      // pt afisare restaurant din judet


      $sql= 'SELECT rest.id_restaurant, rest.denumire, rest.tip_locatie, rest.specificuri, rest.evaluare, c.telefon, c.email, c.website, a.judet 
      FROM restaurante rest 
      LEFT JOIN contacte c ON c.id_contact = rest.restaurant_contact 
      LEFT JOIN adrese a ON a.id_adresa = rest.adresa_id 
      WHERE a.judet LIKE "%'.$cauta.'%"';
        $rezultat=mysqli_query($conn,$sql);
        if($rezultat){
        if(mysqli_num_rows($rezultat))
          {  echo '<thead>
            <tr>
             
            <th>Id</th>
            <th>Denumire</th>
            <th>Tip locatie</th>
            <th>specific</th>
            <th>evaluare</th>
            <th>telefon</th>
            <th>email</th>
            <th>website</th>
            <th>judet</th>
            </tr>
            </thead>
            ';
            $row=mysqli_fetch_assoc($rezultat);
            echo '<tbody>
            <tr>
            <td>'.$row['id_restaurant'].'</td>
            <td>'.$row['denumire'].'</td>
            <td>'.$row['tip_locatie'].'</td>
            <td>'.$row['specificuri'].'</td>
            <td>'.$row['evaluare'].'</td>
            <td>'.$row['telefon'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['website'].'</td>
            <td>'.$row['judet'].'</td>
            
            </tr>
            </tbody>';
          }else{ $validare++;
          } }

 


          $sql_sel='SELECT ca.id_cazare, ca.denumire_cazare, ca.tip_cazare, c.telefon, c.email, c.website, a.judet FROM cazari ca
          LEFT JOIN contacte c  on ca.id_contact = c.id_contact  
          LEFT JOIN adrese a on ca.adresa_cazare = a.id_adresa 
           WHERE a.judet LIKE "%'.$cauta.'%"'; 
          $re=mysqli_query($conn,$sql_sel);
          if($re){
            if(mysqli_num_rows($re))
            {
              echo '
 
              <thead>
              <tr>
              <th>Id</th>
              <th>Denumire</th>
              <th>Tip locatie</th>
              <th>telefon</th>
              <th>email</th>
              <th>website</th>
              <th>judet</th>';
              $row=mysqli_fetch_assoc($re);
              echo '<tbody>
              <tr>
              <td>'.$row['id_cazare'].'</td>
              <td>'.$row['denumire_cazare'].'</td>
              <td>'.$row['tip_cazare'].'</td>
              <td>'.$row['telefon'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['website'].'</td>
              <td>'.$row['judet'].'</td>
               </tr>
            </tbody>
              ';

            }
            else{ $validare++;
            } 
            
          }
          //obiective  join cu judete 
         
          $sql_obj='SELECT o.denumire_obiectiv,o.tip_obiectiv,o.informatii,o.id_obiectiv, 
            a.judet, a.localitate, a.strada, a.nr_adresa 
            FROM obiective o 
            LEFT JOIN adrese a on o.adresa_obiectiv=a.id_adresa 
            where a.judet like "%'.$cauta.'%" ';
          $rezu=mysqli_query($conn,$sql_obj);
          if($rezu){
            if(mysqli_num_rows($rezu))
            {
              echo'<thead>
              <tr>
              <th>Id</th>
              <th>Denumire</th>
              <th>Tip locatie</th>
              <th>Informatii</th>
              <th>judet</th>';
              $row=mysqli_fetch_assoc($rezu);
              echo '<tbody>
              <tr>
              <td>'.$row['id_obiectiv'].'</td>
              <td>'.$row['denumire_obiectiv'].'</td>
              <td>'.$row['tip_obiectiv'].'</td>
               <td>'.$row['informatii'].'</td>
              <td>'.$row['judet'].'</td>
               </tr>
            </tbody>
              ';
            }else{ $validare++;
            } 
          }


          //evenimente join cu judete
         
          $eve_sql='SELECT eve.id_eveniment,eve.denumire_eveniment, eve.tip_eveniment,eve.inceput_eveniment,
         eve.nr_zile, a.judet,a.localitate,a.strada,a.nr_adresa from evenimente eve left join adrese a ON
         eve.adresa_eve = a.id_adresa where a.judet LIKE "%'.$cauta.'%" ';
         $rez=mysqli_query($conn,$eve_sql);
         if($rez){
           if(mysqli_num_rows($rez))
           {
             echo'<thead>
             <tr>
             <th>Id</th>
             <th>Denumire</th>
             <th>Tip eveniment</th>  
              <th>Judet</th>';
              $row=mysqli_fetch_assoc($rez);
              echo'
              <tbody>
              <tr>
              <td>'.$row['id_eveniment'].'</td>
              <td>'.$row['denumire_eveniment'].'</td>
              <td>'.$row['tip_eveniment'].'</td>
              <td>'.$row['judet'].'</td>
               </tr>
            </tbody>';

           } else{ $validare++;
           } 
     }
    }

  



    echo'</table>
    </div>

</body>
</html>';
?>