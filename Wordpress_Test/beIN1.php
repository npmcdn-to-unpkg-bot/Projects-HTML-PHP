<?php

/*$url = "http://m.liveonlinetv247.info/external.php?title=beIN%20Sports&stream=bein1-hq";
$new=http_response($url,'200',3);

var_dump($new);
$html = file_get_contents($url);

preg_match_all("/<h3><a.href..(.+?)\"/", $html, $output);

header("Content-type: application/x-mpegURL");
header("Content-Disposition: attachment; filename=stream.m3u8");

echo $output[1][0];*/


?>
<form action="beIN1.php" method="post">
<input type="text" name="URL" placeholder="Enter your URL" />
<input type="submit" name="submit" />
</form>
<?php
if(isset($_POST['URL'])){
	$url = $_POST['URL'];
//$url = "http://m.liveonlinetv247.info/external.php?title=beIN%20Sports&stream=bein1-hq";
  $curl_handle=curl_init();
  curl_setopt($curl_handle,CURLOPT_URL,$url);
  curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
  curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
  $buffer = curl_exec($curl_handle);
  curl_close($curl_handle);
  if (empty($buffer)){
      print "Nothing returned from url.<p>";
  }
  else{
preg_match_all("/<p><a.href..(.+?)\"/", $buffer, $output);
//var_dump($buffer);
      //print $buffer;
$file=$output[1][1];	
$file=file_put_contents("Tmpfile.mp4", fopen($file, 'r')); 
//echo $us; 
//header("Location: $us");
//var_dump($output[1][0]); 

 if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
  }}