<?php
include 'connect_db.php';
error_reporting(0);
echo '<script>alert("Sunteti sigur de stergerea istoricului?");</script>'
if(isset($_GET['stergeid'])){
    $id=$_GET['stergeid'];

    $stergere="DELETE FROM istoric WHERE id_cont=$id;";
    $rez=mysqli_query($conn,$stergere);
    if($rez)
    {
       //header("location:utilizatori.php");
       
    }
    else
        die(mysqli_error($conn));

}
?>