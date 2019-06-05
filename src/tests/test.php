<?php
include_once "./vendor/autoload.php";

$client = new Pubsub\PubSubClient('localhost:9900', [
    'credentials' => Grpc\ChannelCredentials::createInsecure(),
]);

$topic = "a|b|c|d";
$clientId = "sfa23423423";
//订阅测试

$Identity = new \Pubsub\Identity();
$Identity->setClientId($clientId);

$Subscription= new \Pubsub\Subscription();
$Subscription->setTopic($topic);

$SubscribeRequest = new \Pubsub\SubscribeRequest();
$SubscribeRequest->setSubscription($Subscription);
$SubscribeRequest->setIdentity($Identity);

list($sub, $status) = $client->Subscribe($SubscribeRequest)->wait();

if($status->code == 0){
    $responses = $client->Pull($Identity)->responses();
    foreach ($responses as $pull) {
        var_dump($pull->getTopic());
    }
}

//发布测试
$msgArr = ["内容1","内容2"];
$message = [];
foreach($msgArr  as $v){
    $message[] = (new \Pubsub\Message())->setTopic($topic)->setPayload($v);
}

$public = new \Pubsub\PublishRequest();
$public->setMessages($message);
$public->setTopic($topic);
list($respone, $status) = $client->Publish($public)->wait();
//var_dump($status);
?>