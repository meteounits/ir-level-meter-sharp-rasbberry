<?php
include ('preference.php');
include ('result.php');


if ($preferunit='in')
{
	$niveaudo=$niveaudo . ' in';
	$freespace=($deep-$niveaudo).' in';	
}
else
{
	$niveaudo=$niveaudo . ' cm';
	$freespace=($deep-$niveaudo).' cm';
}





	$to = 'xxxxxxxxxx';
	$subject = 'ALLARME LIVELLO ACQUA ! ' .$niveaudo;
     
    $fromline = 'Da: '.$from ."\r\n";
   	$fromline .='Content-Type: text/html; charset="utf-8"'."\n"; 
    $fromline .='Content-Transfer-Encoding: 8bit'; 
	$fromline .= "\r\n";
	
	$message= 'ATTENZIONE: raggiunto livello di '.$niveaudo ."\n";
	$message.='Space left: '.$freespace;

     

  

     if(mail($to,$subject,$message,$from)) 
     { 
       	echo 'Message send'."\n";
		$mailsend++;
		
	 } 
     else 
     { 
          echo 'Message cannot be send' . "\n"; 
     } 






?>