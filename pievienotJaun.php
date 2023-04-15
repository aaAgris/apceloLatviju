<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apskati Latviju</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<?php
     $page = "jaunumi";
     //require "header.php";
     session_start();
     if(!isset($_SESSION['lietotajvards'])){
         echo "Tev šeit nav pieejas!";
         header("Refresh:.01; url=index.php");
     }
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Pievienot jaunu aktualitāti</div>
            <table class="adminTable">
            <form action="insertJaun.php" method='POST'>
                <tr>
                            <th>Nosaukums:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Nosaukums" required>Ievadi aktualitātes nosaukumu*</textarea>
                                </td>
                        </tr>
                        <tr>
                        <th>Attēls:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Attels" required>Ievadi aktualitātes attela saiti*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Apraksts:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Apraksts" required>Ievadi aktualitātes aprakstu*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Datums:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Datums" required>Ievadi aktualitātes datumu gads-menesis-diena*</textarea>
                                </td>
                        </tr>

                        <tr> <td></td>
                            <td>
                            <input class="btn" type="submit" id="poga" name="pievienotJaun" value="Pievienot">
                            </td>   
                        </tr>
                        <tr>
                            <td>
                        <button class="btn" id="signUp"><a href="./index.php">Doties uz sākuma lapu</button>
                            </td>
                        </tr>
</form>
                            </table>
        </div>
    </div>
</section>

<?php
    //include "footer.php";
?>