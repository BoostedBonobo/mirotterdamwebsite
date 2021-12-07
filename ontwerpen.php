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
  
  <!-- return elements for design to javascript with php -->
  <script type="text/javascript"> 
  var elements_array = <?php echo json_encode($elements); ?>
  </script>
  <!-- include module directly -->
  <script type="module" src="assets/js/design-maker/loadElements.js"></script>

  <!-- rest of header -->
  <?php include('views/header.html') ?>
</head>

<body>

  <!-- Slider Section -->
  <div id="herobox" class="test" style="display:block;">
    <?php include('views/slider.html'); ?> <!-- reference to slider html -->
  </div>
  <!-- End Slider Section-->

  <!-- about section(verhaallijn) -->
  <section id="about" class="about" style="display:none;">
    <?php include('views/about.html'); ?> <!-- reference to verhaallijn html -->
  </section>
  <!-- End About Section -->

  <!-- Design Section -->
  <section id="design" class="design" style="display:none;">
    <?php include('views/design.html'); ?> <!-- reference to designcreater html -->
  </section>
  <!-- End Design Section -->

  <!-- Contact Section  -->
  <section id="contact" class="contact" style="display:none;">
    <?php include('views/contact2.html'); ?> <!-- reference to contact html -->
  </section>
  <!-- End Contact Section -->

  <!-- wip -->
  <section id="endscreen" class="endscreen" style="display:none;" style="width:100px; height:100px;">
    <h2> Bericht wordt nu verzonden.. </h2>
    <h3> Na het versturen wordt de pagina doorgeleid </h3>
    <h3> Zie de ontwerpen van de mensen voor je: </h3>
    <p> afbeeldingen </p>
  </section>

</body>

<footer id="footer" >
  <?php include('views/footer.html'); ?>
</footer>

</html>