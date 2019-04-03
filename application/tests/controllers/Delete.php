<?php
include_once("/var/www/html/codeigniter/application/vendor/autoload.php");
use GuzzleHttp\Client;
class Delete extends Testcase
{
    protected $client;
    protected function setUp() {
        $this->client = new GuzzleHttp\Client([
            'base_uri' => 'http://localhost/codeigniter/',
            'exceptions' => false
        ]);
    }
    public function testdelete()
    {
      $response = $this->client->post('deletenote', [
          'form_params' => [
            'eid'=>'1231321'
          ]
      ]);
                  $data=$response->getBody();
              $array=json_decode($data);
  
      $this->assertEquals("200",$array->message,'success');
    //   $this->assertEquals("204",$array->message, 'Invalid credentials given');
    }
  
}