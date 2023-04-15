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
                <li><a href="#home">Sākums</a></li>
                <li><a href="#pakalpojumi">Pakalpojumi</a></li>
                <li><a href="#celojumi">Ceļojumi</a></li>
                <li><a href="#pieteikties">Pieteikties</a></li>
                <li><a href="#jaunumi">Jaunumi</a></li>
                <li><a href="#parmums">Par Mums</a></li>
                <li><a href="./login.php"><i class="fa fa-lock"></i></a></li>
                
                <?php
                 if(isset($_SESSION['lietotajvards'])): ?>
                  <li><a href="logout.php">Izlogoties</a></li>
                <?php endif; ?>
                
            </ul>
        </nav>
    </header>

    <!--<button onClick="openForm()"><i class="fa fa-lock"></i></button> -->
    
<section  id="home">
<div class="slideShow">

    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="images/riga.jpg" style="width:100%">
      <div class="text">Rīga</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="images/sigulda.jpg" style="width:100%">
      <div class="text">Sigulda</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext"></div>
      <img src="images/liepaja2.jpg" style="width:100%">
      <div class="text">Liepāja</div>
    </div>
  
  </div>
  <br>

</section>

  <section id="pakalpojumi">

    <h2>Mēs piedāvājam vairākus pakalpojumus</h2>
    <?php
                 if(isset($_SESSION['lietotajvards'])): ?>
                  <form action='pievienotPak.php' method='post'>
                                        <button type='submit' name='pievienot' 
                                        value="{$ieraksts['Pakalpojumi_ID']}" class='btn'>
                                            Pievienot pakalpojumu <i class="fa fa-plus-circle"></i>
                                       </button>
                  </form>
                  <?php 
                  require "./connect_db.php";
                  $atlasit_pak_SQL = "SELECT * FROM pakalpojumi"; 
                  $atlasa_pak = mysqli_query($savienojums, $atlasit_pak_SQL);

                 /* while($ieraksts = mysqli_fetch_assoc($atlasa_pak)){
                    echo "<form action='izmainitPak.php' method='post'>
                    <button type='submit' name='izmainit' 
                    value='{$ieraksts['Pakalpojumi_ID']}' class='btn2'><i class='fa fa-edit'></i>
                    </button>
                  </form>
                  <form action='deletePak.php' method='post'>
                    <button type='submit' name='delete' 
                    value='{$ieraksts['Pakalpojumi_ID']}' class='btn2'><i class='fa fa-trash'></i>
                    </button>
                  </form> ";
                  }*/
                  ?>
                 
                <?php endif; ?>
    
    <div class="box-container">
    <?php
                    require "./connect_db.php";
                    $atlasit_pak_SQL = "SELECT * FROM pakalpojumi"; 
                    $atlasa_pak = mysqli_query($savienojums, $atlasit_pak_SQL);

                    while($ieraksts = mysqli_fetch_assoc($atlasa_pak)){
                        echo "
                        <div class='box'>
                        <img src='{$ieraksts['Attels']}'>
                        <h3>{$ieraksts['Nosaukums']}</h3>
                        <p> {$ieraksts['Apraksts']}</p>
                        <p> {$ieraksts['Cena']} EUR</p>   
                      
                      ";
                      if(isset($_SESSION['lietotajvards'])){
                        echo "<form action='izmainitPak.php' method='post'>
                        <button type='submit' name='izmainit' 
                        value='{$ieraksts['Pakalpojumi_ID']}' class='btn2'><i class='fa fa-edit'></i>
                        </button>
                      </form>
                      <form action='deletePak.php' method='post'>
                        <button type='submit' name='delete' 
                        value='{$ieraksts['Pakalpojumi_ID']}' class='btn2'><i class='fa fa-trash'></i>
                        </button>
                      </form> 
                        ";
                      }

                      echo 
                      "</div> ";
                    }
        ?>
    </div>
  </section>

  <section id="celojumi">


    <h2>Ceļojumu piedāvājumi</h2>
    <?php
                 if(isset($_SESSION['lietotajvards'])): ?>
                  <form action='pievienotCel.php' method='post'>
                                        <button type='submit' name='pievienot' 
                                        value="{$ieraksts['GalamID']}" class='btn'>
                                            Pievienot ceļojumu <i class="fa fa-plus-circle"></i>
                                       </button>
                  </form>
                <?php endif; ?>

    <?php
                    require "./connect_db.php";
                    $atlasit_cel_SQL = "SELECT * FROM galamerkis"; 
                    $atlasa_cel = mysqli_query($savienojums, $atlasit_cel_SQL);

                    while($ieraksts = mysqli_fetch_assoc($atlasa_cel)){
                        echo "
                        <article>
                        <img src ={$ieraksts['Attels']} class='imagee'>
                        <h2>{$ieraksts['Nosaukums']}</h2>
                        <p>{$ieraksts['Apraksts']}</p>
                        <p>{$ieraksts['Lokacija']}</p>
                        <p>{$ieraksts['Cena']} EUR</p>
                        <button class='pieteiktPog'><a href='#pieteikties'>Pieteikties</a></button>
                       ";

                        if(isset($_SESSION['lietotajvards'])){
                          echo " <form action='izmainitCel.php' method='post'>
                        <button type='submit' name='izmainit' 
                        value='{$ieraksts['GalamID']}' class='btn'>
                        Rediget ceļojumu <i class='fa fa-edit'></i>
                        </button>
                       </form>
                     <form action='deleteCel.php' method='post'>
                      <button type='submit' name='delete' 
                      value='{$ieraksts['GalamID']}' class='btn'>
                        Izdzēst ceļojumu<i class='fa fa-trash'></i>
                     </button>
                     </form> 
                        
                        ";
                        }
                        echo 
                    "  </article>";

                     } 
                  
        ?>

  </section>


  <section id="pieteikties">
    <h2>Piesakies kādam no mūsu ceļojumiem</h2>
      <div class='bold-line'></div>
<div class='container'>
  <img id="pic-form" src="images/form.jpeg" alt="liepaja">
  <div class='window'>
    <div class='overlay'></div>
    <div class='content'>
      <div class='welcome'>Piesakies šeit!</div>
      <div class='input-fields'>
        <form action='entry.php' method='POST'>
        <input type='text' placeholder='Vārds' name="vards" class='input-line full-width' required></input>
        <input type='text' placeholder='Uzvārds' name="uzvards" class='input-line full-width' required></input>
        <label >Dzimšanas dati:</label><br>
        <input type="date" id="birth" name="dzimDati" class="input-line full-width" required><br>
        <label >Ceļojums:</label><br>
        <select name = "dropdown" class="input-line full-width" required>
            <option value = "Riga" selected>Rīga</option>
            <option value = "Liepaja">Liepāja</option>
            <option value = "Ventspils">Ventspils</option>
            <option value = "Jurmala">Jūrmala</option>
            <option value = "Sigulda">Sigulda</option>
         </select> <br>
         <label >Līdzbraucēju skaits:</label><br>
         <input type="number" id="skaits" class='input-line full-width' name="skaits"><br>
         <label >Telefona numurs:</label><br>
         <input type="text" id="nr" name="nr" value="+371 " class='input-line full-width' required><br>
        <input type='email' placeholder='E-Pasts' name="epasts" class='input-line full-width'></input>
        <label >Komentārs:</label><br>
        <input type="text" id="koment" class="input-line full-width" name="koment"><br>
      </div>
      <div><button class='ghost-round full-width' type="submit" name="gatavs">Pieteikties ceļojumam</button></div>
      </form>
    </div>
  </div>
</div>

</div>
  </section>

  <section id="jaunumi">
    <h2>Jaunākās aktualitātes</h2>
    <?php
                 if(isset($_SESSION['lietotajvards'])): ?>
                  <form action='pievienotJaun.php' method='post'>
                                        <button type='submit' name='pievienot' 
                                        value="{$ieraksts['JaunumiID']}" class='btn'>
                                            Pievienot aktualitāti <i class="fa fa-plus-circle"></i>
                                       </button>
                  </form>
                <?php endif; ?>

    <?php
                    require "./connect_db.php";
                    $atlasit_jaun_SQL = "SELECT * FROM jaunumi"; 
                    $atlasa_jaun = mysqli_query($savienojums, $atlasit_jaun_SQL);

                    while($ieraksts = mysqli_fetch_assoc($atlasa_jaun)){
                        echo "
                        <article>
                        <img src ={$ieraksts['Attels']} class='imagez'>
                        <h2>{$ieraksts['Nosaukums']}</h2>
                        <p>{$ieraksts['Apraksts']}</p>
                        <p>{$ieraksts['Datums']}</p>
                        <button class='pieteiktPog'><a href='./aktualitates.php'>Apskatīt</a></button>
                     ";

                    if(isset($_SESSION['lietotajvards'])){
                      echo " <form action='izmainitJaun.php' method='post'>
                    <button type='submit' name='izmainit' 
                    value='{$ieraksts['JaunumiID']}' class='btn'>
                    Rediget aktualitāti <i class='fa fa-edit'></i>
                    </button>
                   </form>
                 <form action='deleteJaun.php' method='post'>
                  <button type='submit' name='delete' 
                  value='{$ieraksts['JaunumiID']}' class='btn'>
                    Izdzēst aktualitāti<i class='fa fa-trash'></i>
                 </button>
                 </form> 
                    
                    ";
                    }
                    echo 
                    "  </article>";
                  }
     ?>                   

  </section>

  <footer id="parmums">
    <div class="footer">
    <div class="row">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-instagram"></i></a>
    <a href="#"><i class="fa fa-youtube"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    </div>
    
    <div class="row">
    <ul>
    <li><a href="#pakalpojumi">Pakalpojumi</a></li>
    <li><a href="#celojumi">Ceļojumi</a></li>
    <li><a href="#jaunumi">Jaunumi</a></li>
    <li><a href="#">Kontakti</a></li>
    <li><a href="#">Privātuma Politika</a></li>
    </ul>
    </div>
    
    <div class="row">
     © Liepājas Valsts tehnikums 2023 || Annija Zorgenberga, Agris Antans
    </div>
    </div>
    </footer>






  <script src="script.js"></script>
</body>
</html>

