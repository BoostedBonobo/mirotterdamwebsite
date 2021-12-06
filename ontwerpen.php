<?php 
$elements = include 'assets/php/elements.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MiRotterdam Ontwerpomgeving</title>
  <meta name="description" content="ontwerpomgeving voor mirotterdam">
  <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
  
  <!-- return elements for design to javascript -->
  <script type="text/javascript">
  let elements_array = <?php echo json_encode($elements); ?>
  </script>
  <?php 
  include('views/header.html')
  ?>
</head>
<body>
  <!-- Header -->
  <header id="header" class="fixed-top ">
  </header><!-- End Header -->

  <!-- Slider Section -->
  <div id="herobox" class="test" style="display:none;">
    <?php
      include('views/slider.html');
    ?>
  </div><!-- herobox-->

  <!-- verhaallijn -->
  <section id="about" class="about" style="display:none;">
    <?php
      include('views/about.html');
    ?>
  </section><!-- End Section -->

  <!-- Design Section -->
  <section id="design" class="design" style="display:block;">
  <?php
   include('views/design.html');
   ?>
  </section><!-- End Design Section -->

  <!-- Contact Section  -->
  <section id="contact" class="contact" style="display:none;">
  <?php
   include('views/contact.html');
   ?>
  </section><!-- End Contact Section -->

  <section id="endscreen" class="endscreen" style="display:none;" style="width:100px; height:100px;">
    <h2> Bericht wordt nu verzonden.. </h2>
    <h3> Na het versturen wordt de pagina doorgeleid </h3>
    <h3> Zie de ontwerpen van de mensen voor je: </h3>
    <p> afbeeldingen </p>
  </section><!-- End Contact Section -->

</body>
  <!-- ======= Footer ======= -->
<footer id="footer" >
  <div class="container">
  </div>

  <!-- bootstrap data -->
  <div id="preloader"></div>
  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
          integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
          crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
          integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
          crossorigin="anonymous"></script>

  <!-- JS Files -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/main.js"></script>

  <!--ontwerpen scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/Draggable.min.js"></script>

  <script type="module" src="assets/js/design-maker/scripts.js"></script>
  <!--scripts-->

  
</footer><!-- End Footer -->
</html>