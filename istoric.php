<?php
// include 'header.php';
include 'includes/connect_bd.php';
// include 'cautare.php';
session_start();
// include 'includes/meniu_log.php';
$id=$_SESSION['id'];
//selectez toate datele din date_rezervare si fac conditie sa vad daca acestea sunt vechi, daca da le inserez in istoric inainte de a afisa 

    $sql_date_istoric="SELECT * FROM date_rezervare WHERE ut=$id;";
    $rezi=mysqli_query($conn,$sql_date_istoric);
    if(mysqli_num_rows($rezi)>0)
    {   $data_curenta=date("Y-m-d");
        while($row=mysqli_fetch_assoc($rezi)){
            $data_checkin=$row['data_check_in'];
            $data_checkout=$row['data_check_out'];
            $utilizator=$row['ut'];
        }
        if($data_checkin < $data_curenta && $data_checkout < $data_curenta)
            {
                $insert_istoric="INSERT INTO istoric (tip_calatorie, nr_calatorii,cod_uti, cazari) VALUE ('vacanta','1',";
            }

    }
    include 'includes/meniu_log.php';





   $sql_istoric="SELECT *
FROM (
    SELECT
        isti.cod_uti,
        isti.data_vizi,
        isti.cazari,
        c.denumire_cazare,
        a.judet,
        a.localitate,
        a.strada,
        a.nr_adresa,
        dat.cod_rezervare
    FROM date_rezervare dat
    LEFT JOIN istoric isti ON isti.data_vizi = dat.cod_rezervare
    LEFT JOIN cazari c ON isti.cazari = c.id_cazare
    LEFT JOIN adrese a ON a.id_adresa = c.adresa_cazare
) AS rezultate
WHERE cod_uti = $id;";
             $rezultat=mysqli_query($conn, $sql_istoric);
             if(mysqli_num_rows($rezultat)>0)
             { echo'      
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

                        <h1><center>Istoric cazari:</center></h1>
                     <button name="sterge" id="butonel" class="btn btn-outline-dark"><a href="sterge_istoric.php?stergeid='.$id.'">Sterge istoric</a></button>

                        <table class="table">
                        
                            <thead>
                            
                            <tr>
                            <th class="coloana" scope="col">Data checkin</th>
                                            <th class="coloana" scope="col">Data checkout</th>
                                            <th class="coloana" scope="col">Cazare</th>
                                            <th class="coloana" scope="col">Judet</th>
                                            <th class="coloana" scope="col">Localitate</th>
                                            <th class="coloana" scope="col">Strada</th>
                                            <th class="coloana" scope="col">Nr</th>
                                        
                            </tr>
                            </thead>
                        <tbody>
                                    ';
                while( $row = mysqli_fetch_assoc($rezultat)){
                    $checkin=$row['data_check_in'];
                    $check_out=$row['data_check_out'];
                    $cazare=$row['denumire_cazare'];
                    $judet=$row['judet'];
                    $localitate=$row['localitate'];
                    $strada=$row['strada'];
                    $nr_adresa=$row['nr_adresa'];
                    
                    echo' <tr class="table-info">
                        <th scope="row">'.$checkin.'</th>
                        <td class="table-info">'.$check_out.'</td>
                        <td class="table-info">'.$cazare.'</td>
                        <td class="table-info">'.$judet.'</td>
                        <td class="table-info">'.$localitate.'</td>
                        <td class="table-info">'.$strada.'</td>
                        <td class="table-info">'.$nr_adresa.'</td></tbody>
                        </table>';
                  
                }
            }
            else echo '    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h4 class="card-title">Istoric</h4>
            <div class="dropdown-divider"></div>
            <h5>Nu exista date!</h5>
            </div>

            ';

?>

<?php
include 'footer.php';
?>
