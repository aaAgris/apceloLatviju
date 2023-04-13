<?php
require("../files/connect_db.php");
 
if(isset($_POST['pievienotSpec'])){
    $Nosaukums = $_POST['Nosaukums'];
    $Apraksts = $_POST['Apraksts'];
    $Attels = $_POST['Attels'];

 
    if(!empty($Nosaukums)&& !empty($Apraksts) && !empty($Attels)){
        $ievietotSQL = "INSERT INTO specialitates(Nosaukums, Apraksts, Attels_URL) 
        VALUE ('$Nosaukums','$Apraksts', '$Attels')";
 
        if(mysqli_query($savienojums,$ievietotSQL)){
            echo "DB veiksmīgi pievienots ieraksts!";
            header("Refresh:1;url=specialitates.php");
        }else{
            echo "Kļūda sistēmā!";
        }
 
    }else{
        echo  "Nav aizpildīti visi lauki!";
        header("Refresh:1;url=pievienotSpec.php");
    }
}