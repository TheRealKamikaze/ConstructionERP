<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  $emailto=$_POST['user'];
  $subject="Registered for Newsletter";
  $message="<h4>Great, you have been registered for the newsletter</h4><p>You'll be receiving updates/news about your favourite builders from now on.</p> ";
  //$message = wordwrap($message, 70, "rn");
  $headers='From:Apun Builder<antconstructions1@gmail.com>'. "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $retval = mail($emailto,$subject,$message,$headers);
  if( $retval == true ) {
  echo "Message sent successfully...";
  }else {
    echo "Message could not be sent... ";
  }
?>