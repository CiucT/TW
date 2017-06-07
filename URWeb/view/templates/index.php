<?php
include_once("URWeb/controller/login.php");
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
       <title>U R WEB Geolocation</title>
       <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="URWeb/view/static/css/components.css">
       <link rel="stylesheet" href="URWeb/view/static/css/icons.css">
       <link rel="stylesheet" href="URWeb/view/static/css/responsee.css">
       <!-- CUSTOM STYLE -->
       <link rel="stylesheet" href="URWeb/view/static/css/template-style.css">
       <link rel="stylesheet" href="URWeb/view/static/css/position_and_font.css">
       <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
       <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
       <script async defer type="text/javascript" src="URWeb/view/static/js/jquery-1.8.3.min.js"></script>
       <script async defer type="text/javascript" src="URWeb/view/static/js/jquery-ui.min.js"></script>
   </head>
   <body class="size-1140">
      <div id="all-content" class="with-sticky-footer">
         <!-- TOP NAV WITH LOGO -->
         <header>
            <nav>
               <div class="line">
                  <div class="s-12 l-2">
                      <h4 class="alb">U R WEB</h4>
                      <h5 class="alb">Geolocation</h5>
                  </div>
                  <div class="top-nav s-12 l-10 right">
                     <p class="nav-text">Custom menu text</p>
                     <ul class="right">
                        <li><a href="{{ url_for('index') }}">Acasa</a></li>
                        <li>
                           <a>Despre</a>
                           <ul>
                              <li><a href="aboutus.html">Noi</a></li>
                              <li><a href="http://students.info.uaic.ro/~georgiana.trofin/urweb/tw.html">Proiect</a></li>
                           </ul>
                        </li>
                        <li><a href="https://profs.info.uaic.ro/~busaco/teach/courses/web/">Tehnologii Web</a></li>
                     </ul>
                  </div>
               </div>
            </nav>
         </header>
         <section>
            <!-- FIRST BLOCK -->
            <div id="first-block">
               <div class="line">
                  <div class="margin-bottom">
                     <div class="margin">
                         <div class="center">
                             <br>
                             <br>
                             <br>
                             <br>
                             <br>
                             <br>
                             <br>
                             <br>
                             <br>
                                <?php echo $output; ?>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <script async defer type="text/javascript" src="URWeb/view/static/js/responsee.js"></script>

</body>
</html>