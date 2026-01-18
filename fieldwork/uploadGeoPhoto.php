<?php
//
define('SAVE_DIR', './photo_tmp/');

//if (is_uploaded_file($_FILES["acceptImage"]["tmp_name"])){
if (is_uploaded_file($_FILES["jpegfile"]["tmp_name"])){
	//$file = sprintf('%s.png', uniqid());    //ファイル名作成
	//$file = sprintf('%s.jpeg', uniqid());    //ファイル名作成
	$tempdir = sprintf('%s/', uniqid());
	
	mkdir(SAVE_DIR.$tempdir);//create temporaly directory
	//$uploaddir = SAVE_DIR.$tempdir
	$data = SAVE_DIR.$tempdir . basename($_FILES['jpegfile']['name']);;
  //if (move_uploaded_file($_FILES["acceptImage"]["tmp_name"], './image/test.png')){
  	//$uploadfile = $uploaddir . basename($_FILES['acceptImage']['acceptImage']);
	if (move_uploaded_file($_FILES["jpegfile"]["tmp_name"], $data)){
       		//echo "アップロードしました。<br>";
		//echo $_FILES["acceptImage"]["tmp_name"];
	
		$status = "アップロードしました。";
		//$data = $_FILES["acceptImage"]["tmp_name"];
				
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: *');
	
		$uploadfile = $data;
		$arr = array('msg' => 'success','jpegfile' => $uploadfile);
   		echo json_encode($arr);
  	} else {
       		echo "ファイルをアップロードできません。".$data;
  	}
} else {
	echo "ファイルが選択されていません。file:".$_FILES["jpegfile"]["tmp_name"];
}

?>

