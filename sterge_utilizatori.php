<?php
include 'connect_db.php';
error_reporting(0);
if(isset($_GET['stergeid'])){
    $id=$_GET['stergeid'];

    $stergere="DELETE FROM utilizatori WHERE id_cont=$id;";
    $rez=mysqli_query($conn,$stergere);
    if($rez)
    {
       header("location:utilizatori.php");
    }
    else
        die(mysqli_error($conn));

}
?>