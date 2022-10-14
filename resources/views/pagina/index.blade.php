<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GAMA TORRES</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: HeroBiz - v2.3.1
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Gama Torres<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li><a class="nav-link scrollto" href="index.#about">Inicio</a></li>
          <li><a class="nav-link scrollto" href="index.#services">Servicios</a></li>
          <li><a class="nav-link scrollto" href="index.#portfolio">Portafolio</a></li>
          <li><a class="nav-link scrollto" href="index.#team">Equipo</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a class="nav-link scrollto" href="index.html#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle d-none"></i>
      </nav><!-- .navbar -->

      <a class="btn-getstarted scrollto" href="{{route('register.form')}}">Registrarse</a>
      <a class="btn-getstarted scrollto" href="{{route('login.form')}}">Ingresar</a>
      

    </div>
  </header><!-- End Header -->
  
<main>

<!-- ======= Hero Section ======= -->
  <section id="hero" class="hero carousel  carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    <div class="carousel-item active">
      <div class="container">
        <div class="row justify-content-center gy-6">

          <div class="col-lg-5 col-md-8">
            <img src="assets/img/hero-carousel/hero-carousel-1.svg" alt="" class="img-fluid img">
          </div>

          <div class="col-lg-9 text-center">
            <h2>Bienvenido a Gama Torres</h2>
            <p>Gama es una herramienta web para cualquier dispositivo, donde los residentes pueden participar, gestionar y comunicar sus requerimientos a la administración y entre los residentes.
              </p>
          </div>

        </div>
      </div>
    </div><!-- End Carousel Item -->

    <div class="carousel-item">
      <div class="container">
        <div class="row justify-content-center gy-6">

          <div class="col-lg-5 col-md-8">
            <img src="assets/img/hero-carousel/hero-carousel-2.svg" alt="" class="img-fluid img">
          </div>

          <div class="col-lg-9 text-center">
            <h2>Parqueadero</h2>
            <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
            <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
          </div>

        </div>
      </div>
    </div><!-- End Carousel Item -->

    <div class="carousel-item">
      <div class="container">
        <div class="row justify-content-center gy-6">

          <div class="col-lg-5 col-md-8">
            <img src="assets/img/hero-carousel/hero-carousel-3.svg" alt="" class="img-fluid img">
          </div>

          <div class="col-lg-9 text-center">
            <h2>Residentes</h2>
            <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
            <a href="#featured-services" class="btn-get-started scrollto ">Get Started</a>
          </div>

        </div>
      </div>
    </div><!-- End Carousel Item -->

    <a class="carousel-control-prev" href="#hero" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
    </a>

    <a class="carousel-control-next" href="#hero" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
    </a>

    <ol class="carousel-indicators"></ol>

  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex"">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Administración</a></h4>
              <p>La administración es muy importante para el conjunto residencial.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex"" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Apartamentos</a></h4>
              <p>Hacemos control y segumineto a nuestros residentes y familiares.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex"" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Visitantes</a></h4>
              <p>Para nosotros en muy importante tener el control de los visitantes.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex"" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="" class="stretched-link">Parqueaderos</a></h4>
              <p>Tu vehiculo esta seguro, contamos con vigilantes especializados.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Featured Services Section -->



    
    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" >

        <div class="section-header">
          <h2>Blog</h2>
          <p>Publicaciones recientes de nuestro Blog</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos-delay="200">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
              <div class="meta">
                <span class="post-date">Jueves, Septiembre 12</span>
                <span class="post-author"> / Julia Parker</span>
              </div>
              <h3 class="post-title">La administración logro construir en parqueadero de visitantes</h3>
              <p>Nuestros residentes tendran la oportunidad de traer a sus familiares, amigos y compañeros a disfrutar de un agradable rato dejando sus vehiculos a salvo...</p>
            </div>
          </div>

          <div class="col-lg-4"  data-aos-delay="400">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
              <div class="meta">
                <span class="post-date">Martes, Octubre 05</span>
                <span class="post-author"> / Maria Rojas</span>
              </div>
              <h3 class="post-title">Adecuación sala de Espera</h3>
              <p>Se hicieron las adecuaciones de la sala de espero principal y se compraron muebles para una mejor comodidad de los visitantes...</p>
            </div>
          </div>

          <div class="col-lg-4"  data-aos-delay="600">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
              <div class="meta">
                <span class="post-date">Lunes, Octubre 14</span>
                <span class="post-author"> / Lisa Martinez</span>
              </div>
              <h3 class="post-title">Mantenimiento parqueaderos</h3>
              <p>Se realizaron la revisión de las luces, mantenimiento de cámaras, pintura de señalización... </p>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->


    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" ">

        <div class="section-header">
          <h2>Equipo</h2>
          <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
        </div>

        <div class="row gy-5">

          <div class="col-xl-4 col-md-6 d-flex"  data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>Javier Moya</h4>
                <span>Director</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-4 col-md-6 d-flex"  data-aos-delay="400">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>Brayan Triana</h4>
                <span>Gerente</span>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-4 col-md-6 d-flex"  data-aos-delay="600">
            <div class="team-member">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
                <h4>Daniel Barbosa</h4>
                <span>CTO</span>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>
    </section><!-- End Team Section -->


  </main><!-- End #main -->
  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container">

        <div class="section-header">
          <h2>Contactanos</h2>
          <p>Nuestro sitio web tiene como propósito, mejorar la comunicación y brindar información de forma permanente a la comunidad.</p>
        </div>

      </div>

      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div><!-- End Google Maps -->

      <div class="container">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-4">

            <div class="info">
              <h3>Contacto</h3>
              <p>Para nosotros es un gusto atender sus solicitudes.</p>

              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Dirección:</h4>
                  <p>Av. 116 #122 -Q12</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Correo:</h4>
                  <p>gamatorres@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Celular:</h4>
                  <p>+57 3156278822</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Correo" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto correo" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" placeholder="Mensaje" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Cargando</div>
                <div class="error-message"></div>
                <div class="sent-message">Su mensaje ha sido enviado. Gracias!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->
    
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>HeroBiz</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>HeroBiz</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>

        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- <div id="preloader"></div> -->
  
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>