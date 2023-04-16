<?php


require("./connect_db.php");
session_start();
if(!isset($_SESSION['lietotajvards'])){
    echo "Tev šeit nav pieejas!";
    header("Location: login.php");
exit();
}
 
if(isset($_POST['pievienotJaun'])){
    $Nosaukums = $_POST['Nosaukums'];
    $Attels = $_POST['Attels'];
    $Apraksts = $_POST['Apraksts'];
    $Datums = $_POST['Datums'];

   
    if(!empty($Nosaukums)&& !empty($Apraksts) && !empty($Attels) && !empty($Datums)){
        $atlasit_pak_SQL = "SELECT * FROM lietotajs WHERE  lietotajvards = '$_SESSION[lietotajvards]'"; 
        $atlasa_pak = mysqli_query($savienojums, $atlasit_pak_SQL);

    }  
        while($ieraksts = mysqli_fetch_assoc($atlasa_pak)){
          $ievietotSQL = "INSERT INTO jaunumi(Nosaukums, Attels, Apraksts,Datums, IDlietotajs) 
VALUE ('$Nosaukums','$Attels', '$Apraksts', '$Datums','{$ieraksts['lietotajs_id']}')";
        }
        
 
        if(mysqli_query($savienojums,$ievietotSQL)){
            echo "<div class='pazinojums'>DB veiksmīgi pievienots ieraksts!</div>";
            header("Refresh:1;url=index.php");
        }else{
            echo "Kļūda sistēmā!";
        }
 
    }else{
        echo  "Nav aizpildīti visi lauki!";
        header("Refresh:1;url=pievienotJaun.php");
    }
    
