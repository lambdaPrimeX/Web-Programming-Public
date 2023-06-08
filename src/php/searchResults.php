<?php
    if(!(isset($_COOKIE['PHPSESSID']))) {
        session_start();            //ref. 1.0
    }

    require_once('login.php');
    include("../php/connectHandle.php");

    //if special characters exist, navigate to home and print error
    include('../php/sanatize.php');

    $query      = "SELECT * FROM Movie WHERE actName LIKE '" . $post . "%' OR Title LIKE '" . $post . "%' OR Genre LIKE '" . $post . "%' OR Price LIKE '" . $post . "%' OR Year LIKE '" . $post . "%';";
    $result     = mysqli_query($conn, $query) or die(mysqli_error($conn));

    //ref. 1.1
    // for Movie query
    if (mysqli_num_rows($result) !== 0) {  // error handling not working because block above needs to be contained withing -- resolve
        echo "<div id='table'>";
        echo "<table class='table-class'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Movie</th>";
                    echo "<th>Genre</th>";
                    echo "<th>Actor</th>";
                    echo "<th>Price</th>";
                    echo "<th>Year</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
                echo "<td>"   . $row['Title'] . "</td>"; // Movie
                echo "<td>"   . $row['Genre'] . "</td>"; // Genre
                echo "<td>"   . $row['actName'] . "</td>"; // Actor
                echo "<td> £" . $row['Price'] . "</td>"; // Price
                echo "<td>"   . $row['Year'] . "</td>"; // Year
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";    

    } else {
        echo "<div id='error' style='margin-left: 43%; margin-top: 3%;'>";
        echo "No Movie Results Found For '" . $post . "'.";
        echo "</div>";
    }

    // Actor search
    $query = "SELECT * FROM Actor WHERE actName LIKE '" . $post . "%';";
    $result      = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // for Movie query
    if (mysqli_num_rows($result) !== 0) {  // error handling not working because block above needs to be contained withing -- resolve
    
        echo "<div id='table'>";
        echo "<table class='table-class'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th>Actor</th>";
                echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

        while($row = mysqli_fetch_array($result)) {

            echo "<tr>";
                echo "<td>"   . $row['actName'] . "</td>"; // Actor
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";    
    } else {

        echo "<div id='error' style='margin-left: 43%; margin-top: 3%;'>";
        echo "No Actor Results Found For '" . $post . "'.";
        echo "</div>";
    }
?>