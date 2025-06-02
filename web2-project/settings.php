<?php
define('DISPLAY_ERRORS', 1);
define('INCLUDE_PATH', './scripts' . PATH_SEPARATOR . './modules');
$conf = array(
  'sitename' => 'PROJECT',
  'theme' => './theme',
  'charset' => 'UTF-8',
  'clean_urls' => TRUE,
  'display_errors' => 1,
  'date_format' => 'Y.m.d',
  'date_format_2' => 'Y.m.d H:i',
  'date_format_3' => 'd.m.Y',
  'basedir' => '/web2-project/',
  'login' => 'admin',
  'password' => '123',
);
$urlconf = array(
  '' => array('module' => 'front'),  // Главная страница
  '/^login$/' => array('module' => 'login'), // Страница логина
  '/^admin$/' => array('module' => 'admin'),
  '/^admin.php$/' => array('module' => 'admin'), 
  '/^logout$/' => array('module' => 'logout'),
);

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
header('Content-Type: text/html; charset=' . $conf['charset']);