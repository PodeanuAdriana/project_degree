<?php
// include 'header.php';
include 'includes/connect_bd.php';
session_start();

$id=$_SESSION['id'];
 include 'includes/meniu_log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="css/preferinte_selectate.css" rel="stylesheet"> 
   <title>Preferinte selectate</title>
</head>
<div class="titluri">
<h3 class="titlulet" style="text-align:center;">Obiective selectate:</h3>
</div>
<table class="table">
<thead>
     <tr>
       <th class="coloana" scope="col">Obiectiv</th>
       <th class="coloana" scope="col">Tip Obiectiv</th>
       <th class="coloana" scope="col">Informatii</th>
       <th class="coloana" scope="col">Judet</th>
       <th class="coloana" scope="col">Localitate</th>
       <th class="coloana" scope="col">Strada</th>
       <th class="coloana" scope="col">Numar adresa</th>
       
     </tr>
   </thead>
   <tbody>
    <?php

    $re=0;$ave=0;$cas=0;$lac=0;$bai=0;$muz=0;$ist=0;$nat=0;$zoo=0;$pla=0;$acv=0;    
    $sql="SELECT * FROM tipuri_obiective WHERE uti=$id ORDER BY id_ob_tip DESC LIMIT 1";
        $rez=mysqli_query($conn,$sql);
        if(mysqli_num_rows($rez)>0)
        {
          foreach($rez as $i)
          {
            $re=$i['religios'];
            $ave=$i['aventuros'];
            $lac=$i['lacuri'];
            $cas=$i['cascade_a'];
            $bai=$i['bai_termale'];
            $muz=$i['muzee'];
            $ist=$i['istoric'];
            $nat=$i['naturale'];
            $zoo=$i['zoo'];
            $pla=$i['planetariu'];
            $acv=$i['acvariu_delfinariu'];
          }
          $obiectiv=array($re,$ave,$lac,$cas,$bai,$muz,$ist,$nat,$zoo,$acv);
        if($re==1)
          {
            $re='religios';
          }
        if($ave==1)
            {
              $ave='aventuros';
            }
        if($lac==1)
              {
                $lac="lacuri";
              }
        if($cas==1)
                {
                  $cas='cascade';
                }
        if($bai==1)
                  {
                    $bai='bai_termale';
                  }
        if($muz==1)
                    {
                      $muz='muzee';
                    }
        if($ist==1)
                      {
                        $ist='istoric';
                      }
        if($nat==1)
                        {
                          $nat='naturale';
                        }
        if($zoo==1)
                          {
                            $zoo='zoo';
                          }
        if($pla==1)
                            {
                              $pla='planetariu';}
        if($acv==1)
                              {
                                $acv='acvariu/delfinariu';
                              }
                              $obiectiv=array($re,$ave,$lac,$cas,$bai,$muz,$ist,$nat,$zoo,$acv);
        }
  foreach($_SESSION['jud'] as $item )
        { 
        foreach($obiectiv as $obie)
        {
        $select_obiectiv="SELECT * From (
          SELECT o.denumire_obiectiv,o.tip_obiectiv,o.informatii,o.id_obiectiv, 
          a.judet, a.localitate, a.strada, a.nr_adresa 
          FROM obiective o 
          LEFT JOIN adrese a on o.adresa_obiectiv=a.id_adresa 
          where a.judet='$item') 
        as obie where tip_obiectiv='$obie';";
        
      $result_obiectiv=mysqli_query($conn,$select_obiectiv);
      foreach($result_obiectiv as $row)
      { $id_obiectiv=$row['id_obiectiv'];
       $obiectiv_denumire=$row['denumire_obiectiv'];
       $tip_obiectiv=$row['tip_obiectiv'];
       $informatii=$row['informatii'];
       $judet=$row['judet'];
       $localitate=$row['localitate'];
       $strada=$row['strada'];
       $nr_adresa=$row['nr_adresa'];
       echo' 
       <tr>
              <td>'.$obiectiv_denumire.'</td>
              <td>'.$tip_obiectiv.'</td>
              <td>'.$informatii.'</td>
              <td>'.$judet.'</td>
              <td>'.$localitate.'</td>
              '; if($strada==0 || $nr_adresa==0)
              echo '<td>-</td>  <td>-</td>  ';
              else
              echo'<td>'.$strada.'</td>
              <td>'.$nr_adresa.'</td>    
      </tr> ';  
       
      }
      
      
    }
    }

  
  echo'</tbody>
  </table>
      </div>';
include 'footer.php';
?>