<?php
include_once('class/Verymv.php');
require_once('pages/header.php');

$json = 'static/json/data.json';
$verymv = new verymv();
$data = $verymv::getJsonData($json);

require_once('pages/content.php');
require_once('pages/footer.php');
?>