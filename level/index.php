
<?php


include ("preference.php");
include ("result.php" );

//Unit section:  inialize variable depending if the unit is cm or in
if ($preferunit=="cm")
	{
	$niveaudo= (($deep-$mesurecentimetre)).' '.$preferunit.' livello';
	$freespace= $mesurecentimetre.' '.$preferunit.' '. 'dist sens/acqua ';
	$sizeofreeblock=$mesurecentimetre*2;  //this will change the size of the table
	$sizeofusedblock=($deep-$mesurecentimetre)*2; //this will change the size of the table
	}
else if ($preferunit=="in")
	{
	$niveaudo=(($deep-$mesurepouce)).' '.$preferunit.' ';
	$freespace= $mesurepouce.' '.$preferunit.' free ';	
	$sizeofreeblock=$mesurepouce*6;  //size is in pixel for previewing only, this will change the size of the table
	$sizeofusedblock=($deep-$mesurepouce)*6; //size is in pixel for previewing only, this will change the size of the table
	}
// End of Unit section

//Color led section: change the image path depending of the color of the led
if ($niveaudo<$levellow)
	{
		$toppicture="topredlow.gif";
	}
	else if ($niveaudo>$levelhigh)
	{
		$toppicture="topredhigh.gif";
	}
	else
	{
		$toppicture="topgreen.gif";
	}
//End of color led section



?>


<TABLE BORDER="0";border CELLSPACING="0" align="center" CELLPADDING="10"> 
  
  <TR> 
 <td width="200" height="120"  style="background: url('<?php echo $toppicture ;?>') top left no-repeat;"></td>
 
 <td width="200" height="120"  ></td>
 
 
  </TR> 
  <TR> 
 <td width="200" height="<?php echo $sizeofreeblock ;?>" align="right" CELLPADDING="10"  background="grey.png" ><?php echo $freespace ?></td>

 
  </TR> 
  
  <TR> 
 <td width="200" height="<?php echo $sizeofusedblock ;?>" align="right" background="blue.png"><?php echo $niveaudo?> </td>


  </TR> 
  <TR> 
 <td width="200" height="4" align="center" > Aggiornato: <?php echo $ladatescan."\n";  echo $heurescan; ?></td>
 

  </TR> 
</TABLE> 


</body>
</html>


