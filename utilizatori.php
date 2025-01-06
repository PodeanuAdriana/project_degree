<?php
//include 'meniu_logat.php';
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
    <style>
        .table {
            width: 50cm;
            border: 2px solid; /* grosimea și stilul bordurii */
            border-radius: 5%; /* raza colțurilor */
        }
    </style>
</head>
<body>
<!-- <div class="container">
        <div class="card" style="width:30cm;">
            <div class="card-body"> -->
                <!-- <div class="container"> -->

        <table class="table"  style="width:50cm; border-style:1px solid; border-radius:5%;">
                <thead>
                <tr class="table"  style="width:50cm;">
                 
                    <th scope="col">Nume</th>
                    <th scope="col">Prenume</th>
                    <!-- <th scope="col">Utilizator</th> -->
                    <th scope="col">Parola</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobil</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Sterge</th>
                    </tr>
                </thead>
                <tbody id="inregistrari">
                    <?php
                    $select="SELECT * FROM utilizatori";
                    $rezultat=mysqli_query($conn, $select);
                    if($rezultat)
                    {
                       while( $row = mysqli_fetch_assoc($rezultat)){
                        $id=$row['id_cont'];
                        $nume=$row['nume_utilizator'];
                        $prenume=$row['prenume_utilizator'];
                        $utilizator=$row['utilizator'];
                        $varsta=$row['vasta'];
                        $parola=$row['parola'];
                        $email=$row['email'];
                        $mobil=$row['mobil'];
                        $rol=$row['rol'];
                        echo' <tr class="table" style="width:40cm;">
                 
                        <td class="table">'.$nume.'</td>
                        <td class="table">'.$prenume.'</td>
                        <td class="table">'.$parola.'</td>
                        <td class="table">'.$email.'</td>
                        <td class="table">'.$mobil.'</td>
                        <td class="table">'.$rol.'</td>
                        <td class="table"><button><a href="utilizatori_update.php?modificaid='.$id.'" >Modifica </a></button></td>
                        <td class="table"><button><a href="includes/sterge_utilizatori.php?stergeid='.$id.'">Sterge </a></button></td>
                     
                        </tr>';

                       }
                    
                    }
                    ?>
                
                
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                       <ul class="pagination" id="pagination">
                           <li class="page-item">
                           <a class="page-link" href="#" aria-label="Previous">
                               <span aria-hidden="true">&laquo;</span>
                           </a>
                           </li>
                           <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item"> -->
                           <a class="page-link" href="#" aria-label="Next">
                               <span aria-hidden="true">&raquo;</span>
                           </a>
                           </li>
                       </ul>
                       </nav>
                       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                       <script src="script.js">
                        
                       </script>
            <!-- </div> -->
    <!-- </div> -->
</body>
</html>