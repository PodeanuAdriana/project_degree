<?php
// include 'header.php';
include 'includes/connect_bd.php';
include 'includes/meniu_log.php';
$select_utilizator="SELECT * FROM utilizatori WHERE id_cont=1;";
$result=mysqli_query($conn,$select_utilizator);
foreach($result as $row)
{
    $email=$row['email'];
    $telefon=$row['mobil'];
}
?>







<div class="chenarut"style=color:white;float:center;>
    <!-- <h5>Despre noi </h5> -->
    <!-- Misiune si viziune! <br>

    Acordăm o deosebită atenție vacanțelor, drumețiilor și excursiilor fiecărui utilizator, <br>
    Punem accent pe preferințele selectate și filtrăm cele mai bune rezultate <br> -->

    <div class="card" style="width: 25rem;">
        <div class="card-body">
            <h5 class="card-title">Despre noi!</h5>
            <div class="dropdown-divider"></div>
<br>
    O vacanța de dorești, <br>
    Un bagaj îl pregatesti, <br>
    O hartă și aplicație, <br>
    Usor te va ajuta <br>
    TuRo  te va indruma. <br>
<br>
  <b>Contact<b> <br> <br>
    De vrei sa ne contactezi,<br>
    Numarul sa il notezi <br>
    <?php echo $telefon;?><br>
    Un mail de vrei sa dai, <br>
    Mailul nostru iata-l ai, <br> <?php echo $email;?><br>
    In contacte sa ne scrii, <br>
    Turo iti va multumi!

   

    

</div>
</div>
</div>










<?php
include 'footer.php';
?>
