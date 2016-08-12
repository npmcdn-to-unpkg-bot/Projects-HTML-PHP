<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php 
$kitties = "kitties/";
$kitties_images = glob($kitties."*.jpg");

$puppies = "puppies/";
$puppies_images = glob($puppies."*.jpg");


/*foreach($kitties_images as $kitties_image) {
echo '<img src="'.$kitties_image.'" /><br />';
}*/

$i=1;
foreach(array_combine($kitties_images,$puppies_images) as $kitties_image => $puppies_image ) {
    rename($kitties_image, "all_images/".$i.".jpg");
	$i++;
	rename($puppies_image, "all_images/".$i.".jpg");
	
echo '<img src="'.$kitties_image.'" /><br />';
echo '<img src="'.$puppies_image.'" /><br />';
$i++;
} ?>

</body>
</html>
