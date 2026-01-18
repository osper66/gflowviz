<?php

// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.

    //user tempraly diretory
   //
	 $tempdir = '';
   	$tmpfile1 = tempnam($tempdir,'test_');
	unlink($tmpfile1);

//shapefile
$tmpshpfile = str_replace(".tmp",".shp",$tmpfile1);
//echo $tmpshpfile;
$tmpshpfile = str_replace("tmp","",$tmpshpfile);

$tmpshpfile = str_replace("\\","/",$tmpshpfile);
$tmpshpfile = str_replace("/","",$tmpshpfile);
$tmpshpfile = str_replace("C:ms4w","",$tmpshpfile);
$tempname = str_replace(".shp","",$tmpshpfile);

//echo $tempname;

//dbf
$tmpdbffile = str_replace(".shp",".dbf",$tmpshpfile);

//create temporary folder
 $tempdir = './photo_tmp/'.$tempname.'/';
//echo $tempdir;
 
  mkdir($tempdir);//create temporaly directory
 
$uploaddir = $tempdir;
$uploadfile = $uploaddir . basename($_FILES['jpegfile']['name']);

//echo $uploadfile;

//echo $_FILES['zipfile']['tmp_name'];

/*
if (!extension_loaded('GD')) {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        dl('php_gd2.dll');
    } else {
        dl('php_gd2.so');
    }
}
*/

if (move_uploaded_file($_FILES['jpegfile']['tmp_name'], $uploadfile)) {
	list($width, $height) = getimagesize($uploadfile);// get image's width & height
/*	
	$imgWidth = 512;
	$imgHeight = 512;
	
	if($width >= $height){
		$ratio = $height / $width;
		$w = $imgWidth;
		$h = $imgHeight * $ratio;
	}else{
		$ratio = $width / $height;
		$w = $imgWidth * $ratio;
		$h = $imgHeight;
	}
	
	// $baseImage = imagecreatefromjpeg($uploadfile); 
	 //$image = imagecreatetruecolor($w, $h); 
	 */
	
    if(!extension_loaded('exif')) dl('php_exif.dll');
/*
  $exif = exif_read_data($uploadfile,'IFD0');
  echo $exif == false ? "no exif info" : "exif info exists";
  */
  
   	$arr = array('msg' => 'success','jpegfile' => $uploadfile, 'width' => $width,  'height' => $height, 'w' => $w,  'h' => $h);
   	echo json_encode($arr);
   } else {
     $arr = array('msg' => 'failed');
     echo json_encode($arr);
   }
   
?>
