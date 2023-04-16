<?php
    $page = "celojumi";
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
            <div class="head-info head-color">Ceļojuma info:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "./connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_Attels = $_POST['Attels'];
                        $atlasitais_Apraksts = $_POST['Apraksts'];
                        $atlasitais_Nosaukums = $_POST['Nosaukums'];
                        $atlasita_Cena = $_POST['Cena'];
                        $atlasita_Lokacija = $_POST['Lokacija'];
                        
                        
                        $atjaunot_attelu_SQL = "UPDATE galamerkis SET Attels = 
                        '$atlasitais_Attels' WHERE GalamID = ".$_POST['rediget'];

                        $atjaunot_aprakstu_SQL = "UPDATE galamerkis SET Apraksts = 
                        '$atlasitais_Apraksts' WHERE GalamID = ".$_POST['rediget'];

                        $atjaunot_nosaukumu_SQL = "UPDATE galamerkis SET Nosaukums = 
                        '$atlasitais_Nosaukums' WHERE GalamID = ".$_POST['rediget'];

                        $atjaunot_lokaciju_SQL = "UPDATE galamerkis SET Lokacija = 
                        '$atlasita_Lokacija' WHERE GalamID = ".$_POST['rediget'];

                        $atjaunot_cenu_SQL = "UPDATE galamerkis SET Cena = 
                        '$atlasita_Cena' WHERE GalamID = ".$_POST['rediget'];

                        

        
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

                        if(mysqli_query($savienojums, $atjaunot_lokaciju_SQL)){
                            
                            header("Refresh:1; url=index.php"); 
                        }else{
                          
                            header("Refresh:1; url=index.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_cenu_SQL)){
                            
                            header("Refresh:1; url=index.php"); 
                        }else{
                          
                            header("Refresh:1; url=index.php");
                        }

                        




                    }else{

                    $pakID = $_POST['izmainit'];
                    $atlasit_pakalpojumu_SQL = "SELECT * FROM galamerkis WHERE GalamID = $pakID"; 
                    echo $atlasit_pakalpojumu_SQL;  
                    $atlasa_pakalpojumu = mysqli_query($savienojums, $atlasit_pakalpojumu_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_pakalpojumu)){
                        echo "
                        <form action='izmainitCel.php' method='POST'>
                            <table>
                            <tr>
                                <td>
                                Pakalpojums:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Nosaukums'>{$ieraksts['Nosaukums']}</textarea>
                                <td>
                            </tr>

                            <tr>
                                <td>Attels:
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
                                <td>Lokācija:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Lokacija'>{$ieraksts['Lokacija']}</textarea>
                                <td>
                            </tr>
                            
                            <tr>
                                <td>Cena:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Cena'>{$ieraksts['Cena']}</textarea>
                                <td>
                            </tr>

                            
                            <tr><td>
                                <button class='btn' type='submit' name='rediget' value='{$ieraksts['GalamID']}'>
                                    Saglabāt</button>
                            </td></tr>
                            
                            </table>
                            </form>
                        ";
                    }

                }}else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kaut kas nogāja greizi!
                    Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:1; url=izmainitCel.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
   // include "footer.php";
?>