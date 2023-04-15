<?php


require("./connect_db.php");
session_start();
 
if(isset($_POST['pievienotPak'])){
    $Nosaukums = $_POST['Nosaukums'];
    $Attels = $_POST['Attels'];
    $Apraksts = $_POST['Apraksts'];
    $Cena = $_POST['Cena'];

    //$lietotajaID = "SELECT lietotajs_id FROM lietotajs WHERE lietotajvards = lietotajvards";  
    


    if(!empty($Nosaukums)&& !empty($Apraksts) && !empty($Attels) && !empty($Cena)){
        $atlasit_pak_SQL = "SELECT * FROM lietotajs WHERE  lietotajvards = '$_SESSION[lietotajvards]'"; 
        $atlasa_pak = mysqli_query($savienojums, $atlasit_pak_SQL);

    }  
        while($ieraksts = mysqli_fetch_assoc($atlasa_pak)){
          $ievietotSQL = "INSERT INTO pakalpojumi(Nosaukums, Attels, Apraksts, Cena, IDlietotajs) 
VALUE ('$Nosaukums','$Attels', '$Apraksts', '$Cena', '{$ieraksts['lietotajs_id']}')";
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
    
