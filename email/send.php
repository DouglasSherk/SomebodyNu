<?
    include_once('email/postageapp.php');
    $siteFrom = "no-reply@somebody.nu";

    //begin of HTML message
    ob_start();
    require_once("email/$tmpl.html");
    $message = ob_get_contents();
    ob_end_clean();
    //end of message
    //$headers  = "From: $from\r\n";
    //$headers .= "Content-type: text/html\r\n";

    $content = array(
      "text/plain" => strip_tags($message),
      "text/html" => $message,
    );

    //options to send to cc+bcc
    //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
    //$headers .= "Bcc: [email]email@maaking.cXom[/email]";

    // Send to the person who requested first.
    $headers = array(
      "From" => $siteFrom,
      "Reply-to" => $to,
    );
    PostageApp::mail($from, $subject, $content, $headers);

    // Send to the person who is receiving now.
    $headers = array(
      "From" => $siteFrom,
      "Reply-to" => $from,
    );
    PostageApp::mail($to, $subject, $content, $headers);

