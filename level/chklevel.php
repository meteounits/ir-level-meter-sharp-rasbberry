<?php
// if you run the job in cron, you need to change the working directory
chdir('/var/www/level/');

//loading variables
include ("preference.php");
include ("result.php");

//Run the python script to get the level of water
$mesurefinal=exec("/var/www/level/sensor.py",$listreturned,$finalvalue);


$mesureCM=($listreturned[0]* 34300)/2+$compensation;
$mesureCMronde=round($mesureCM, 2,PHP_ROUND_HALF_UP);

$mesurePO=$mesureCM*0.394;
$mesurePOronde=round($mesurePO, 1,PHP_ROUND_HALF_UP);
echo "\n Mesure final ".$mesureCMronde."cm \n";
echo "\n Mesure final ".$mesurePOronde."pouce \n";
echo $mailsend. "\n";

/* Check if we have to send a warning, if not reset the $mailsent to 0 */
// if ($preferunit='in')
	// {
		// $niveaudo=(($deep-$mesurePOronde));
		// if ($niveaudo>$levellow){$mailsend=0;}
		// if ($niveaudo>$levellow){$mailsend=0;}
	// }
	// else
	// {
	// $niveaudo=(($deep-$mesureCMronde));
		// if ($niveaudo>$levellow){$mailsend=0;}
		// if ($niveaudo<$levelhigh){$mailsend=0;}
	// }
	
// /* check if an email have to be set. */

// if ($niveaudo>$levelhigh) /* if a warning have to be sent */
	// {
	// echo $mailsend .' have been send';
	
		// if ($mailsend <=$maxemailsend)
		// {
			// include ('mail.php');
		// }
		// else  /* If we already have send the maximum of email    */
		// {
			// echo ' .The maximum of email have been reach'."\n" ;
		// }
	// }
	
	// if ($niveaudo<$levellow) /* if a warning have to be sent */
	// {
	// echo $mailsend .' have been send';
	
		// if ($mailsend <=$maxemailsend)
		// {
			// include ('mail.php');
		// }
		// else  /* If we already have send the maximum of email    */
		// {
			// echo ' .The maximum of email have been reach'."\n" ;
		// }
	// }
	
// Writing the result to a file. 	

$fichierresult = fopen('result.php', 'w');

// read the first line of the file for web
$ligne = fgets($fichierresult);

$ladate=date("j/n/Y");
$lheure=date("H:i");
$resultat= "<?php \$mesurepouce='$mesurePOronde' ; \$mesurecentimetre='$mesureCMronde' ; \$ladatescan='$ladate'; \$heurescan='$lheure'; \$mailsend=$mailsend; ?> ";


fputs($fichierresult, $resultat);
// close the file
fclose($fichierresult);



// Writing the result to a log file. 
$filelog = fopen('loglevel.csv', 'a');

// read the first line of the file
$ligne = fgets($filelog);

$ladate=date("j/n/Y");
$lheure=date("H:i");
$livello=(($deep-$mesureCMronde));
//$resultat= ";data=$ladate;ora=$lheure;dist_sens/H2O=$mesureCMronde;invio_mail=$mailsend ";
$resultat= "$ladate;$lheure;$mesureCMronde;$livello;$mailsend";


fputs($filelog, $resultat. "\n");
// close the file
fclose($filelog);


// Writing the result to file for ist data Db. 
$fileistdb = fopen('000099.ist', 'w');

// read the first line of the file
$ligne = fgets($fileistdb);

$anno=date("Y");
$mese=date("m");
$giorno=date("d");
$ora=date("H");
$minuti=date("i");
$secondi=date("s");
$livello=(($deep-$mesureCMronde));

$stringaist= "S,000099,$ora,$minuti,$secondi,$giorno,$mese,$anno,6,1,$livello,#";

fputs($fileistdb, $stringaist);
// close the file
fclose($fileistdb);


// Writing the result to file for log data Db. 
$filelogdb = fopen('000099.txt', 'a');

// read the first line of the file
$ligne = fgets($filelogdb);

$anno=date("Y");
$mese=date("m");
$giorno=date("d");
$ora=date("H");
$minuti=date("i");
$secondi=date("s");
$livello=(($deep-$mesureCMronde));

$stringalog= "S,000099,$ora,$minuti,$secondi,$giorno,$mese,$anno,6,2,$livello,#";

fputs($filelogdb, $stringalog. "\n");
// close the file
fclose($filelogdb);


?>
