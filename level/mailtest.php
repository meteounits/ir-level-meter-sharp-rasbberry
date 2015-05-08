<?php
$to = "xxxxxxxxx";
$subject = "PHP Test mail";
$message = "This is a test email";
$from = "xxxxxxxxxxx";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>
