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
session_start();
?>


<body>
<header>
        <div class="logo"> <img src="images/ApskatiLV_Logo.png"></div>
        <nav class="nav">
            <ul>
                <li><a href="./index.php#home">Sākums</a></li>
                <li><a href="./index.php#pakalpojumi">Pakalpojumi</a></li>
                <li><a href="./index.php#celojumi">Ceļojumi</a></li>
                <li><a href="./index.php#pieteikties">Pieteikties</a></li>
                <li><a href="./index.php#jaunumi">Jaunumi</a></li>
                <li><a href="./index.php#parmums">Par Mums</a></li>
                <li><a href="./login.php"><i class="fa fa-lock"></i></a></li>
                
                <?php
                 if(isset($_SESSION['lietotajvards'])): ?>
                  <li><a href="logout.php">Izlogoties</a></li>
                <?php endif; ?>
                

                <?php
                if(isset($_SESSION['lietotajvards'])){ 
                  $is_admin = $_SESSION['irAdmins'];
                  if($is_admin){
                    echo "
                  <li><a href='moderatori.php'>Moderatori</a></li>
                  ";
                  }
                }?>
                
            </ul>
        </nav>
    </header>