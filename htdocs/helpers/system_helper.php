<?php
// The source code for this was from the YouTube Tutorial:
// "Projects In PHP | Creating A Job Lister Website From Scratch | Eduonix"
// https://www.youtube.com/watch?v=LEkjrQMmIK0

// Our Group used these function for our redirects as well as the banner popup.

//REDIRECT TO PAGE
function redirect($page = FALSE, $message = NULL, $message_type = NULL) {
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER ['SCRIPT_NAME'];
    }

    // CHECK FOR MESSAGE
    if ($message != NULL) {
        // SET MESSAGE
        $_SESSION['message'] = $message;
    }

    // CHECK FOR TYPE
    if($message_type != NULL){
        // SET MESSAGE TYPE
        $_SESSION['message_type'] = $message_type;
    }

    // REDIRECT
    header ('Location: '.$location);
    exit;
}

function displayMessage() {
    if(!empty($_SESSION['message'])) {

        //ASSIGN MESSAGE VAR
        $message = $_SESSION['message'];

        if(!empty($_SESSION['message_type'])) {
            // ASSIGN TYPE VAR
            $message_type = $_SESSION['message_type'];
            // CREATE OUTPUT
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger">' .$message. '</div>';
            } else {
                echo '<div style="background-color:#98FB98;" class="alert alert-succuss">' .$message. '</div>';
            }
        }
        // UNSET MESSAGE
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}