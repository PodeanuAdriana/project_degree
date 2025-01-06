<?php
include 'meniu_logat.php';

        if(isset($_POST['submit']))
             { 
            $apasat=1;
            $judete=['1'=>'Prahova','2'=>'Brasov','3'=>'Alba Iulia','4'=>'Arad','5'=>'Arges',
            '6'=>'Baia Mare','7'=>'Botosani','8'=>'Bucuresti','9'=>'Caras Severin','10'=>'Cluj',
            '11'=>'Constanta','12'=>'Dambovita','13'=>'Gorj','14'=>'Hunedoara','15'=>'Iasi',
            '16'=>'Maramures','17'=>'Mures','18'=>'Neamt','19'=>'Sibiu','20'=>'Suceava','21'=>'Tulcea','22'=>'Valcea'];
        
            //judet vizitat va trebui sa il iau din istoric 
           // if($judet_ales == $judet_vizitat)
            // {
            //     $numar_ales=rand(1,22);
            // }

        }
        else
           { $apasat=0;}

           $_SESSION['apasat']=$apasat;
        
?>