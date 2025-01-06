
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
                    <th scope="col">Id_adresa</th>
                    <th scope="col">Regiune</th>
                    <th scope="col">Judet</th>
                    <th scope="col">Localitate</th>
                    <th scope="col">Strada</th>
                    <th scope="col">Numar</th>
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
$adresa_id =$_GET['adresa_id'];

$select="  SELECT * FROM adrese WHERE id_adresa=$adresa_id";
 $rezultat=mysqli_query($conn, $select);

 if($rezultat)
 {
    while( $row = mysqli_fetch_assoc($rezultat)){
        $id_adresa=$row['id_adresa'];
        $regiune=$row['regiune'];
        $judet=$row['judet'];
        $localitate=$row['localitate'];
        $strada=$row['strada'];
        $numar=$row['nr_adresa'];

        echo' <tr class="table-info">
        <th scope="row">'.$id_adresa.'</th>
        <td class="table-info">'.$regiune.'</td>
        <td class="table-info">'.$judet.'</td>
        <td class="table-info">'.$localitate.'</td>
        <td class="table-info">'.$strada.'</td>
        <td class="table-info">'.$numar.'</td>
        
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