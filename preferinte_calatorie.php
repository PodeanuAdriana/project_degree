<?php
include 'meniu_logat.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/preferinte_calatorie.css">
    <title>Preferinte calator</title>
</head>
<body>
<div class="container">
    <div class="card" style="width:20cm;">
        <div class="card-body">
            <h5 class="card-title">Formular de preferinte</h5>
                <form action="preferinte_selectate.php" id="formii" method="POST">
                    <fieldset><legend>Preferinte generale</legend>
                            <div class="intrebare">
                                <label style="color:blue">Preferati o anumita destinatie(judet)?</label><br>
                        
                                <input type="checkbox" name="judete[]" value="Prahova">
                                <label for="Prahova"style="color:blue">Prahova</label>
                            
                                <input type="checkbox" name="judete[]" value="Brasov">
                                <label for="Brasov"style="color:blue">Brasov</label>

                                <input type="checkbox" name="judete[]" value="Constanta">
                                <label for="Constanta"style="color:blue">Constanta</label><br>
                                
                                <input type="checkbox" name="judete[]" value="Alba_Iulia">
                                <label for="Alba_Iulia"style="color:blue">Alba Iulia</label>

                                <input type="checkbox" name="judete[]" value="Mures">
                                <label for="Mures"style="color:blue">Mures</label>

                                <input type="checkbox" name="judete[]" value="Arad">
                                <label for="Arad"style="color:blue">Arad</label><br>

                                <input type="checkbox" name="judete[]" value="Neamt">
                                <label for="Neamt"style="color:blue">Neamt</label>

                                <input type="checkbox" name="judete[]" value="Arges">
                                <label for="Arges"style="color:blue">Arges</label>

                                <input type="checkbox" name="judete[]" value="Dambovita">
                                <label for="Dambovita"style="color:blue">Dambovita</label><br>
                                
                                <input type="checkbox" name="judete[]" value="Suceava">
                                <label for="Suceava"style="color:blue">Suceava</label>

                                <input type="checkbox" name="judete[]" value="Bucuresti">
                                <label for="Bucuresti"style="color:blue">Bucuresti</label>

                                <input type="checkbox" name="judete[]" value="Sibiu">
                                <label for="Sibiu" style="color:blue">Sibiu</label><br>

                                <input type="checkbox" name="judete[]" value="Botosani">
                                <label for="Botosani"style="color:blue">Botosani</label>

                                <input type="checkbox" name="judete[]" value="Iasi">
                                <label for="Iasi"style="color:blue">Iasi</label>

                                <input type="checkbox" name="judete[]" value="Tulcea">
                                <label for="Tulcea"style="color:blue">Tulcea</label><br>

                                <input type="checkbox" name="judete[]" value="Severin">
                                <label for="Severin"style="color:blue">Severin</label>

                                <input type="checkbox" name="judete[]" value="Gorj">
                                <label for="Gorj"style="color:blue">Gorj</label>

                                <input type="checkbox" name="judete[]" value="Hunedoara">
                                <label for="Hunedoara"style="color:blue">Hunedoara</label><br>

                                <input type="checkbox" name="judete[]" value="Valcea">
                                <label for="Valcea"style="color:blue">Valcea</label>

                                <input type="checkbox" name="judete[]" value="Cluj">
                                <label for="Cluj"style="color:blue">Cluj</label>

                                <input type="checkbox" name="judete[]" value="Maramures">
                                <label for="Maramures"style="color:blue">Baia Mare</label><br>
                            </div>   
                            <div class="intrebare">
                                <label style="color:blue">Preferati un anumit buget?</label><br>
                                <input type="number" id="buget" name="buget" min="100"  step="50" value="100">
                            </div>   
                            <div class="date_rez">
                                <label style="color:blue">Data check-in</label>
                                <br>
                                    <input type="date" id="checkin" name="checkin">
                                    <br>
                                    <label style="color:blue">Data check-out</label>
                                    <br>
                                    <input type="date" id="checkout"name="checkout">
                            </div>  
                    </fieldset>
                    <fieldset>
                        <legend>Preferinte restaurant</legend>
                     <div class="intrebare">
                 <label style="color:blue">Specificul restaurantului </label><br>
                
                <input type="checkbox" name="specificuri[]" value="american">
                    <label for="american"style="color:blue">american</label>

                
                <input type="checkbox" name="specificuri[]" value="asiatic">
                    <label for="asiatic"style="color:blue">asiatic</label>
                
                <input type="checkbox" name="specificuri[]" value="bar">
                    <label for="european"style="color:blue">european</label>

                <input type="checkbox" name="specificuri[]" value="german">
                    <label for="german"style="color:blue">german</label>
                
                <input type="checkbox" name="specificuri[]" value="grecesc">
                    <label for="grecesc"style="color:blue">grecesc</label><br>

                <input type="checkbox" name="specificuri[]" value="international">
                    <label for="international"style="color:blue">international</label>

                <input type="checkbox" name="specificuri[]" value="italian">
                    <label for="italian"style="color:blue">italian</label>
                
                <input type="checkbox" name="specificuri[]" value="mediteranean">
                    <label for="mediteranean"style="color:blue">mediteranean</label>


                <input type="checkbox" name="specificuri[]" value="romanesc">
                    <label for="romanesc"style="color:blue">romanesc</label><br>

                <input type="checkbox" name="specificuri[]" value="sarbesc">
                    <label for="sarbesc"style="color:blue">sarbesc</label>

                <input type="checkbox" name="specificuri[]" value="seafood">
                    <label for="seafood"style="color:blue">seafood</label>

                <input type="checkbox" name="steakhouse" value="steakhouse">
                    <label for="steakhouse"style="color:blue">gratar</label>
                
                <input type="checkbox" name="specificuri[]" value="unguresc">
                    <label for="unguresc"style="color:blue">unguresc</label><br>

            </div>   
            </fieldset>  
            <div class="intrebare">
            <label style="color:blue">Tipul de cazare preferat: </label><br>
                
                <input type="checkbox" name="tipuri_cazari[]" value="Apartament">
                    <label for="Apartament"style="color:blue">Apartament</label>
                
                <input type="checkbox" name="tipuri_cazari[]" value="Aparthotel">
                    <label for="Aparthotel"style="color:blue">Aparthotel</label>
                
                <input type="checkbox" name="tipuri_cazari[]" value="Cabana">
                    <label for="Cabana"style="color:blue">Cabana</label>   <br>


                <input type="checkbox" name="tipuri_cazari[]" value="Camping">
                    <label for="Camping"style="color:blue">Camping</label>

                <input type="checkbox" name="tipuri_cazari[]" value="Casa de vacanta">
                    <label for="Casa de vacanta"style="color:blue">Casa de vacanta</label>
            
                <input type="checkbox" name="tipuri_cazari[]" value="Complex turistic">
                    <label for="Complex turistic"style="color:blue">Complex turistic</label>
<br>
                <input type="checkbox" name="tipuri_cazari[]" value="Hostel">
                    <label for="Hostel"style="color:blue">Hostel</label>
            
                <input type="checkbox" name="tipuri_cazari[]" value="Hotel">
                    <label for="Hotel"style="color:blue">Hotel</label>

                <input type="checkbox" name="tipuri_cazari[]" value="Motel">
                    <label for="Motel"style="color:blue">Motel</label>
<br>
                <input type="checkbox" name="tipuri_cazari[]" value="Pensiune">
                    <label for="Pensiune"style="color:blue">Pensiune</label>

                <input type="checkbox" name="tipuri_cazari[]" value="Resort">
                    <label for="Resort"style="color:blue">Resort</label>
            
                <input type="checkbox" name="tipuri_cazari[]" value="Vila">
                    <label for="Vila"style="color:blue">Vila</label>
            <br>
                </div>
            <div class="intrebare">
                <label style="color:blue">Care sunt tipurile de obiective preferate?</label><br>
                  <form action="#" method="post">
  
                  <input type="checkbox" name="obiective_tipuri[]" value="religios">
                    <label for="religios"style="color:blue">Obiectiv de tip religios</label><br>
  
                    <input type="checkbox" name="obiective_tipuri[]" value="aventuros">
                    <label for="aventuros" style="color:blue">Obiectiv de tip aventuros</label><br>
  
                    <input type="checkbox" name="obiective_tipuri[]" value="lacuri">
                    <label for="lacuri" style="color:blue">Obiectiv de tip lacuri</label><br>
  
                    <input type="checkbox"name="obiective_tipuri[]" value="cascade">
                    <label for="cascade"style="color:blue">Obiectiv de tip cascade</label><br>
  
                    <input type="checkbox" name="obiective_tipuri[]" value="bai_termale">
                    <label for="bai_termale" style="color:blue">Obiective de tip balneoclimaterice </label><br>
  
                    <input type="checkbox" name="obiective_tipuri[]" value="muzee">
                    <label for="muzee" name="muzee" style="color:blue">Obiective de tip muzee</label><br>

                    <input type="checkbox" name="obiective_tipuri[]" value="istoric">
                    <label for="istoric" name="istoric" style="color:blue">Obiectiv de tip istoric</label><br>

                    <input type="checkbox" name="obiective_tipuri[]" value="naturale">
                    <label for="naturale" name="naturale" style="color:blue">Obiective de tip natural</label><br>

                    <input type="checkbox" name="obiective_tipuri[]" value="zoo">
                    <label for="zoo" name="zoo" style="color:blue">Obiective de tip gradini zoologice</label><br>

                    <input type="checkbox" name="obiective_tipuri[]" value="planetariu">
                    <label for="planetariu" name="obiective_tipuri[]" style="color:blue">Obiective de tip planetariu</label><br>

                    <input type="checkbox" name="obiective_tipuri[]" value="acvariu_delfinariu">
                    <label for="acvariu_delfinariu" name="acvariu_delfinariu" style="color:blue">Obiective de tip avcvarii/delfinarii </label><br>

                </div>  
    
                     <input type="submit"name="submit" id="butonel" value="Trmite">
                </form>
           
        </div>
    </div>
</div>
</body>
</html>