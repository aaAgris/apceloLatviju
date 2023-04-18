<?php
    require "./connect_db.php";
    require "header.php";
    
    
    if(isset($_POST['delete'])){
        $izdzest_pieteikumu_SQL = "DELETE FROM pieteikums
        WHERE Pieteikums_ID = ".$_POST['delete'];
        if(mysqli_query($savienojums, $izdzest_pieteikumu_SQL)){
            echo "<div class='pieteiksanaskluda zals'>Pieteikums veiksmīgi izdzēšts!</div>";
            header("Refresh:1; url=pieteikumi.php"); 
        }else{
            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
            header("Refresh:1; url=pieteikumi.php");
        }
    }

  

 
?>