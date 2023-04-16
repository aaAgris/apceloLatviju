<?php


require("./connect_db.php");
session_start();

if(!isset($_SESSION['lietotajvards'])){
    echo "Tev šeit nav pieejas!";
    header("Location: login.php");
exit();
}

if(isset($_POST['pievienotMod'])){
    $Lietotajvards = $_POST['Lietotajvards'];
    $Parole = $_POST['Parole'];
    $Atlaujas = $_POST['Atlaujas'];
    

    if(!empty($Lietotajvards)&& !empty($Parole)){
        $ievietotSQL = "INSERT INTO lietotajs(lietotajvards, parole, irAdmins) 
        VALUE ('$Lietotajvards','$Parole', '$Atlaujas')";
 
        if(mysqli_query($savienojums,$ievietotSQL)){
            echo "DB veiksmīgi pievienots ieraksts!";
            header("Refresh:1;url=moderatori.php");
        }else{
            echo "Kļūda sistēmā!";
        }
 
    }else{
        echo  "Nav aizpildīti visi lauki!";
        header("Refresh:1;url=pievienotMod.php");
    }
}
