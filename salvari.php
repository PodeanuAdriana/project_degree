<?php
// include 'header.php';
include 'includes/connect_bd.php';
// include 'cautare.php';
include 'includes/meniu_log.php';
// class Stack {
//     private $elements = array();

//     public function push($value) {
//         $this->elements[] = $value;
//     }

//     public function getElements() {
//         return $this->elements;
//     }
// }
// $stiva = new Stack(); 
// $stiva1 = new Stack(); 
// $stiva2 = new Stack(); 
// $stiva3 = new Stack(); 
// $stiva4 = new Stack(); 
// $stiva=$_SESSION['stiva'];
// $stiva1=$_SESSION['stiva1'];
// $stiva2=$_SESSION['stiva2'];
// $stiva3=$_SESSION['stiva3'];
// $stiva4=$_SESSION['stiva4'];

// echo "Stack contents: " . implode(", ", $stiva->getElements()) . "\n";
// echo "Stack contents: " . implode(", ", $stiva1->getElements()) . "\n";
// echo "Stack contents: " . implode(", ", $stiva2->getElements()) . "\n";
// echo "Stack contents: " . implode(", ", $stiva3->getElements()) . "\n";
// echo "Stack contents: " . implode(", ", $stiva4->getElements()) . "\n";
?>
<!-- <div class="container"> -->
        <div class="card" style="width:40cm;">
            <div class="card-body" style="background-color:white">
                <h5 class="card-title" >
                    <center>Preferinte Salvate</center></h5>
                    <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" onclick="paginaincarcata('tipuri_caz_salvate.php')">Cazari salvate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="paginaincarcata('tipuri_specificuri_salvate.php')">Restaurante salvate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="paginaincarcata('tipuri_obiective_salvate.php')">Obiective</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="paginaincarcata('tipuri_evenimente_salvate.php')">Evenimente</a>
                    </li>
                    </ul>
  
                 </div>
                 <div class="divulet" id="divulet"style="background-color:white">
                 
                 </div>
                 <script>
        function paginaincarcata(page) {
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('divulet').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                    document.getElementById('divulet').innerHTML = '<p>Eroare la încărcarea conținutului.</p>';
                });
        }
    </script>
            <!-- </div> -->
    </div>





<?php
include 'footer.php';
?>

