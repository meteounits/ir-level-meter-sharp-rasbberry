<?php

//date_default_timezone_set('Europa/Rome'); //change the time zone 

/* The prefer unit could be in "in" or "cm" .*/
$preferunit="cm" ; //choice are "cm" or "in"

// Deep of your pit
$deep = 200;   //in cm

 /* Sould be the distance from the top of the pit to the sensor.
  * mesure the real distance from the edge of the pit to the water level to 
  * find the compensation. Should match the preferunit  and is always negative */
$compensation=-0;



/* This to variable defined at what level the led should be amber or flashing red 
 * and the email is send
 * The level is the level of water, $niveaudo in the index.php
 * The unit cm or in depend of the $preferunit */
 
$levellow=25	 ; 
$levelhigh=300;


/* Email configuration         */
$to="?????????????";
$from='??????????' ;
$maxemailsend=-1 ; /* if you don't want to received thousand of email, set the maximum. And if you don't want email at all, set to -1 */

?>