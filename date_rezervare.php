<?php
include "meniu_logat.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\date_rezervare.css">
    <title>Rezerva data</title>
</head>
<body>

    <div class="container">
    <h4>Va rugam sa alegeti datele de rezervare!</h4>
        <div class="date_rez">
        <h3>Data Check In</h3>
        <input type="date" id="checkin">
        
        <h3>Data Check Out</h3>
        <input type="date" id="checkout">

        <h3>Judet</h3>
                  
        <select name="" id="" form="formii">
                        <option value="Prahova">Prahova</option>
                        <option value="Brasov">Brasov</option>
                        <option value="Constanta">Constanta</option>
                        <option value="Alba_Iulia">Alba Iulia</option>
                        <option value="Mures">Mures</option>
                        <option value="Arad">Arad</option>
                        <option value="Neamt">Neamt</option>
                        <option value="Arges">Arges</option>
                        <option value="Dambovita">Dambovita</option>
                        <option value="Suceava">Suceava</option>
                        <option value="Bucuresti">Bucuresti</option>
                        <option value="Sibiu">Sibiu</option>
                        <option value="Botosani">Botosani</option>
                        <option value="Iasi">Iasi</option>
                        <option value="Tulcea">Tulcea</option>
                        <option value="Severin">Severin</option>
                        <option value="Gorj">Gorj</option>
                        <option value="Hunedoara">Hunedoara</option>
                        <option value="Valcea">Valcea</option>
                        <option value="Cluj">Cluj</option>
                        <option value="Maramures">Maramures</option>
                    </select>
                    <br></br>
        <input type="button" id="butonel" value="cauta">
</div>
    </div>
<br>
    imi salvez intr-o variabila de tip sesion preferinta pentru cazare
    tipul de obiective si le transmit aici apoi fac selectare pe baza datelor si a preferintelor alese 
    de asemenea salvez si posibila destinatie din acel random sau scris de utilizator
</body>
</html>