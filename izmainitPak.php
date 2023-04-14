<!--<
    $page = "pakalpojumi";
    //require "header.php";
?>-->

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Pakalpojuma info:</div>
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    require "./connect_db.php";

                    
                    if(isset($_POST['rediget'])){
                        $atlasitais_Attels = $_POST['Attels'];
                        $atlasitais_Apraksts = $_POST['Apraksts'];
                        $atlasitais_Nosaukums = $_POST['Nosaukums'];
                        $atlasita_Cena = $_POST['Cena'];
                        $atlasitais_Liet = $_POST['IDLietotajs'];
                        
                        
                        $atjaunot_attelu_SQL = "UPDATE pakalpojumi SET Attels = 
                        '$atlasitais_Attels' WHERE Pakalpojumi_ID = ".$_POST['rediget'];

                        $atjaunot_aprakstu_SQL = "UPDATE pakalpojumi SET Apraksts = 
                        '$atlasitais_Apraksts' WHERE Pakalpojumi_ID = ".$_POST['rediget'];

                        $atjaunot_nosaukumu_SQL = "UPDATE pakalpojumi SET Nosaukums = 
                        '$atlasitais_Nosaukums' WHERE Pakalpojumi_ID = ".$_POST['rediget'];

                        $atjaunot_cenu_SQL = "UPDATE pakalpojumi SET Cena = 
                        '$atlasita_Cena' WHERE Pakalpojumi_ID = ".$_POST['rediget'];

                        $atjaunot_liet_SQL = "UPDATE pakalpojumi SET IDLietotajs = 
                        '$atlasitais_Liet' WHERE Pakalpojumi_ID = ".$_POST['rediget'];
        
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

                        if(mysqli_query($savienojums, $atjaunot_cenu_SQL)){
                            
                            header("Refresh:1; url=index.php"); 
                        }else{
                          
                            header("Refresh:1; url=index.php");
                        }

                        if(mysqli_query($savienojums, $atjaunot_liet_SQL)){
                            
                            header("Refresh:1; url=index.php"); 
                        }else{
                          
                            header("Refresh:1; url=index.php");
                        }


                    }else{

                    $pakID = $_POST['izmainit'];
                    $atlasit_pakalpojumu_SQL = "SELECT * FROM pakalpojumi WHERE Pakalpojumi_ID = $pakID"; 
                    echo $atlasit_pakalpojumu_SQL;  
                    $atlasa_pakalpojumu = mysqli_query($savienojums, $atlasit_pakalpojumu_SQL);


                    while($ieraksts = mysqli_fetch_assoc($atlasa_pakalpojumu)){
                        echo "
                        <form action='izmainitPak.php' method='POST'>
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
                                <td>
                                Apraksts:
                                </td>
                                <td class='value'>
                                <textarea rows = '5' cols = '60' 
                                name = 'Apraksts'>{$ieraksts['Apraksts']}}</textarea>
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
                                <td>Cena:
                                </td>
                                <td class='value'><textarea rows = '5' cols = '60' 
                                name = 'Cena'>{$ieraksts['Cena']}</textarea>
                                <td>
                            </tr>

                            <tr>
                            <td>IDLietotajs:
                            </td>
                            <td class='value'><textarea rows = '5' cols = '60' 
                            name = 'IDLietotajs'>{$ieraksts['IDLietotajs']}</textarea>
                            <td>
                        </tr>
                            
                            <tr><td>
                                <button class='btn' type='submit' name='rediget' value='{$ieraksts['Pakalpojumi_ID']}'>
                                    Saglabāt</button>
                            </td></tr>
                            
                            </table>
                            </form>
                        ";
                    }

                }}else{
                    echo "<div class='pieteiksanaskluda sarkans'>Kaut kas nogāja greizi!
                    Atgriezies iepriekšējā lapā un mēģini vēlreiz!</div>";
                    header("Refresh:1; url=izmainitPak.php");
                }
            ?>
        </div>
    </div>
</section>

<?php
   // include "footer.php";
?>