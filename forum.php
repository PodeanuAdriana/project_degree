<?php
// include 'header.php';
include 'includes/connect_bd.php';
// include 'cautare.php';
// include 'includes/meniu_log.php';
session_start();
$id=$_SESSION['id'];
include 'includes/meniu_log.php';
?>

<html>
<head>
    <title>Forum</title>
    <style>
       #textarea1{
            background-color:skyblue;
        }
        </style>
</head>
<body>

<?php

        echo'
        <div class="card" style="width: 40rem;">
        <h4 class="card-title">Discutii</h4>
        <div class="card-body">
       <form action="#" method="POST">
            <div class="mb-4">
            <label for="textarea1" class="form-label">Adaugati comentariu</label>
            <textarea class="form-control"  id="textarea1" name="comentariu" rows="3"></textarea>
            </div>
                <input type="submit" class="btn btn-dark" name="trimite5" id="butonel1" value="Trimite">
        </form>

        ';
        // }
    $select_t="SELECT 
        c.id_come, 
        c.comentariu, 
        c.util, 
        c.data_postare,
        u.nume_utilizator,
        u.prenume_utilizator
    FROM 
        comentarii c
    INNER JOIN 
        utilizatori u
    ON 
        c.util = u.id_cont ORDER BY id_come DESC;
    ";
        $rez=mysqli_query($conn,$select_t);
        if(mysqli_num_rows($rez)>0){
            foreach($rez as $r)
            {   $id_comentariu_t=$r['id_come'];
                $nume_t=$r['nume_utilizator'];
                $prenume_t=$r['prenume_utilizator'];
                $data_post_t=$r['data_postare'];
                $comentariu_t=$r['comentariu'];
                $uti_t=$r['util'];
                echo'   
                <table class="table">
            
                <thead>
                
                </thead>
            <tbody>
            <td>'.$nume_t.'</td>
            <td>'.$prenume_t.'</td>
            <td>'.$data_post_t.'</td>
            <td>'.$comentariu_t.'</td>
             <td><div class="dropdown-divider"></div></td>';  
            if($uti_t==$id){
            echo'  <td class="table-info">
                            <button  class="btn btn-dark-light" name="update"><a href="modifica_comentariu.php?modifica_come='.$id_comentariu_t.'" >Modifica</a>
                            </button> 
                            <button  class="btn btn-dark-light"><a href="sterge_comentariu.php?sterge_come='.$id_comentariu_t.'" >Sterge</a>
                            </button>
                            <br>
                            </td>
                            <td><div class="dropdown-divider"></div></td>';
            }
        }  echo'
          
        </tbody>
        </tabel> ';
    
} 
echo'
  
   </div>
    </div>';
    
    if(isset($_POST['trimite5'])){
        $comentariu=$_POST['comentariu'];
        $data_curenta=date("Y-m-d");
        //id_com,com,uti,dat
        $insert=$conn->prepare("INSERT INTO comentarii (comentariu,util,data_postare) VALUES (?,?,?);");
        $insert->bind_param("sis",$comentariu,$id,$data_curenta);
        $insert->execute();
        
        // if ($conn->query($insert) === TRUE) {
                        
        //     // echo 'reusit';
    
        //     } else {
        //             echo "Error: " . $conn->error;
        //     }
    
    }
    echo'
    
    </div>
    </div>
        ';

?>
</body>
</html>
<?php
include 'footer.php';

?>