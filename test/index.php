<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Index</title>
</head>
<body>
<?php
    /**
     * Instagram PHP API
     */

     require_once 'instagram.class.php';

      // Initialize class for public requests
      $instagram = new Instagram('ENTER CLIENT ID HERE');

      // Receive AJAX request and create call object
      $tag = $_GET['tag'];
      $maxID = $_GET['max_id'];
      $clientID = $instagram->getApiKey();

      $call = new stdClass;
      $call->pagination->next_max_id = $maxID;
      $call->pagination->next_url = "https://api.instagram.com/v1/tags/{$tag}/media/recent?client_id={$clientID}&max_tag_id={$maxID}";

      // Receive new data
      $media = $instagram->getTagMedia($tag,$auth=false,array('max_tag_id'=>$maxID));

      // Collect everything for json output
      $images = array();
      foreach ($media->data as $data) {
        $images[] = $data->images->thumbnail->url;
      }

      echo json_encode(array(
        'next_id' => $media->pagination->next_max_id,
        'images'  => $images
      ));
?>
</body>
</html>
