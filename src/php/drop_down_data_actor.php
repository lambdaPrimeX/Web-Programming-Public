<?php
    require_once('../php/login.php');
    $conn   = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
    $_SESSION['conn'] = $conn;
    include('../php/errorHandle_connection.php');

    $query       = "select actName from Actor";
    $result      = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) !== 0) {

        while($row = mysqli_fetch_array($result)) {
            echo "<option id='dropdown'>" . $row['actName'] . "</option>";           
        }
        
    }
    else {
        echo "Connection issue: --- s";
    }
?>