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
    $page = "moderatori ";
    //require "header.php";
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
            <div class="head-info head-color">Pievienot jaunu moderatoru</div>
            <table class="adminTable">
            <form action="insertMod.php" method='POST'>
                <tr>
                            <th>Lietotājvārds:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Lietotajvards" placeholder="Lietotajvards" required>Ievadi moderatora lietotājvārdu*</textarea>
                                </td>
                        </tr>
                        <tr>
                        <th>Parole:</th>
                            <td>
                            <textarea rows = "1" cols = "100" name="Parole" required>Ievadi moderatora paroli*</textarea>
                                </td>
                        </tr>
                        <tr>
                            <th>Atļaujas:</th>
                            <td>
                            <textarea rows = "5" cols = "100" name="Atlaujas" required>Ievadi moderatora atļaujas*</textarea>
                                </td>
                        </tr>
                        
                        <tr> <td></td>
                            <td>
                            <input class="btn" type="submit" id="poga" name="pievienotMod" value="Pievienot">
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