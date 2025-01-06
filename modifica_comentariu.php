<?php
include 'includes/connect_bd.php';
if(mysqli_connect_errno()){
    die("Conexiune nereusita! ".mysqli_connect_error());
}
$id =$_GET['modifica_come'];
if(isset($_POST['update'])){
    $sql_sele="SELECT * FROM comentarii WHERE id_come=$id ;";
    $select=mysqli_query($conn,$sql_sele) or die('Nu merge !');
    if(mysqli_num_rows($select)>0){
        $ok=0;
        if(!empty($_POST['comentariu']))
        {
            $comentariu=$_POST['comentariu'];
            $sql="UPDATE comentarii SET comentariu='$comentariu' WHERE id_come='$id'";
            mysqli_query($conn,$sql) or die('Nu merge comentariu!');
            $ok++;
        }
        
        if($ok>0){
            //echo'Modificare reusita!';
         //header('location:cont.php');
           echo' <script>alert("Date modficate cu succes!");</script>'; 
          header('location:forum.php');
        }
            else
            echo 'Modificare nereusita!';
    }

}
include 'includes/meniu_log.php';
?> 

<html>
<head>
    <title>Document</title>
    <style>
       #textarea1{
            background-color:skyblue;
        }
        </style>
</head>
<body>
<div class="card" style="width: 40rem;">
        <h4 class="card-title">Discutii</h4>
        <div class="card-body">
       <form action="#" method="POST">
            <div class="mb-4">
            <label for="textarea1" class="form-label">Modificati comentariu</label>
            <textarea class="form-control"  id="textarea1" name="comentariu" rows="3"></textarea>
            </div>
                <input type="submit" class="btn btn-dark" name="update" id="butonel1" value="Modifica">
        </form>

</body>
</html>
<?php
include 'footer.php';


?>