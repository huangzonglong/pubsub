<?php
// GENERATED CODE -- DO NOT EDIT!

// Original file comments:
// protoc --go_out=plugins=grpc:. protoc/pubsub.proto 生成代码
namespace Pubsub;

/**
 */
class PubSubClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Pubsub\SubscribeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Subscribe(\Pubsub\SubscribeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/pubsub.PubSub/Subscribe',
        $argument,
        ['\Pubsub\Subscription', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pubsub\SubscribeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Unsubscribe(\Pubsub\SubscribeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/pubsub.PubSub/Unsubscribe',
        $argument,
        ['\Pubsub\Subscription', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pubsub\Identity $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Pull(\Pubsub\Identity $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/pubsub.PubSub/Pull',
        $argument,
        ['\Pubsub\Message', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Pubsub\PublishRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Publish(\Pubsub\PublishRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/pubsub.PubSub/Publish',
        $argument,
        ['\Pubsub\PublishResponse', 'decode'],
        $metadata, $options);
    }

}
