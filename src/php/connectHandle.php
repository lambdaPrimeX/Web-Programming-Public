 <?php
    try {
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        $_SESSION['connError'] = 0;    
    } catch (mysqli_sql_exception $e) {
            $_SESSION['connError'] = 0;
            header("Location: ../php/index.php");
            exit();
    }
?>