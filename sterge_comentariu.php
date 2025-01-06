<?php
include 'includes/connect_bd.php';
error_reporting(0);
if(isset($_GET['sterge_come'])){
    $id=$_GET['sterge_come'];

    $stergere="DELETE FROM comentarii WHERE id_come=$id;";
    $rez=mysqli_query($conn,$stergere);
    if($rez)
    {
       header("location:forum.php");
    }
    else
        die(mysqli_error($conn));

}
?>