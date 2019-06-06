# PHP实现的grpc客户端

## 一、安装

composer安装依赖包

```powershell
composer install huangzonglong/pubsub
```

安装php的grpc扩展：<http://pecl.php.net/package/gRPC> 

```shell
pecl install grpc
```

## 二、demo运行

tests目录中有测试文件test.php可以直接运行，前提是先启动服务端

## 三、代码指引

文件结构 是通过proto自动自动生成的，主要关注的是标红的文件，其中PubSubClient是调用服务的php客户端实现。其他的每个文件对应于proto协议文件定义的服务方法和消息类型的实现类。

![1559788134942](C:\Users\Administrator\AppData\Roaming\Typora\typora-user-images\1559788134942.png)

1、引入自动加载文件，Pubsub\PubSubClient类继承了grpc类，实现了连接grpc服务端，返回一个客户端连接对象。

```php
include_once "./vendor/autoload.php";

$client = new Pubsub\PubSubClient('localhost:9900', [
    'credentials' => Grpc\ChannelCredentials::createInsecure(),
]);

```

2、接下来，在使用$client调用服务前，需要填充所需的参数，参数都是通过不同的对象去设置，根据proto文件，可以知道那个参数属于哪个对象。

```php
$Identity = new \Pubsub\Identity();
$Identity->setClientId($clientId);

$Subscription= new \Pubsub\Subscription();
$Subscription->setTopic($topic);

$SubscribeRequest = new \Pubsub\SubscribeRequest();
$SubscribeRequest->setSubscription($Subscription);
$SubscribeRequest->setIdentity($Identity);
```

调用服务订阅服务，然后调用pull服务监听topic消息（订阅）

```php
list($sub, $status) = $client->Subscribe($SubscribeRequest)->wait();

if($status->code == 0){
    $responses = $client->Pull($Identity)->responses();
    foreach ($responses as $pull) {
        var_dump($pull->getTopic());
    }
}

```

3、消息发布，同样，在调用服务前，要填充所需参数

```php
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
```

## 四、Topic

1、topic格式说明

topic是字符串，分成固定的四个层级，每个层级用竖线分隔表示，

如：feeFood|position|update|google，feeFood|position|update|baidu，qqty|chat|say|roomID

，描述为： 项目|服务|方法|可扩展参数

2、订阅时，可以是写全topic，也可以将可变参数改成+号，比如，qqty|chat|say|+，这样就可以订阅到所有房间的聊天

3、发布时，一定要写全topic
