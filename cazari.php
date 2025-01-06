<?php
include 'connect_db.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/preferinte_calatorie.css"> -->

    <title>Utilizatori</title>
</head>
<body>
<!-- <div class="container">
        <div class="card" style="width:40cm;"> -->
            <!-- <div class="card-body"> -->
            <table class="table"  style="width:50cm;">
                <thead>
                <tr class="table">
                    <th scope="col">Id</th>
                    <th scope="col">Denumire</th>
                    <th scope="col">Tip cazare</th>
                    <th scope="col">Adresa_Cazare</th>
                    <th scope="col">Modifica </th>
                    <th scope="col">Sterge </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select="  SELECT * FROM cazari;";
                    $rezultat=mysqli_query($conn, $select);
                    if($rezultat)
                    {
                       while( $row = mysqli_fetch_assoc($rezultat)){
                        $id_cazare=$row['id_cazare'];
                        $denumire=$row['denumire_cazare'];
                        $tip_cazare=$row['tip_cazare'];
                       $adresa_id=$row['adresa_cazare'];
                       $id_contact=$row['id_contact'];
                        echo' <tr class="table" style="width:40cm;">
                        <th scope="row">'.$id_cazare.'</th>
                        <td class="table">'.$denumire.'</td>
                        <td class="table">'.$tip_cazare.'</td>
                        <td class="table"><a href="adresa_specifica.php?adresa_id='.$adresa_id.'">'.$adresa_id.'</a></td>
                        <td class="table"><a href="contact_specific.php?contact_id='.$id_contact.'">'.$id_contact.'</td>
                      
                        <td class="table">
                        <button ><a href="restaurante_update.php?modificaid='.$id_cazare.'" >Cazare</a>
                        </button>
                        <button ><a href="contacte_update.php?modificaid='.$id_contact.'" >Contact</a>
                        </button>
                        <br>
                        <button ><a href="adrese_update.php?modificaid='.$adresa_id.'">Adresa</a>
                        </button>
                        
                        </td>
                        <td class="table">
                        
                        <button ><a href="includes/sterge_cazare.php?stergeid='.$id_cazare.'" >Cazare</a></button>
                        <br>
                        <button ><a href="includes/sterge_contacte.php?stergeid='.$id_contact.'" >Contact</a>
                        </button>
                        <button ><a href="includes/sterge_adresa.php?stergeid='.$adresa_id.'" >Adresa</a></button>
                        
                        
                        </td>
                       
                        </tr>';

                       }
                    }


                    ?>
                
                
                </tbody>
            </table>
            <!-- </div>
    </div> -->
</body>
</html>