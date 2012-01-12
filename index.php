<?php
    require_once( "includes/main.php" );

    if ($_GET['refresh'] == 1) {
        session_destroy();
    }

    $requestURI = explode("/", strtok($_SERVER["REQUEST_URI"], "?"));
    $scriptName = explode("/", $_SERVER["SCRIPT_NAME"]);

    for( $i = 0; $i < sizeof($scriptName); $i++ ) {
        if ($requestURI[$i] == $scriptName[$i]) {
            unset($requestURI[$i]);
        }
    }
     
    $command = array_values($requestURI);

    $file = $command[0] . ".php";

    $loggedIn = User::login();
    if ($loggedIn) {
        // Cache the user object for easier access.
        $user = $_SESSION['user'];
    }

    // Attempt user login, handle special case if it fails.
    if (!$loggedIn) {
        include_once("landing.php");
    // Send them to a page that exists if they're logged in.
    } else if (file_exists($file) && $file != "landing.php") {
        include_once($file);
    // If the file doesn't exist, just send them back to the main page.
    } else {
        include_once("activity.php");
    }

