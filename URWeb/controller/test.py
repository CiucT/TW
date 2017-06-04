<?php
$request = new FacebookRequest(
  $session,
  'GET',
  '/{check-in-id}'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
echo $graphObject['place'];
?>