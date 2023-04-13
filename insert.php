<?php


require("./connect_db.php");
 
if(isset($_POST['pievienotPak'])){
    $Nosaukums = $_POST['Nosaukums'];
    $Attels = $_POST['Attels'];
    $Apraksts = $_POST['Apraksts'];
    $Cena = $_POST['Cena'];
    $lietotajaID = $_POST['IDLietotajs'];

    //$lietotajaID = "SELECT lietotajs_id FROM lietotajs";  


    if(!empty($Nosaukums)&& !empty($Apraksts) && !empty($Attels) && !empty($Cena)){
       
        $ievietotSQL = "INSERT INTO pakalpojumi(Nosaukums, Attels, Apraksts, Cena, IDlietotajs) 
        VALUE ('$Nosaukums','$Attels', '$Apraksts', '$Cena', $lietotajaID)";
 
        if(mysqli_query($savienojums,$ievietotSQL)){
            echo "DB veiksmīgi pievienots ieraksts!";
            header("Refresh:1;url=index.php");
        }else{
            echo "Kļūda sistēmā!";
        }
 
    }else{
        echo  "Nav aizpildīti visi lauki!";
        header("Refresh:1;url=pievienotPak.php");
    }
    }
