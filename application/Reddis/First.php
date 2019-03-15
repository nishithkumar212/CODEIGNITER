<?php
$redis=new Redis();
$redis->connect('localhost',6379);
$redis->set('website','www.nishithkumar.com');
$website=$redis->get('website');
echo $website;
?>
