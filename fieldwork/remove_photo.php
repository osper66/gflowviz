<?php
   $photo = $_POST['photo']; 

   //$photo = './photo_tmp/tes1432/tetsugakudo.JPG';
    
   if(unlink($photo))
   	echo 'deleted: '.$photo;
   else
        echo 'failed '.$photo;
        
   $names = explode("/",$photo);
   $lastname = $names[count($names) - 1];
   $dir = str_replace( "/".$lastname,"",  $photo);
   
   /*
	$fp = fopen('file.txt', 'w');
 
	fwrite($fp, $dir);
 	fclose($fp);
 	*/
   
    //
    rmdir($dir);
?>
