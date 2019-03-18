<?php
require 'autoload.php';
$client = new Predis\Client(array(
  'host' => '127.0.0.1',
  'port' => 6379,
  'password' => null
));
$client->set('foo', 'cowabunga');
$client->set('nishith','achche');
$response = $client->get('foo');
$value=$client->get('nishith');
echo $response."\n";
echo $value;
?>
