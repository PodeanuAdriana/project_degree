<?php
// include 'header.php';
include 'includes/connect_bd.php';
session_start();
$id= $_SESSION['id'];
// echo $id;
                        // $stack = new Stack(); 

  if(isset($_POST['save'])|| isset($_POST['trimite']))

     {   $values=array();
                            
          $buget=$_POST['buget'];
           $_SESSION['buget']=$buget;
            $values[]=$_POST['buget'];
                            
                            $checkin=$_POST['checkin'];
                            $_SESSION['checkin']=$checkin;
                            $values[]=$_POST['checkin'];

                            $checkout=$_POST['checkout'];
                            $_SESSION['checkout']=$checkout;
                            $values[]=$_POST['checkout'];
                            $nr_pers=$_POST['nr_persoane'];
                            $_SESSION['nr_per']=$nr_pers;
                            // $nr_zile=(($checkout->diff($checkin))->days)-1;
                            // $_SESSION['nr_zile']=$nr_zile;

                            $judet=$_POST['judete'];
                            $_SESSION['jud']=$judet; 
                            foreach($judet as $j)
                            {$values[]=$j;}

                            // $nr_pers=$_POST['nr_persoane'];
                            // $_SESSION['nr_per']=$nr_pers;
                            $values[]=$_POST['nr_persoane'];

                            $nr_cam=$_POST['nr_camere'];
                            $_SESSION['nr_cam']=$nr_cam;
                            $values[]=$_POST['nr_camere'];
                            echo '<div class="card" style="width: 25rem;">
                            <div class="card-body">
                                <h5 class="card-title">Preferinte generale selectate</h5>
                                <div class="dropdown-divider"></div>
                                <label>Bugetul dumneavoastra:'.$buget.'</label><br>
                                <label>Data dumneavoastra checkin:'.$checkin.'</label><br>
                                <label>Data dumneavoastra checkout:'.$checkout.'</label><br>';
                                echo"<label>Judetele dumneavoastra selectate:";
                                foreach($judet as $jud)
                                   echo"  $jud</label>";
                               echo" <label>Numarul de persoane selectat:$nr_pers</label><br>
                                <label>Numarul de camere selectat:$nr_cam</label>" ;
                                
                         
                                $data_curenta=date("Y-m-d");
                               
                               $mycheckin=date("Y-m-d",strtotime($checkin));
                            
                                $mycheckout=date("Y-m-d",strtotime($checkout));
                               
                                if ($mycheckin < $data_curenta) {
                                    echo '<script>alert("Date incorecte!");</script>';
                                } elseif ($mycheckin> $mycheckout) {
                                    echo '<script>alert("Date incorecte!");</script>';
                                } else {
                                   
                                    $stmt = $conn->prepare("INSERT INTO date_rezervare (data_check_in, data_check_out, nr_persoane, buget_pers, nr_camere,ut) 
                                    VALUES (?, ?, ?, ?, ?, ? , ?)");
                                    $stmt->bind_param("ssiiiii", $mycheckin, $mycheckout, $nr_pers, $buget, $nr_cam,$id );
                                    $stmt->execute();
                                
                                }
                         
                       
  } 
                
   ?>
              <?php
include 'footer.php';

?>                     
