<?
    /**
        Args: $tmpl
     */
    $from = "no-reply@somebody.nu";

    //begin of HTML message
    ob_start();
    require_once("email/$tmpl.html");
    $message = ob_get_contents();
    ob_end_clean();
    //end of message
    $headers  = "From: $from\r\n";
    $headers .= "Content-type: text/html\r\n";

    //options to send to cc+bcc
    //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
    //$headers .= "Bcc: [email]email@maaking.cXom[/email]";
    
    mail($to, $subject, $message, $headers);
