<?php 
// include 'header.php';
include 'includes/connect_bd.php';
// include 'cautare.php';
error_reporting(0);
session_start();
$id= $_SESSION['id'];
 $select_utilizator="SELECT * FROM utilizatori WHERE id_cont=$id;";
 $result=mysqli_query($conn,$select_utilizator);
 foreach($result as $row)
            {   $id_cont=$row['id_cont'];
                $nume=$row['nume_utilizator'];
                $prenume=$row['prenume_utilizator'];
                $username=$row['username'];
                $varsta=$row['varsta'];
                $email=$row['email'];
                $parola=$row['parola'];
                $mobil=$row['mobil'];
             
            }

            // $number_charact = strlen($parola);
            // for($i=1; $i<=strlen($parola) ;$i++)
            //  echo '*';
            include 'includes/meniu_log.php';
?>

   <div class="card" style="width: 25rem;">
  <div class="card-body">
    <!-- <h5 class="card-title">Cont utilizator</h5> -->
    <div class="dropdown-divider"></div>
    <h5 class="card-title" style="text-align:center;">Bine ai venit, <br> <?php echo $username ?></h5>
    <div class="dropdown-divider"></div>

    <label>Nume:<?php echo " ".$nume ?></label> <br>
    <label>Prenume:<?php echo " ".$prenume ?></label><br>
    <label>Username:<?php echo " ".$username ?></label> <br>
    <!-- <label>Varsta:<?php echo " ".$varsta ?></label><br> -->
    <label>Email:<?php echo " ".$email ?></label><br>
    <label>Mobil:<?php echo " ".$mobil ?></label><br>
    <label>Parola:<?php echo " "; $number_charact = strlen($parola);
            for($i=1; $i<=strlen($parola) ;$i++)
             echo '*';?> </label>
              <div class="dropdown-divider"></div>
              
              <div class="butoane">
                <form action="cont_update.php" method="post">
              <button name="modifica" id="butonel" class="btn btn-dark"><a href="cont_update.php?modificaid=<?php  echo $id?>">Modifica</a></button>
              
            </form>
              <form action="stergere_cont.php" method="post">
              <button name="sterge" id="butonel" class="btn btn-outline-dark"><a href='sterge_cont.php?stergeid=<?php  echo $id?>'>Sterge</a></button>
        </form>
        </div>
<?php
include 'footer.php';
?>