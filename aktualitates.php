<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apskati Latviju</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


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
                
            </ul>
        </nav>
    </header>


    <section id="jaunumi3">
    <h2>Jaunākās aktualitātes</h2>
    <article>
      <img class="imagee" src="images/sigulda.jpg">
      <h2>Atlaides Siguldā</h2>
      <p>Lielas atlaides Siguldā. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique commodi facilis vitae fugit doloribus tempore.</p>
  </article>
  <article>
      <img class="imagez" src="images/liepaja.jpg">
      <h2>Vasaras sezona Liepājā</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolore? Laudantium optio quam quos ad et maiores iste, tempora atque, mollitia.</p>
  </article>
  <article>
      <img class="imagee" src="images/ventspils.jpg">
      <h2>Jaunas atrakcijas Ventspilī</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, dolore? Laudantium optio quam quos ad et maiores iste, tempora.</p>
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