<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Pimp My Bicycle</title>
  </head>

  <body>

    <div class="navbar">
      <?php include 'model/navbar.html' ?>
    </div>

    <div id="carouselHome" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="src/bike1" alt="Bike workshop">
          <p>zdfpoi zefopi efioj oeipfopizgfioqdv oidv   zdiofiozdf zzF</p>
        </div>
        <div class="carousel-item">
          <img src="src/bike2" alt="Wild bike">
          <p>zerohdfji poaze aizj e jzepj azejp ioj piogjoizf kdfj</p>
        </div>
        <div class="carousel-item">
          <img src="src/bike3" alt="Mountain bike">
          <p>C'EST LA TROISIEME SLIDE TA MERE</p>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <div class="homeContainer">

      <div class="bestProjects">
        <h2>Best rated projects</h2>
        <!-- Boucle for pour afficher les 10 meilleurs projets de la database ? -->
      </div>

      <div class="bestSellers">
        <h2>Best sellers</h2>
        <!-- Boucle for pour afficher les 10 meilleurs produits de la database ? -->
      </div>

    </div>

    <div class="footer">
      <p>&copy; You gotta Pimp My Bicycle !</p>
    </div>

  </body>
</html>
