<?php
    include_once('email/postageapp.php');
    $siteFrom = "no-reply@somebody.nu";

    //begin of HTML message
    ob_start();
    require_once("email/$tmpl.html");
    $message = ob_get_contents();
    ob_end_clean();

    $content = array(
      "text/plain" => strip_tags($message),
      "text/html" => $message,
    );

    $replyTo = "";
    foreach ($users as $member) {
        $replyTo .= $member['email'] . ', ';
    }

    $headers = array(
      "From" => $siteFrom,
      "Reply-to" => $replyTo,
    );

    PostageApp::mail($replyTo, $subject, $content, $headers);
