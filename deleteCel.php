<?php
require "./connect_db.php";
require "header.php";

if(isset($_POST['delete'])){
    $izdzest_ierakstu_SQL = "DELETE FROM galamerkis 
        WHERE GalamID = ".$_POST['delete'].";";
    $izdzest_pieteikumu_SQL = "DELETE FROM pieteikums 
        WHERE IDGalam = ".$_POST['delete'].";";

    if(mysqli_multi_query($savienojums, $izdzest_ierakstu_SQL.$izdzest_pieteikumu_SQL)){
        echo "<div class='pieteiksanaskluda zals'>Ceļojums veiksmīgi izdzēsts!</div>";
        header("Refresh:1; url=index.php"); 
    }else{
        echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
        header("Refresh:1; url=index.php");
    }
}
?>
