<?php
$status = $_SERVER['REDIRECT_STATUS'];
$codes = array(
  403 => array('403 Forbidden', 'The server has refused to fulfill your request.'),
  404 => array('404 Not Found', 'The document/files requested was not found on this server.'),
  405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specific resource.'),
  408 => array('408 Request Timeout', 'Your browser failed to send a requt in the time allowed by the server.'),
  500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
  502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
  504 => array('504 Gateway Timout', 'The upstream server failed to send a request in the time allowed by the server.'),
);

$title = $codes[$status][0];
$message = $codes[$status][1];

if($title == false || strlen($status) != 3){
  $title = 'Unrecognized Status Code';
  $message = 'The website returned an Unrecognized status code.';
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Profsmato - <?php echo $title; ?></title>
    <style>
      html, body{
        font-size: 100%;
      }

      body{
        font-family: Arial, sans-serif;
        background: #f7f7f7;
        margin: 0;
        padding: 0;
      }

      #content{
        box-sizing: border-box;
        max-width: 100%;
        width: 800px;
        margin: 50px, auto;
        padding: 50px;
        background: #fff;
      }

      h1{
        margin-top: 0
      }

      p{
        font-size: 1rem;
        line-height: 1.5;
      }
    </style>
  </head>
  <body>
    <div id="content">
      <h1><?php echo $title ?></h1>
      <p><?php echo $message ?></p>
    </div>
  </body>
</html>
