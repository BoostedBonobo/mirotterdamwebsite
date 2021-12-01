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
  var elements_array = <?php echo json_encode($elements); ?>
  </script>
  <script type="module" src="assets/js/design-maker/loadElements.js"></script>

  <!-- Favicon -->
  <link href="assets/img/favicon.png" rel="icon">

  <!-- bootstrap -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- end bootstrap -->

  <!-- screenshot library-->
  <script src= "https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"> </script> 
  <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
    
  <!-- CSS File declaration -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

</head>
<body>
  <!-- Header -->
  <header id="header" class="fixed-top ">
  </header><!-- End Header -->

  <!-- Slider Section -->
  <div id="herobox" class="test" style="display:block;">
    <section id="hero" class="d-flex flex-column justify-content-center">
      <div class="container">
        <div class="row justify-content-center">
            <h1>MiRotterdam</h1>
            <h2 ><i id="plaatsnaam"></i></h2>
            <h2>Begin met ontwerpen via de knop hieronder!</h2>
            <button id="playbtn" onclick="showAbout()"  class="play-btn mb-4"></button>
        </div>
      </div>
    </section><!-- End Slider -->
  </div><!-- herobox-->

  <!-- verhaallijn -->
  <section id="about" class="about" style="display:none;">
    <div class="container">
      <div class="section-title"> <h2>Inspireer jezelf!</h2> </div>
        <div class="row content">
          <div id="kijkendiv" class="verhaallijn">
            <h2>Kijk om je heen </h2>
            <div id ="verhaalimg" class="kijken" ></div>
            <button onclick="kijkenBtn()" class="btn-learn-more">Volgende</button>
          </div>
          <div id="luisterdiv" class="verhaallijn" style="display:none;">
            <h2>Luister naar de omgeving</h2>
            <div id="verhaalimg" class="luisteren"></div>
            <button onclick="luisterBtn()" class="btn-learn-more">Volgende</button>
          </div>
          <div id="inspireerdiv" class="verhaallijn" style="display:none;">
            <h2>Geinspireerd?</h2>
            <div id="verhaalimg" class="inspiratie"></div>
            <!-- <h3>Weet je al wat je aan deze omgeving zou willen toevoegen? </h3> -->
            <button id = "themabutton" onclick="showDesign()" href="#design" class="btn-thema-next">Begin nu met ontwerpen!</button>
          </div>
        </div>
    </div>
  </section><!-- End Section -->

  <!-- Thema Section-->
  <section id="thema" class="thema" style="display:none;"><!--themas-->
      <a id = "themabutton" onclick="showDesign()" href="#design" class="btn-thema-next" style="display:none;">Volgende</a>
    </div>
  </section><!-- End Section -->

  <!-- Design Section -->
  <section id="design" class="design" style="display:none;">
    <div class="element-editor" id="element-editor">
      <h2>Aanpassen</h2>

      <div class="editor-attribute-choices">
          <span id="choice-size" class="highlighted">Grootte</span>
          <span id="choice-color">Kleur</span>
          <span id="choice-mirror">Spiegelen</span>
      </div>

      <div class="attribute-editor">
          <div class="scale-slider-container shown" id="scale-slider-container">
              <label for="scale-slider" class="scale-slider-label">
                  <input type="range" class="scale-slider" id="scale-slider">
              </label>
          </div>

          <div class="color-choices-container" id="color-choices-container">
  <!--        This inline styling is used for a javascript function -->
  <!--        This way, the CSS 'filter' property can be extracted from these button via the JS 'style' property,
              which would not be possible when using CSS classes -->
              <button style="filter: hue-rotate(40deg)"></button>
              <button style="filter: hue-rotate(90deg)"></button>
              <button style="filter: hue-rotate(150deg)"></button>
              <button style="filter: hue-rotate(270deg)"></button>
              <button style="filter: hue-rotate(240deg)"></button>
              <button style="filter: hue-rotate(180deg)"></button>
          </div>
      </div>
    </div>

    <div class="elements-menu-container">
        <h2>Bibliotheek</h2>

        <div class="elements-menu" id="elements-menu"></div>

        <div style="display: none" class="theme-picker" id="theme-picker">
            <div class="theme groen">
                <img src="assets/elements/Boom.png" alt="">
                <div class="theme-name">Groen</div>
            </div>

            <div class="theme spel-sport">
                <img src="assets/elements/Basketbal.png" alt="">
                <div class="theme-name">Spel & Sport</div>
            </div>

            <div class="theme ontspanning">
                <img src="assets/elements/Picknick.png" alt="">
                <div class="theme-name">Ontspanning</div>
            </div>

            <div class="theme veilig">
                <img src="assets/elements/Boom.png" alt="">
                <div class="theme-name">Veilig</div>
            </div>
        </div>
    </div>

    <div id="canvas" class="canvas"></div>

    <div class="options" id="options">
        <button class="option-button elements-menu-button" id="elements-menu-button"></button>
        <button class="option-button delete-button" id="delete-button" disabled></button>
        <button class="option-button ok-button" id="ok-button" class="saveimage" onclick="saveConcept()"></button>
    </div>

  </section><!-- End Design Section -->

  <!-- Contact Section  -->
  <section id="contact" class="contact" style="display:none;">
    <div class="container">
      <div class="section-title">
        <h2>Contact</h2>
        <h4>Bij het versturen zal de gemeente Rotterdam je ontwerp ontvangen.</h4>
      </div>
      <div class="gradient"></div>
        <div class="formlabels">
          <form method="post" id="form" role="form" class="php-email-form" action="assets/php/mail.php">
            <div class="row">
              <div class="contactlabel form-group">
                <label for="age"><h5> De gemeente Rotterdam zou graag de leeftijdsgroepen van ontwerpen zichtbaar hebben (optioneel)</h5></label>
                <select id="age">
                  <option value="0">Selecteer</option>
                  <option value="1">Onder 12</option>
                  <option value="2">12-16</option>
                  <option value="3">17-21</option>
                  <option value="4">21-49</option>
                  <option value="5">50+</option>
                </select>
              </div>
              <div class="contactlabel">
               <label for="email"><h5> Als je wilt weten of jou ontwerp gerealiseerd wordt kan je een email invullen die dan gecontacteerd zal worden (optioneel)</h5></label>
               <input type="email" class="form-control" name="email" id="email" placeholder="Email">
              </div> 
              <div class="contactlabel">
                <h2> je ontwerp </h2>
                <div id="storedScreenshot"></div> 
                <input type="hidden" id="ontwerpid" name="ontwerp" value="0">
              </div>  
            </div>
          <div class="text-center"><input id="endbutton" type="submit" class= "btn-thema-next" value="verstuur ontwerp" style="margin-top:20px;"></div>
          </form>
        </div>
      </div>
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- JS Files -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/main.js"></script>

  <!--ontwerpen scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/Draggable.min.js"></script>

  <script src="assets/js/design-maker/elements-library/ElementsMenu.js"></script>
  <script type="module" src="assets/js/design-maker/scripts.js"></script>
  <!--scripts-->

  
</footer><!-- End Footer -->
</html>