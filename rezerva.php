<?php
// include 'header.php';
include 'includes/connect_bd.php';
// include "includes/meniu_log.php";

session_start();
$id= $_SESSION['id'];
// $id_cazare =$_SESSION['cazare_sele'];
$cod_camera=$_GET['cod_camera'];
$id_cazare=$_GET['cod_cazare'];
$camera_pret=$_GET['camera_pret'];
$pret_total=$_GET['pret_total'];
$nr_nopti=$_GET['nr_nopti'];

$cod_camera=$_GET['cod_camera'];
include "includes/meniu_log.php";
?>

<div class="card" style="width: 25rem;">
        <div class="card-body">
            <h3 class="card-title"><center>Rezervat</center></h3>
            <div class="dropdown-divider"></div>
    <label>Datele de rezervare sunt:</label>
 <?php
    $sql_ultima="SELECT * FROM date_rezervare  where ut=$id ORDER BY cod_rezervare DESC LIMIT 1;";
    $RE=mysqli_query($conn,$sql_ultima);
    foreach($RE as $r)
    {
        $ultima_rezervare=$r['cod_rezervare'];
    }

   $insert_tabela=$conn->prepare("INSERT INTO rezervare_adresa(cod_rez,cod_caza) VALUES (?,?)");
   $insert_tabela->bind_param("ii",$ultima_rezervare, $id_cazare);
   $insert_tabela->execute();

    //selectez ultimul id din tabela legatura

    $sql_ultima="SELECT * FROM rezervare_adresa  where cod_rez=$ultima_rezervare ORDER BY id_rezervare_adresa DESC LIMIT 1;";
    $RE=mysqli_query($conn,$sql_ultima);
    foreach($RE as $r)
    {
        $ultima_tabela=$r['id_rezervare_adresa'];
    }


//    $update_tabela=$conn->prepare("UPDATE tabela_legatura from date_rezervare SET tabela_legatura=? WHERE cod_rezervare=? ;");
//     $update_tabela->bind_param("ii",$ultima_tabela,$ultima_rezervare);
//     $update_tabela->execute();



    $utilizator="SELECT * FROM utilizatori where id_cont=$id;";

    $r=mysqli_query($conn,$utilizator);

    foreach($r as $row )
    {
        $nume=$row['nume_utilizator'];
        $prenume=$row['prenume_utilizator'];
        $email=$row['email'];
        $telefon=$row['mobil'];
    }

    $cazare_contact_adresa="SELECT * FROM 
    (SELECT  ca.id_cazare, ca.denumire_cazare, ca.tip_cazare,
     c.telefon, c.email, c.website,
      a.judet, a.localitate, a.strada, a.nr_adresa 
      FROM cazari ca LEFT JOIN contacte c 
      on ca.id_contact = c.id_contact 
      LEFT JOIN adrese a on ca.adresa_cazare = a.id_adresa ) as contacte_adrese
     where id_cazare=$id_cazare;";


    $rez=mysqli_query($conn,$cazare_contact_adresa);
    foreach($rez as $r)
    {
  
        $telefon_cazare=$r['telefon'];
        $email_cazare=$r['email'];
        $judet_caza=$r['judet'];
        $localitate_caza=$r['localitate'];
        $strada_caza=$r['strada'];
        $nr_adresa=$r['nr_adresa'];
    }

    // $camera_rezervare="SELECT * FROM(SELECT c.id_cazare,c.denumire_cazare,c.tip_cazare,ca.cod_camera,ca.tip_camera,ca.status,ca.nr_camere,ca.nr_camere_disponibile,p.camera_pret
    // FROM camere ca LEFT JOIN preturi p
    // on ca.pret_camera=p.cod_pret
    // LEFT JOIN cazari c 
    // on ca.caza_cod=c.id_cazare) as cazari_preturi where id_cazare=$id_cazare and cod_camera=$cod_camera ;";
    $camera_rezervare="SELECT * FROM cazari where id_cazare=$id_cazare;";

    $rez=mysqli_query($conn,$camera_rezervare);
    foreach($rez as $r)
    {   
        $denumire_cazare=$r['denumire_cazare'];
        $tip_cazare=$r['tip_cazare'];
      
     
    }
    $camera="SELECT * FROM camere where cod_camera=$cod_camera;";
    
    $rez=mysqli_query($conn,$camera);
    foreach($rez as $r)
    {   
    $tip_camera=$r['tip_camera'];
    $camere_disponibile=$r['nr_camere_disponibile'];  
    
    $nr_camere_totale=$r['nr_camere'];
    }

        // voi face sa vad daca este disponibila camera si cat timp
      
        function schimbare_disponibilitate($camere_disponibile,$nr_camere_totale,$nr_camere)
        {
            if($nr_camere >$camere_disponibile || $nr_camere > $nr_camere_totale)
                echo '<script>alert("Camere insuficiente!");</script>';
            else
                $camere_disponibile=$camere_disponibile-$nr_camere;
            if($camere_disponibile==0)
                echo '<script>alert("Camere ocupate!");</script>';


                $checkin_re=$_SESSION['in'];
                $checkout_re=$_SESSION['out'];
                //inserez rezervarea in tabela pt camere rezervate

               
                $query=$mysqli_prepare("INSERT INTO rezervari (camera_id,checkin_cam,checkout_cam,nr_cam_rez) VALUES (?,?,?,?) ");
                $query->bind_param("issi",$cod_camera,$checkin_re,$checkout_re,$nr_camere);
                $query->execute();



                
                      
                $query=$mysqli_prepare("UPDATE camere SET nr_camere_disponibile=? where cod_camera=? ");
                $query->bind_param("ii",$camere_disponibile);
                $query->execute();

        } 

        function eliberare_camere($cod_camera, $nr_camere)
        {
            $rezervari=$mysqli_prepare("SELECT * FROM rezervari  re JOIN camere ca  on ca.cod_camera=re.camera_id WHERE tip_camera=? and checkout_cam >= NOW()");
            $query->bind_param("s",$tip_camera);
            $query->execute();

            $rez=mysqli_stmt_get_result($conn,$rezervari);
            $r=mysqli_fetch_assoc($rez);
            if($row)
            {
                $update_camere=mysqli_prepare("UPDATE camere SET nr_camere_disponibile=? Where tip_camera=? and nr_camere_disponibile >0 ");
                $camere_disponibile=$camere_disponibile+$nr_camere;
                $query->bind_param("is",$camere_disponibile,$tip_camera);
                $query->execute();
            
            }



        }
       
?>
<br>
    <label>Nume: <?php echo $nume; ?> </label> <br>
    <label>Prenume: <?php echo $prenume; ?> </label><br>
    <label>Email: <?php echo $email; ?> </label><br>
    <label>Telefon: <?php echo $telefon; ?> </label>
    <br>
    <div class="dropdown-divider"></div>
    <label>Date Cazare </label>
    <div class="dropdown-divider"></div>
    <br> 
    <label> Cazare: <?php echo $denumire_cazare; ?></label> <br>
    <label>Tip de cazare<?php echo $tip_cazare; ?></label><br>
    <label>Tip camera:<?php echo $tip_camera; ?></label><br>
    <label>Pret Camera/Noapte:<?php echo $camera_pret; ?></label><br>
    <label>Nr nopti: <?php echo $nr_nopti; ?></label>
    <div class="dropdown-divider"></div>

    <label>Contact cazare</label>

    <div class="dropdown-divider"></div>
    <label>Telefon: <?php echo $telefon_cazare; ?></label><br>
    <label>Email: <?php echo $email_cazare; ?> </label>
    <br>

    <div class="dropdown-divider"></div>

    <label style="float:right;color:green;">Pret total: <?php echo $pret_total;?></label>

    
<?php
include 'footer.php';
?>