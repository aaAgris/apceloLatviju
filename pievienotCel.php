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
     $page = "celojumi";
     require "header.php";
     if(!isset($_SESSION['lietotajvards'])){
        echo "Tev šeit nav pieejas!";
        header("Location: login.php");
    exit();
    }
?>

<section class="admin">
    <div class="row">
        <div class="info">
            <div class="head-info head-color">Pievienot jaunu ceļojumu</div>
            <table class="adminTable">
            <form action="insertCel.php" method='POST' enctype="multipart/form-data">
                <tr>
                            <th>Nosaukums:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Nosaukums" required>Ievadi ceļojuma nosaukumu*</textarea>
                                </td>
                        </tr>
                        <tr>
                        <th><label for="service-photo">Ceļojuma attēls*</label></th>
                            <td>
                             <input type="file" id="service-photo" name="service_photo" required><br>
                                </td>
                        </tr>
                        <tr>
                            <th>Apraksts:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Apraksts" required>Ievadi ceļojuma aprakstu*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Lokācija:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Lokacija" required>Ievadi ceļojuma lokācija*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Cena:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Cena" required>Ievadi ceļojuma cenu*</textarea>
                                </td>
                        </tr>
                        
                            
                        
                        <tr> <td></td>
                            <td>
                            <input class="btn" type="submit" id="poga" name="pievienotCel" value="Pievienot">
                            </td>   
                        </tr>
                        <tr>
                            <td>
                        <button class="btn" id="signUp"><a href="./index.php#home">Doties uz sākuma lapu</button>
                            </td>
                        </tr>
</form>
                            </table>
        </div>
    </div>
</section>

<?php
    include "footer.php";
?>