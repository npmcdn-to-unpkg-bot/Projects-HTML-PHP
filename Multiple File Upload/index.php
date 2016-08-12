<!-- IMPORTANT:  FORM's enctype must be "multipart/form-data" -->
<form method="post" action="index.php" enctype="multipart/form-data">
  <input name="user_image[]" id="filesToUpload" type="file" multiple />
  <input type="submit" value="submit" />
</form>

<?php
$count = count($_FILES['user_image']['name']);
$randNo = mt_rand(1, 99999);
for($i=0;$i<$count;$i++) {
$image_names[]=$randNo.$_FILES["user_image"]["name"][$i];
$image_name=$randNo.$_FILES["user_image"]["name"][$i];
move_uploaded_file($_FILES["user_image"]["tmp_name"][$i],"upload/" .$image_name);
}
var_dump($image_names);
?>
