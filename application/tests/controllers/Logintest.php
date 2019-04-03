<?php
include_once("/var/www/html/codeigniter/application/vendor/autoload.php");
use GuzzleHttp\Client;
class Logintest extends TestCase
{
    protected $client;
    protected function setUp() {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost/codeigniter',
            'exceptions' => false
        ]);
    }
  public function test_logincase()
  {
    $response = $this->client->post('login', [
        'form_params' => [
            'email' => 'yaka@gmail.com',
            'password' => '123456'
        ]
    ]);
                $data=$response->getBody();
            $array=json_decode($data);

    $this->assertEquals("200",$array->message);
    $this->assertEquals("204",$array->message, 'Invalid credentials given');
  }
 
}
