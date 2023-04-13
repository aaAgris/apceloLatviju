<?php
    $page = "specialitates";
    require "header.php";
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Specialitates info:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "../files/connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_Attels = $_POST['Attels'];
                        $atlasitais_Apraksts = $_POST['Apraksts'];
                        $atlasitais_Nosaukums = $_POST['Nosaukums'];
                        
                        
                        $atjaunot_attelu_SQL = "UPDATE specialitates SET Attels_URL = 
                        '$atlasitais_Attels' WHERE Specialitates_ID = ".$_POST['rediget'];

                        $atjaunot_aprakstu_SQL = "UPDATE specialitates SET Apraksts = 
                        '$atlasitais_Apraksts' WHERE Specialitates_ID = ".$_POST['rediget'];

                        $atjaunot_nosaukumu_SQL = "UPDATE specialitates SET Nosaukums = 
                        '$atlasitais_Nosaukums' WHERE Specialitates_ID = ".$_POST['rediget'];
        
                        if(mysqli_query($savienojums, $atjaunot_attelu_SQL)){
                            echo "<div class='pieteiksanaskluda zals'>Izmaiņas veiksmīgi veiktas!</div>";
                            header("Refresh:1; url=specialitates.php"); 
                        }else{
                            echo "<div class='pieteiksanaskluda sarkans'>Kļūda sistēmā!</div>";
                            header("Refresh:1; url=specialitates.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_aprakstu_SQL)){
                            
                            header("Refresh:1; url=specialitates.php"); 
                        }else{
                           
                            header("Refresh:1; url=specialitates.php"); 
                        }

                        if(mysqli_query($savienojums, $atjaunot_nosaukumu_SQL)){
                            
                            header("Refresh:1; url=specialitates.php"); 
                        }else{
                          
                            header("Refresh:1; url=specialitates.php");
                        }


                    }else{

                    $specID = $_POST['apskatit'];
                    $atlasit_specialitati_SQL = "SELECT * FROM specialitates 
                    WHERE Specialitates_ID = $specID"; 
                    $atlasa_specialitati = mysqli_query($savienojums, $atlasit_specialitati_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_specialitati)){
                        echo "
                        <form action='specialitate.php' method='POST'>
                            <table>
                            <tr><td>Specialitate:</td><td class='value'><textarea rows = '5' cols = '60' 
                            name = 'Nosaukums'>{$ieraksts['Nosaukums']}</textarea>
                            <td>
                            </tr>
                            <tr><td>Apraksts:</td><td class='value'><textarea rows = '5' cols = '60' 
                            name = 'Apraksts'>{$ieraksts['Apraksts']}}</textarea>
                            <td>
                            </tr>
                            <tr><td>Attels:</td><td class='value'><textarea rows = '5' cols = '60' 
                            name = 'Attels'>{$ieraksts['Attels_URL']}</textarea>
                            <td>
                            </tr>
                            <tr><td>
                                <button class='btn' type='submit' name='rediget' value='{$ieraksts['Specialitates_ID']}'>
                                    Saglabāt</button>
                            </td></tr>
                            
                            </table>
                            </form>
                        ";
                    }

                }}else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kaut kas nogāja greizi!
                    Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:1; url=specialitate.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>