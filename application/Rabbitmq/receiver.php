<?php

require_once '/var/www/html/codeigniter/application/Rabbitmq/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
include_once("/var/www/html/codeigniter/application/static/Rabbitconstants.php");
class Receiver
{
    /*
    name: hello
    type: direct
    passive: false
    durable: true // the exchange will survive server restarts
    auto_delete: false //the exchange won't be deleted once the channel is closed.
     */
    public function receiverMail()
    {   
        $Rabbit = new RabbitConstants();
        
        $connection = new AMQPStreamConnection($Rabbit->host,$Rabbit->port,$Rabbit->username,$Rabbit->password);
        $channel    = $connection->channel();
        $channel->queue_declare($Rabbit->queuename, false, false, false, false);
        $email=$Rabbit->senderEmailID;
        $pass=$Rabbit->senderPassword;
        $callback = function ($msg) {

            $Rabbit = new RabbitConstants();
            $data = json_decode($msg->body, true);

            // $from       = $data['from'];
            // $from_email = $data['from_email'];
            $to_email   = $data['to_email'];
            $subject    = $data['subject'];
            $message    = $data['message'];
            /**
             * Create the Transport
             */
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername($Rabbit->senderEmailID)
                ->setPassword($Rabbit->senderPassword);
            /**
             * Create the Mailer using your created Transport
             */
            $mailer = new Swift_Mailer($transport);

            /**
             * Create a message
             */
            $message = (new Swift_Message($subject))
                ->setFrom($Rabbit->senderEmailID)
                ->setTo([$to_email])
                ->setBody($message);
            /**
             * Send the message
             */
            $result = $mailer->send($message);
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        $channel->basic_consume($Rabbit->queuename, '', false, false, false, false, $callback);

        $channel->basic_qos(null, 1, null);
        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
}
