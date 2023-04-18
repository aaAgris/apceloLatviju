<?php
require "header.php";

require("./connect_db.php");
if(!isset($_SESSION['lietotajvards'])){
    echo "Tev šeit nav pieejas!";
    header("Location: login.php");
exit();
}

 
if(isset($_POST['pievienotCel'])){

    // Iegust faila info
    $filename = $_FILES['service_photo']['name'];
    $tmp_file = $_FILES['service_photo']['tmp_name'];

    // Uzstada, kur fails tiks glabats
    $upload_dir = './images/';

    // Ievada failu ./images folderi
    $destination = $upload_dir . $filename;
    move_uploaded_file($tmp_file, $destination);

    $Nosaukums = $_POST['Nosaukums'];
    $Apraksts = $_POST['Apraksts'];
    $Lokacija = $_POST['Lokacija'];
    $Cena = $_POST['Cena'];

   
    if(!empty($Nosaukums)&& !empty($Apraksts) && !empty($destination) && !empty($Cena)){
        $atlasit_pak_SQL = "SELECT * FROM lietotajs WHERE  lietotajvards = '$_SESSION[lietotajvards]'"; 
        $atlasa_pak = mysqli_query($savienojums, $atlasit_pak_SQL);

    
        while($ieraksts = mysqli_fetch_assoc($atlasa_pak)){
          $ievietotSQL = "INSERT INTO galamerkis(Nosaukums, Attels, Apraksts,Lokacija, Cena, ID_lietotajs) 
VALUE ('$Nosaukums','$destination', '$Apraksts', '$Lokacija','$Cena', '{$ieraksts['lietotajs_id']}')";
        }
        
 
        if(mysqli_query($savienojums,$ievietotSQL)){
            echo "<div class='pazinojums'>DB veiksmīgi pievienots ieraksts!</div>";
            header("Refresh:1;url=index.php");
        }else{
            echo "Kļūda sistēmā!";
        }
 
    }else{
        echo  "Nav aizpildīti visi lauki!";
        header("Refresh:1;url=pievienotPak.php");
    }
    
}