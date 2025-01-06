
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preferinte_calatorie.css">

    <title>Utilizatori</title>
</head>
<body>
<div class="container">
        <div class="card" style="width:40cm;">
            <div class="card-body">
                <h3>Adresa vizualizata:</h3>
            <table class="table-info">
                <thead>
                <tr class="table-info">
                    <th scope="col">Telefon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    </tr>
                </thead>
                <tbody>
<?php
$serverName= "localhost";
$userName= "root";
$password= "";
$dbname="planificare_calatorie";
$conn=mysqli_connect($serverName,$userName,$password,$dbname);
if(mysqli_connect_errno()){
    die("Conexiune nereusita! ".mysqli_connect_error());
}
$contact_id =$_GET['contact_id'];

$select=" SELECT * FROM contacte WHERE id_contact=$contact_id;";
 $rezultat=mysqli_query($conn, $select);

 if($rezultat)
 {
    while( $row = mysqli_fetch_assoc($rezultat)){
       // $contact_id=$row['contact_id'];
        $telefon=$row['telefon'];
        $email=$row['email'];
        $website=$row['website'];
     
        echo' <tr class="table-info">
     
        <td class="table-info">'.$telefon.'</td>
        <td class="table-info">'.$email.'</td>
        <td class="table-info">'.$website.'</td>
        </td>
                       
        </tr>
        '
        ;
    }
 }?>
    </tbody>
    </table>
 </div>
 <button tpe="back"class="btn btn-info" name="back"><a href="administrator.php">Back</a></button>
</div>
</body>
</html>