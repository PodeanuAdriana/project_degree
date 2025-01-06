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
            <table class="table"  style="width:50cm;">
                <thead>
                <tr class="table" >
                    <th scope="col">Id</th>
                    <th scope="col">Denumire</th>
                    <th scope="col">Tip obiectiv</th>
                    <th scope="col">Informatii</th>
                    <th scope="col">Adresa</th>
                    <th scope="col">Modifica </th>
                    <th scope="col">Sterge </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select="  SELECT * FROM obiective;";
                    $rezultat=mysqli_query($conn, $select);
                    if($rezultat)
                    {
                       while( $row = mysqli_fetch_assoc($rezultat)){
                        $id_obiectiv=$row['id_obiectiv'];
                        $denumire=$row['denumire_obiectiv'];
                        $tip_obiectiv=$row['tip_obiectiv'];
                        $informatii=$row['informatii'];
                       $adresa_id=$row['adresa_obiectiv'];
                       
                        echo' <tr class="table" style="width:40cm;">
                        <th scope="row">'.$id_obiectiv.'</th>
                        <td class="table">'.$denumire.'</td>
                        <td class="table">'.$tip_obiectiv.'</td>
                        <td class="table">'.$informatii.'</td>
                        <td class="table"><a href="adresa_specifica.php?adresa_id='.$adresa_id.'">'.$adresa_id.'</a></td>
                        <td class="table">
                        <button ><a href="restaurante_update.php?modificaid='.$id_obiectiv.'" >Obiectiv</a>
                        </button>
                        <br>
                        <button ><a href="adrese_update.php?modificaid='.$adresa_id.'">Adresa</a>
                        </button>
                        
                        </td>
                        <td class="table">
                        
                        <button ><a href="includes/sterge_obiectiv.php?stergeid='.$id_cazare.'" >Obiectiv</a></button>
                        <br>
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