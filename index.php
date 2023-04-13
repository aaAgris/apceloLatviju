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
                                        value="{$ieraksts['PakalpojumiID']}" class='btn'>
                                            Pievienot pakalpojumu <i class="fa fa-plus-circle"></i>
                                       </button>
                  </form>
                <?php endif; ?>
    
    <div class="box-container">

        <div class="box">
          <img src="images/ediens.jpg" alt="sejas maska">
          <h3>Ēdināšana</h3>
        </div>

        <div class="box">
            <img src="images/car.jpg" alt="rokas">
            <h3>Transporta īre</h3>
          
        </div>

        <div class="box">
            <img src="images/maja.jpg" alt="rokas">
            <h3>Naktsmītnes</h3>
    
        </div>

    </div>
  </section>

  <section id="celojumi">


    <h2>Ceļojumu piedāvājumi</h2>


    <article>
      <img class="imagee" src="images/jurmala.jpg">
      <h2>Jūrmala</h2>
      <p>Jūrmala ir Latvijas valstspilsēta un lielākā kūrortpilsēta, apmēram 25 kilometrus uz rietumiem no Rīgas. Pilsētas platība ir 100 km2. Jūrmala 24 km garumā stiepjas gar Rīgas līci un Lielupi. 2020. gadā bija 49 687 iedzīvotāji.

        Pilsēta tradicionāli sastāv no atsevišķām daļām (uzskaitītas virzienā no rietumiem uz austrumiem): Ķemeri, Jaunķemeri, Sloka, Kauguri, Vaivari, Asari, Valteri, Melluži, Pumpuri, Jaundubulti, Dubulti, Majori, Dzintari, Bulduri, Lielupe un Priedaine.</p>
  </article>
  <article>
      <img class="imagez" src="images/liepaja.jpg">
      <h2>Liepāja</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolore? Laudantium optio quam quos ad et maiores iste, tempora atque, mollitia eius soluta expedita reprehenderit a voluptatem. Natus, aperiam quod.</p>
  </article>
  <article>
      <img class="imagee" src="images/ventspils.jpg">
      <h2>Ventspils</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolore? Laudantium optio quam quos ad et maiores iste, tempora atque, mollitia eius soluta expedita reprehenderit a voluptatem. Natus, aperiam quod.</p>
  </article>



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
        <input type='text' placeholder='Vārds' class='input-line full-width' required></input>
        <input type='text' placeholder='Uzvārds' class='input-line full-width' required></input>
        <label >Dzimšanas dati:</label><br>
        <input type="date" id="birth" name="birth" class="input-line full-width" required><br>
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
        <input type='email' placeholder='E-Pasts' class='input-line full-width'></input>
        <label >Komentārs:</label><br>
        <input type="text" id="koment" class="input-line full-width" name="koment"><br>
      </div>
      <div><button class='ghost-round full-width'>Pieteikties ceļojumam</button></div>
    </div>
  </div>
</div>

</div>
  </section>

  <section id="jaunumi">
    <h2>Jaunākās aktualitātes</h2>
    <article>
      <img class="imagee" src="images/sigulda.jpg">
      <h2>Atlaides Siguldā</h2>
      <p>Jūrmala ir Latvijas valstspilsēta un lielākā kūrortpilsēta, apmēram 25 kilometrus uz rietumiem no Rīgas. Pilsētas platība ir 100 km2. Jūrmala 24 km garumā stiepjas gar Rīgas līci un Lielupi. 2020. gadā bija 49 687 iedzīvotāji.

        Pilsēta tradicionāli sastāv no atsevišķām daļām (uzskaitītas virzienā no rietumiem uz austrumiem): Ķemeri, Jaunķemeri, Sloka, Kauguri, Vaivari, Asari, Valteri, Melluži, Pumpuri, Jaundubulti, Dubulti, Majori, Dzintari, Bulduri, Lielupe un Priedaine.</p>
  </article>
  <article>
      <img class="imagez" src="images/liepaja.jpg">
      <h2>Vasaras sezona Liepājā</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolore? Laudantium optio quam quos ad et maiores iste, tempora atque, mollitia eius soluta expedita reprehenderit a voluptatem. Natus, aperiam quod.</p>
  </article>
  <article>
      <img class="imagee" src="images/ventspils.jpg">
      <h2>Jaunas atrakcijas Ventspilī</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolore? Laudantium optio quam quos ad et maiores iste, tempora atque, mollitia eius soluta expedita reprehenderit a voluptatem. Natus, aperiam quod.</p>
  </article>
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

