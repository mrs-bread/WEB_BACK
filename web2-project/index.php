<?php
include('./settings.php');
ini_set('display_errors', DISPLAY_ERRORS);
ini_set('include_path', INCLUDE_PATH);

include('./scripts/db.php');
include('./scripts/init.php');
$request = array(
  'url' => isset($_GET['q']) ? $_GET['q'] : '',
  'method' => isset($_POST['method']) && in_array($_POST['method'], array('get', 'post', 'put', 'delete')) ? $_POST['method'] : $_SERVER['REQUEST_METHOD'],
  'get' => !empty($_GET) ? $_GET : array(),
  'post' => !empty($_POST) ? $_POST : array(),
  'put' => !empty($_POST) && !empty($_POST['method']) && $_POST['method'] == 'put' ? $_POST : array(),
  'delete' => !empty($_POST) && !empty($_POST['method']) && $_POST['method'] == 'delete' ? $_POST : array(),
  'Content-Type' => 'text/html',
);

$response = init($request, $urlconf);

if (!empty($response['headers'])) {
  foreach ($response['headers'] as $key => $value) {
    if (is_string($key)) {
      header(sprintf('%s: %s', $key, $value));
    }
    else {
      header($value);
    }
  }
}

if (!empty($response['entity'])) {
  print($response['entity']);
}