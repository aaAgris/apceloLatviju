<?php
    require "./connect_db.php";
    require "header.php";

    
    if(isset($_POST['delete'])){
        $izdzest_ierakstu_SQL = "DELETE FROM jaunumi 
        WHERE JaunumiID = ".$_POST['delete'];
        if(mysqli_query($savienojums, $izdzest_ierakstu_SQL)){
            echo "<div class='pieteiksanaskluda zals'>Aktualitāte veiksmīgi izdzēsta!</div>";
            header("Refresh:1; url=index.php"); 
        }else{
            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
            header("Refresh:1; url=index.php");
        }
    }

  

 
?>