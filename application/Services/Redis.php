<?php
class Redis Extends CI_Controller
{
    public function connection()
    {
    $client = new Predis\Client(array(
        'host' => '127.0.0.1',
        'port' => 6379,
        'password' => null
    ));
    return $client;
}
}