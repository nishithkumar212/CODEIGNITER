<?php
require_once '/var/www/html/codeigniter/application/Rabbitmq/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
class Receiver
{
    public function receiverMail()
    {   
        $Rabbit = new RabbitConstants();
        $connection = new AMQPStreamConnection($Rabbit->host,$Rabbit->port,$Rabbit->username,$Rabbit->password);
        $channel    = $connection->channel();
        $channel->queue_declare($Rabbit->queuename, false, false, false, false);
        
        $callback = function ($msg) {

            $Rabbit = new RabbitConstants();
            $data = json_decode($msg->body, true);
            $to_email   = $data['to_email'];
            $subject    = $data['subject'];
            $message    = $data['message'];
           
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername($Rabbit->senderEmailID)
                ->setPassword($Rabbit->senderPassword);
           
            $mailer = new Swift_Mailer($transport);
            $message = (new Swift_Message($subject))
                ->setFrom($Rabbit->senderEmailID)
                ->setTo([$to_email])
                ->setBody($message);
            
            $result = $mailer->send($message);
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $channel->basic_consume($Rabbit->queuename, '', false, false, false, false, $callback);

        $channel->basic_qos(null, 1, null);
        // while (count($channel->callbacks)) {
        //     $channel->wait();
        // }
    }
}
