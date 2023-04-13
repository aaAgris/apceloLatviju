<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Svarīgas lietas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="shortcut icon" href="image.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="nosaukums">
                <?php
                    session_start();
                    
                    if(isset($_SESSION['Lietotajvards'])){
                        /*echo "Sveicināts, ".($_SESSION['Lietotajvards'])."!";
                        echo "<a href='admin/logout.php' class='izlogoties'>Izlogoties</a>";*/
                        header("Refresh:1; url=index.php");
                    }else{
                        header("Refresh:1; url=login.php");
                        echo "Tev šeit nav pieejas!";
                    }
                ?>
            </div>
       
</div>
</div>
</body>
</html>