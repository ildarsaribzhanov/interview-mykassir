<?php
chdir(dirname(__DIR__));
require 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use MongoDB\Client as MongoClient;

$connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
$channel    = $connection->channel();
$channel->queue_declare('queue-tasks', false, false, false, false);

$callback = function ($msg) {
    echo " [x] Received ", $msg->body, "\n";
    
    $rel = json_decode($msg->body, 1);
    
    $rel_id = $rel['device'] . '_' . $rel['doc_num'];
    
    $rel['_id'] = $rel_id;
    
    $collection = (new MongoClient('mongodb://mongo:27017'))->interview->dev_doc_relation;
    
    $document = $collection->findOne(['_id' => $rel_id]);
    
    if ($document === null) {
        $collection->insertOne($rel);
    }
};

$channel->basic_consume('queue-tasks', '', false, true, false, false, $callback);
while (count($channel->callbacks)) {
    $channel->wait();
}

$channel->close();
$connection->close();