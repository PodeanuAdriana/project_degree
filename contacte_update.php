<?php
$serverName= "localhost";
$userName= "root";
$password= "";
$dbname="planificare_calatorie";
$conn=mysqli_connect($serverName,$userName,$password,$dbname);
if(mysqli_connect_errno()){
    die("Conexiune nereusita! ".mysqli_connect_error());
}
$id =$_GET['modificaid'];
if(isset($_POST['update'])){

    $sql="SELECT * FROM `contacte` WHERE  id_contact=$id;";
    //echo $sql;
    $select=mysqli_query($conn,$sql) or die('Nu merge !');
    if(mysqli_num_rows($select)>0){
        $ok=0;
        if(!empty($_POST['telefon']))
        {
        $telefon=$_POST['telefon'];
        $sql="UPDATE contacte SET telefon='$telefon' WHERE id_contact='$id'";
        mysqli_query($conn,$sql) or die('Nu merge telefon!');
        $ok++;

        }
        if(!empty($_POST['email']))
            {
            $email=$_POST['email'];
            $sql="UPDATE contacte SET email='$email' WHERE id_contact='$id'";
            mysqli_query($conn,$sql) or die('Nu merge email!');
            $ok++;
        }

        if(!empty($_POST['website']))
        {
        $website=$_POST['website'];
        $sql="UPDATE contacte SET website='$website' WHERE id_contact='$id'";
        mysqli_query($conn,$sql) or die('Nu merge website!');
        $ok++;
        }

        if($ok>0){
          //  echo'Modificare reusita!';
            header('location:administrator.php');
            
        }
            else
            echo 'Modificare nereusita!';
    }
    else echo'ID negasit!';
    
}
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preferinte_calatorie.css">
</head>
<body>
<div class="Formular">
<form action="" method="POST">
<div class="container">
        <div class="card" style="width:20cm;">
            <div class="card-body">
                    <h5 class="card-title">Modificari</h5>
                <label>telefon</label>
                <input type="text" class="form-control" name="telefon">
            </div>
            <br>
            <div class="form-group">
                <label>email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <br>
            <div class="form-group">
                <label>website:</label>
                <input type="text" class="form-control" name="website">
            </div>
            <br>
            <div class="form-group">
                <label>Evaluare:</label>
                <input type="number" min=0 max=5 class="form-control" name="evaluare">
            </div>
            <br>
            
            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <button tpe="back"class="btn btn-info" name="back"><a href="administrator.php">Back</a></button>
                    </form>

                </div>
            </div>
    </div>
</body>
</html>