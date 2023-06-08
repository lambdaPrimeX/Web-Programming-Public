<?php
    // if session not already started, start_session()
    if(!(isset($_COOKIE['PHPSESSID']))) {
        session_start();            //ref. 1.0
    }    

    // sanatize inputs
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST['userSearch'] == "") {
            $post = $_POST['userSearch'];
            $_SESSION['post'] = $post;
        } else {
            if (sanatize($_POST['userSearch'])) {
            $_SESSION['message'] = "<div id='special_CHAR'> No special characters allowed</div>";
                header("Location: ../php/index.php");
                exit();
            } else
                    $post = $_POST['userSearch'];
        }
    } else
        $post = $_SESSION['post'];
?>