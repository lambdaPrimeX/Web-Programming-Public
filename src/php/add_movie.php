<?php 
    session_start();                    //ref. 1.0
    $MYSQLI_CODE_DUPLICATE_KEY = 1062;
    $Duplicate                 = 0;
    $Removal                   = 0;

    require_once('login.php');

    // create conditional for if connection exists, skip but still error handle
    include('../php/connectHandle.php');
    $_SESSION['conn'] = $conn;


    // Query okay:
    // Example: insert into Movie (actID, actName,Title,Price,Genre,Year) values ('259','Robert DeNero','Goodfellas','3.99','Crime','1999')

    $query  = "SELECT actID FROM Actor WHERE actName='" . $_POST['addMovie_actor'] . "';";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($result) !== 0) {
        $row = mysqli_fetch_array($result);
        $actID = $row['actID'];
    }

    //check query to prevent error message
    if (isset($_POST['create_button']) ) {      //ref. 1.2
        $stmt = $conn->prepare("replace into Movie (actID, actName,Title,Price,Genre,Year) values (?,?,?,?,?,?)");      //ref. 1.3
        $stmt->bind_param('issdsi', $actID, $_POST['addMovie_actor'],$_POST['addMovie_title'],$_POST['addMovie_price'],$_POST['addMovie_genre'],$_POST['addMovie_year']);

    } else if (isset($_POST['remove_button'])) {
        $stmt = $conn->prepare("delete from Movie where Title=?");
        $stmt->bind_param('s', $_POST['addMovie_title']);
        $_SESSION['message'] = "<div id='successful_andOther'>Removal successful: '" .  $_POST['addMovie_title'] . "'</div>";
        $Removal = 1;
        echo $_SESSION['message'];

    } else { // RESTRICTS unwanted redirects
        header('Location: ../php/index.php', True, 301);
        exit();
    }

    try {
        $stmt->execute();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == $MYSQLI_CODE_DUPLICATE_KEY) {
            // Duplicate Actor
            if ($Removal == 0) {
                $_SESSION['message'] =  "<div id='successful_andOther'>Save Unsuccessful: '" . $_POST['addMovie_title'] . "' is a <b>duplicate</b>.</div>";
            }
            $Duplicate = 1;

        } else {
            throw $e;// in case it's any other error
        }
    }
    if ( $Duplicate == 0 && $Removal == 0 ) {
        $_SESSION['message'] = "<div id='successful_andOther'>Save Successful: '" .  $_POST['addMovie_title'] . "'.</div>";
        echo "<div id='successful_andOther'>Save Successful: '" .  $_POST['addMovie_title'] . "'.</div>";
    }

    header('Location: ../php/index.php', True, 301);
    exit();
?>