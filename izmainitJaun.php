<?php
    $page = "jaunumi";
    require "header.php";
    session_start();
    if(!isset($_SESSION['lietotajvards'])){
        echo "Tev šeit nav pieejas!";
        header("Location: login.php");
    exit();
    }
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Aktualitāšu info:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "./connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_Attels = $_POST['Attels'];
                        $atlasitais_Apraksts = $_POST['Apraksts'];
                        $atlasitais_Nosaukums = $_POST['Nosaukums'];
                        $atlasitais_Datums = $_POST['Datums'];
                        
                        
                        $atjaunot_attelu_SQL = "UPDATE jaunumi SET Attels = 
                        '$atlasitais_Attels' WHERE JaunumiID = ".$_POST['rediget'];

                        $atjaunot_aprakstu_SQL = "UPDATE jaunumi SET Apraksts = 
                        '$atlasitais_Apraksts' WHERE JaunumiID = ".$_POST['rediget'];

                        $atjaunot_nosaukumu_SQL = "UPDATE jaunumi SET Nosaukums = 
                        '$atlasitais_Nosaukums' WHERE JaunumiID = ".$_POST['rediget'];

                        $atjaunot_datumu_SQL = "UPDATE jaunumi SET Datums = 
                        '$atlasitais_Datums' WHERE JaunumiID = ".$_POST['rediget'];

        
                        if(mysqli_query($savienojums, $atjaunot_attelu_SQL)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=index.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=index.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_aprakstu_SQL)){
                            
                            header("Refresh:1; url=index.php"); 
                        }else{
                           
                            header("Refresh:1; url=index.php"); 
                        }

                        if(mysqli_query($savienojums, $atjaunot_nosaukumu_SQL)){
                            
                            header("Refresh:1; url=index.php"); 
                        }else{
                          
                            header("Refresh:1; url=index.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_datumu_SQL)){
                            
                            header("Refresh:1; url=index.php"); 
                        }else{
                          
                            header("Refresh:1; url=index.php");
                        }

                        




                    }else{

                    $JaunID = $_POST['izmainit'];
                    $atlasit_jaunumus_SQL = "SELECT * FROM jaunumi WHERE JaunumiID = $JaunID";  
                    $atlasa_jaunumus = mysqli_query($savienojums, $atlasit_jaunumus_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_jaunumus)){
                        echo "
                        <form action='izmainitJaun.php' method='POST'>
                            <table>
                            <tr>
                                <td>
                                Aktualitāte:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Nosaukums'>{$ieraksts['Nosaukums']}</textarea>
                                <td>
                            </tr>

                            <tr>
                                <td>Attēls:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Attels'>{$ieraksts['Attels']}</textarea>
                                <td>
                            </tr>

                            <tr>
                                <td>
                                Apraksts:
                                </td>
                                <td class='value'>
                                <textarea rows = '5' cols = '60' 
                                name = 'Apraksts'>{$ieraksts['Apraksts']}</textarea>
                                <td>
                            </tr>

                            <tr>
                                <td>Datums:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Datums'>{$ieraksts['Datums']}</textarea>
                                <td>
                            </tr>
                            
                            <tr><td>
                                <button class='btn' type='submit' name='rediget' value='{$ieraksts['JaunumiID']}'>
                                    Saglabāt</button>
                            </td></tr>
                            
                            </table>
                            </form>
                        ";
                    }

                }}else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kaut kas nogāja greizi!
                    Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:1; url=izmainitJaun.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
   // include "footer.php";
?>