<!DOCTYPE html>
  <html>
    <head>
      
      <!-- if special characters exist, navigate to home and print error -->
      <?php
        session_start();
        function sanatize($string) {
          // return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string);
          return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬]/',$string);
        }
        include('../php/sanatize.php');
      ?>

      <title>toWatch</title>
      <title>toWatch</title><link href="../css/stylesheet_searchPage.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Noto+Sans+Avestan">
      <link rel="icon" type="image/x-icon" href="../images/Wfavicon.png">
      <script type="text/javascript" src="../js/validate.js"></script>
    </head>
    
    <div" id='logo'>
      <p>
        <div class="image">
          <a href="../php/index.php">
            <img src="../images/toWatch-small.png" id='logoSize'>
          </a>
        </div>
      </p>
    </div>

    <body style="background-color: #000000">
      <div class="searchBox">

        <FORM class="box" method="post" action="../php/searchPage.php" onsubmit="return validateSearch(this)">
          <INPUT type="text" id="textBox" name="userSearch">
        </FORM>

      </div>
      
      <!-- table with search results -->
      <?php 
        include('searchResults.php');
      ?>

      </div>
    </body>
  </html>