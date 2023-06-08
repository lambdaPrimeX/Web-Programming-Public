<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>toWatch</title>
    <link href="../css/stylesheet.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Avestan">
    <link rel="icon" type="image/x-icon" href="../images/Wfavicon.png">

    <script type="text/javascript" src="../js/validate.js?n=1"></script>

    <style>
      title {
        font-family: 'Noto Sans Avestan';
        font-size: '65px';
      }
      body {
        font-family: 'Noto Sans Avestan';
      }
    </style>
  </head>

    <div class='logo'>
      <img src="../images/toWatch-logo.png" id='logoSize'>
    </div>

    <body style="background-color: #000000",font-family: Noto Sans Avestan;>  

    <div class="search">
      <FORM name="search1" method="post" action="../php/searchPage.php" onsubmit="return validateSearch(this)">
        <INPUT type="text" name="userSearch" id="searchBox" placeholder="                           | toWatch Search"> </INPUT>
      </FORM>
    </div>

    <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        $_SESSION['message'] = null;
      }
    ?>

    <!-- <?php
      if ($_SESSION['connError'] == 1) {
        $_SESSION['connError'] == 0;
        echo "Unable to make connection to database";
      }
    ?> -->

<button type="button" class="collapsible" name="banner">Advanced Menu</button>
  <div class="content">
    <div class="addActor">

      <FORM name="form2" method='post' action="../php/add_actor.php" class="collapsable" onsubmit="return validateActor(this)">
        <p id="actorText">Actor</p>
        <INPUT type="text" name="add_actor" id="act_textBox"></INPUT>
        <INPUT type="submit" id="submit" value="Create" name="create_button"></INPUT>
        <INPUT type="submit" id="submit" value="Remove" name="remove_button"></INPUT>
      </FORM>

    </div>
    
    <!-- add movie -->
    <div class="form">

      <FORM name="form1" method="post" action="../php/add_movie.php" onsubmit="return validateMovie(this)">
        <p id="actorText">Movie</p>
        <INPUT type="text" name="addMovie_title" id="movieTitle_box" placeholder="Title" required onsubmit="validateGenre(this)"></INPUT> :
        <INPUT type="text" name="addMovie_genre" id="movieGenre_box" placeholder="Genre" required></INPUT> :
        <INPUT type="text" name="addMovie_price" id="moviePrice_box" placeholder="Price" required></INPUT> :
        <SELECT type="text" name="addMovie_year" id="movieYear_box" placeholder="Year" required> 

            <?php
              for($i=1900; $i<=2023; $i++ ) {
                  echo "<option value=$i>$i</option>";
              }
            ?>

        </SELECT> :
        
        <SELECT type="text" name="addMovie_actor" id="movieActor_box" placeholder="Actor" required>

           <?php include('../php/drop_down_data_actor.php'); ?>
        
        </SELECT>

        <INPUT type="submit" id="submit" value="Create" name="create_button"></INPUT>
        <INPUT type="submit" id="submit" value="Remove" name="remove_button"></INPUT>
      </FORM>

    </div>
  </div>

  <!-- prints success or failure for create menu -->
  <div id="message_actor";
    <?php
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          $_SESSION['message'] = null;
        }
    ?>
  </div>

    <!-- JavaScript for revealing collapsable section -->
    <script>
      var collapse = document.getElementsByClassName("collapsible");
      var i;

      <!-- referenced from W3schools https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_collapsible -->
      for (i = 0; i < collapse.length; i++)
      {
        collapse[i].addEventListener("click", function() {
          this.classList.toggle("dropdown");
          var content = this.nextElementSibling;
          if (content.style.display === "block") {
            content.style.display = "none";
          } else {
              content.style.display = "block";
          } 
        });
      }
    </script>
  </body>
</html>