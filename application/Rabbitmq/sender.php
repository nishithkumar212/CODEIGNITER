<?php
require_once '/var/www/html/codeigniter/application/Rabbitmq/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

include "/var/www/html/codeigniter/application/Rabbitmq/receiver.php";
include "/var/www/html/codeigniter/application/static/RabbitConstants.php";
class SendMail
{
    public function sendEmail($toEmail, $subject, $body)
    {
        
        $Rabbit = new RabbitConstants();
        
        $connection = new AMQPStreamConnection($Rabbit->host,$Rabbit->port,$Rabbit->username,$Rabbit->password);

        $channel    = $connection->channel();
    
        $channel->queue_declare($Rabbit->queuename, false, false, false, false);
       
        $data = json_encode(array(
            "from"       => $Rabbit->senderEmailID,
            "from_email" => $Rabbit->senderEmailID,
            "to_email"   => $toEmail,
            "subject"    => $subject,
            "message"    => $body,
        ));
        $msg = new AMQPMessage($data, array('delivery_mode' => 2));
        $channel->basic_publish($msg, '',$Rabbit->queuename );
        $obj = new Receiver();
        $obj->receiverMail();
        $channel->close();
        $connection->close();
        return "sent";
    }
}
