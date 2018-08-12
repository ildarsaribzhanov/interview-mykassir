<?php

use Interview\Task\TaskMessageHelper;
use Interview\Document\Document;
use Interview\Device\Device;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


chdir(dirname(__DIR__));
require 'vendor/autoload.php';


$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');

$channel = $connection->channel();
$channel->queue_declare('queue-tasks', false, false, false, false);

$max = 10000;

while ($max-- >= 0) {
    $doc    = new Document();
    $device = new Device();
    $task   = new TaskMessageHelper($device->getId(), $doc->getId());
    $msg    = new AMQPMessage($task);
    
    $channel->basic_publish($msg, '', 'queue-tasks');
    
    echo "Add $task \n";
    
    sleep(1);
}


$channel->close();
$connection->close();
