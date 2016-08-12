<?php 
$user_datel=(object) $_POST;
$count = count($_FILES['user_image']['name']);
$randNo = mt_rand(1, 99999);
for($i=0;$i<$count;$i++) {
$image_names[]=$randNo.$_FILES["user_image"]["name"][$i];
$image_name=$randNo.$_FILES["user_image"]["name"][$i];
move_uploaded_file($_FILES["user_image"]["tmp_name"][$i],"upload/" .$image_name); }
ob_start(); ?>
<table>
<tr><th>Email</th><td><?=$user_datel->e_mail;?></td></tr>
<tr><th>Name</th><td><?=$user_datel->first_name;?> <?=$user_datel->last_name;?></td></tr>
<tr><th>Href</th><td><?=$user_datel->reffer_link;?></td></tr>
<tr><th>Country</th><td><?=$user_datel->country;?></td></tr>
<tr><th>Category</th><td><?=$user_datel->category;?></td></tr>
<?php foreach($image_names as $image_name ){ $Image_path='http://sexyselfiemagazine.com/function/upload/'.$image_name;?>
<tr><th>Image</th><td><img src="<?=$Image_path;?>" width="500"  height="auto"/></td></tr>
<?php } ?>
</table>
<?php
$root_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
$body = ob_get_contents();  
require_once '../mymail/class.phpmailer.php';
$mail = new PHPMailer();
$contact=(object) $_POST['contact'];
$emails="1squarebiz@gmail.com";
// And the absolute required configurations for sending HTML with attachement 
$mail->setFrom('info@sexyselfiemagazine.com', 'sexy selfie magazine');
$mail->AddAddress("1squarebiz@gmail", "sexy selfie magazine");
$mail->Subject = "New User Submit a Pic"; 
$mail->MsgHTML($body); 
$mail->addAttachment($root_dir.'/function/upload/'.$image_name);  // optional name


$mail->addAttachment('https://dl.dropboxusercontent.com/u/91182461/wallpaper/3D/icon/2.jpg');  // optional name
$subject="New User Submit a Pic";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$emilResult=mail($emails, $subject, $body,  $headers); 

if($mail->Send()) {
$message=urldecode("sucess");
$cat=trim($user_datel->category);	
header( "Location: ../shopping-art.php?message=$message&category=$cat" );
}else{
$message=urldecode("error");	
header( "Location: ../shopping-art.php?message=$message" );	
	}
?>