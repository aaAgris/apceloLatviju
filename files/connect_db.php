<?php
$servera_vards = "localhost:3307"; //varbūt localhost:3307 /localhost:3307
$lietotajvards = "root";
$parole = "";
$db_vards = "uznemsana";
 
$savienojums = mysqli_connect($servera_vards, $lietotajvards, $parole, $db_vards);
 
 
if(!$savienojums){
    die("Pieslēgties neizdevās: ".mysqli_connect_error());
}else{
   // echo "Savienojums ar DB veiksmīgi izveidots!";
}
?>