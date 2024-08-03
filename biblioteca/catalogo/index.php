<?php
include 'app/conexion.php';


// Consulta para obtener los datos de los libros
$sql = "SELECT titulo, autor, img, asignatura, codigoisbn
        FROM libro "; // Solo libros activos
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Biblioteca ISTLT</title>
  <link href="./styles.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&family=Montserrat:ital,wght@0,100;0,200;0,300;1,100;1,200;1,300&family=Roboto:wght@300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Navigation -->
  <header id="header">
    <div class="main">
      <div class="logo">
        <a class="logo" href="#"></a>
        <img src="assets/image.png" alt="Logo" />
      </div>
      <div class="search">
        <form action="busqueda/busqueda.php" method="get">
          <div class="input-group">
            <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" name="query" placeholder="Qué libro buscas?" />

          </div>
        </form>
      </div>
      <div class="links">
          <a class="link" href="admin/login/login.php">
            <i class="fa-solid fa-user"></i>
            Iniciar Sesion
          </a>
        </div>
    </div>

    </div>
    <nav class="categories">
      <a class="category" href="#">Home</a>
    </nav>
  </header>

  <!-- Hero -->
  <section id="hero">
    <div class="overlay">
      <div class="description">
        <h1 class="title">Biblioteca Institucional</h1>
        <q class="quote">Contamos con una gran variedad de libros para reforzar tu conocimientos.</q>
        <a class="order" href="admin/login/login.php">Agregar Libros</a>
      </div>
      <img class="book" src="./assets/hero-book.jpg" />
    </div>
  </section>

  <!-- Products -->
  <section id="promo" class="products-section">
    <h2 class="title">Biblioteca Instituto La Troncal</h2>
    <div class="products">
      <?php if ($result->num_rows > 0) : ?>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <div class="product">
            <a href="detalleslib/detalle_libros.php">
              <div class="image">
                <img src="assets/products/<?php echo htmlspecialchars($row['img']); ?>" alt="<?php echo htmlspecialchars($row['titulo']); ?>" />
              </div>
            </a>
            <div class="details">
              <h3 class="title"><?php echo htmlspecialchars($row['titulo']); ?></h3>
              <p class="author">de <?php echo htmlspecialchars($row['autor']); ?></p>
              <p class="materia"><?php echo htmlspecialchars($row['asignatura']); ?></p>
              <p class="descripcion"><?php echo htmlspecialchars($row['codigoisbn']); ?></p>
            </div>
            <div class="actions">
              <a href="#" class="add-to-cart"><i class="fa-solid fa-bag-shopping"></i> Disponible</a>
              <a href="#" class="add-to-wishlist"><i class="fa-solid fa-heart"></i></a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <p>No hay libros disponibles en este momento.</p>
      <?php endif; ?>

      <?php $conn->close(); ?>
    </div>
  </section>

  <!-- Newsletter -->
  <section id="newsletter">
    <h2 class="title">
      Vrei sa primesti noutati si oferte personalizate? Aboneaza-te la Newsletter!
    </h2>
    <form class="form">
      <div class="input-group">
        <span class="icon"><i class="fa-solid fa-user"></i></span>
        <input type="text" placeholder="ex: Ionescu Mihnea" name="name" required />
      </div>
      <div class="input-group">
        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
        <input type="email" placeholder="ex: ionescu.mihnea@gmail.com" name="mail" required />
      </div>
      <a class="submit" href="#">Aboneaza-te</a>
    </form>
  </section>

  <!-- Footer -->
  <footer id="footer">
    <div class="footer-grid">
      <div class="footer-left">
        <a class="logo" href="#">Libro</a>
        <p class="description">
          Cu o experienta de peste 19 ani, Libro redefinește așteptările pe care le avem de la o librărie.
        </p>
        <div class="contact">
          <ul>
            <li class="company">SC Libro Shop SRL</li>
            <li class="address">str. Cartilor 14a, Bucuresti</li>
            <li class="phone"><a href="tel:+40754525369">0754525369</a></li>
            <li class="hours">Luni-Vineri: 9.00 - 18.00</li>
          </ul>
        </div>
      </div>
      <div class="footer-center">
        <div class="title">
          <p>Link-uri Utile</p>
        </div>
        <div class="links">
          <ul>
            <li><a href="#">Despre noi</a></li>
            <li><a href="#">Cum Cumpar?</a></li>
            <li><a href="#">Livrare si Retur</a></li>
            <li><a href="#">Termeni si Conditii</a></li>
            <li><a href="#">Politica de confidentialitate</a></li>
            <li><a href="#">ANPC</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-right">
        <div class="payment-methods">
          <i class="fa-brands fa-cc-visa"></i>
          <i class="fa-brands fa-cc-mastercard"></i>
          <i class="fa-brands fa-paypal"></i>
          <i class="fa-brands fa-bitcoin"></i>
        </div>
        <div class="reviews">
          <p>
            Peste <strong>120.000</strong> cumpărători <br />
            <strong>4,9 / 5</strong>, 4793 recenzii
          </p>
          <div class="star">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star-half"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <hr />
      <p>© 2023 Libro.ro - All rights reserved</p>
    </div>
  </footer>
</body>

</html>