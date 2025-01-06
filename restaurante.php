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
        <div class="card" style="width:40cm;">
            <div class="card-body"> -->
            <table class="table" style="width:50cm;">
                <thead>
                <tr class="table">
                  
                    <th scope="col">Denumire</th>
                    <th scope="col">Tip locatie</th>
                    <th scope="col">Specific</th>
                    <th scope="col">Evaluare</th>
                    <th scope="col">Adresa_Id</th>
                    <th scope="col">Contact_Id</th>
                    <th scope="col">Modifica/Sterge </th>
                    <!-- <th scope="col">Sterge </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select="  SELECT * FROM restaurante;";
                    $rezultat=mysqli_query($conn, $select);
                    if($rezultat)
                    {
                       while( $row = mysqli_fetch_assoc($rezultat)){
                        $id_restaurant=$row['id_restaurant'];
                        $denumire=$row['denumire'];
                        $tip_locatie=$row['tip_locatie'];
                        $specificuri=$row['specificuri'];
                        $evaluare=$row['evaluare'];
                        // $judet=$row['judet'];
                        // $localitate=$row['localitate'];
                        // $strada=$row['strada'];
                       $adresa_id=$row['adresa_id'];
                       $restaurant_contact=$row['restaurant_contact'];
                       //echo $adresa_id;
                       // $numar=$row['numar'];
                        // $telefon=$row['telefon'];
                        // $email=$row['email'];

                       // $adresa_rez="SELECT adresa_id FROM restaurante WHERE id_restaurant=$id_restaurant;";
                        //$rezultat=mysqli_query($conn, $adresa_rez);
                        //$adresa_id=$rezultat;


                        echo' <tr class="table"  style="width:40cm;">
                      
                        <td class="table">'.$denumire.'</td>
                        <td class="table">'.$tip_locatie.'</td>
                        <td class="table">'.$specificuri.'</td>
                        <td class="table">'.$evaluare.'</td>
                        <td class="table"><a href="adresa_specifica.php?adresa_id='.$adresa_id.'">'.$adresa_id.'</a></td>
                        <td class="table"><a href="contact_specific.php?contact_id='.$restaurant_contact.'">'.$restaurant_contact.'</td>
                      
                        <td class="table">
                        <button ><a href="restaurante_update.php?modificaid='.$id_restaurant.'" >Restaurant</a>
                        </button>
                        <button ><a href="contacte_update.php?modificaid='.$restaurant_contact.'" >Contact</a>
                        </button>
                        <br>
                        <button ><a href="adrese_update.php?modificaid='.$adresa_id.'">Adresa</a>
                        </button>
                        
                        </td>
                        <td class="table">
                        
                        <button ><a href="includes/sterge_restaurante.php?stergeid='.$id_restaurant.'" >Restaurant</a></button>
                        <br>
                        <button ><a href="includes/sterge_contacte.php?stergeid='.$restaurant_contact.'" >Contact</a>
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