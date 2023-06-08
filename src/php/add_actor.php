<?php 
    session_start();
    $MYSQLI_CODE_DUPLICATE_KEY = 1062;
    $Duplicate                 = 0;

    require_once('login.php');
    include('../php/connectHandle.php');

    // Error handle
    $_SESSION['conn'] = $conn;

    //check query to prevent error message
    if (isset($_POST['create_button']) ) {
        $stmt = $conn->prepare("INSERT INTO Actor(actName) VALUES (?)");
        $stmt->bind_param('s', $_POST['add_actor']);

    } else if (isset($_POST['remove_button'])) {
        $stmt = $conn->prepare("delete from Actor where actName=?");
        $stmt->bind_param('s', $_POST['add_actor']);
        $_SESSION['message'] = "<div id='successful_andOther'>Removal successful: '" .  $_POST['add_actor'] . "'</div>";
        $Removal = 1;

    // replace into Movie (actID, actName,Title,Price,Genre,Year) values (?,?,?,?,?,?)");
    } else { // such that restricts unwanted redirects
        header('Location: ../php/index.php', True, 301);
        exit();
    }

    try {
        $stmt->execute();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == $MYSQLI_CODE_DUPLICATE_KEY) {
                
            // Duplicate Actor
            if ($Removal == 0) {
                $_SESSION['message'] =  "<div id='successful_andOther'>Save Unsuccessful: '" . $_POST['add_actor'] . "' is a <b>duplicate</b>.</div>";
            }
            $Duplicate = 1;

        } else {
            throw $e;// in case it's any other error
        }
    }
    if ( $Duplicate == 0 && $Removal == 0 ) {
        $_SESSION['message'] = "<div id='successful_andOther'>Save Successful: '" .  $_POST['add_actor'] . "'.</div>";
    }

    header('Location: ../php/index.php', True, 301);
    exit();
?>