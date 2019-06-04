<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ;

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
     * @param \SubscribeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Subscribe(\SubscribeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/PubSub/Subscribe',
        $argument,
        ['\Subscription', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \SubscribeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Unsubscribe(\SubscribeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/PubSub/Unsubscribe',
        $argument,
        ['\Subscription', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Identity $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Pull(\Identity $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/PubSub/Pull',
        $argument,
        ['\Message', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \PublishRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Publish(\PublishRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/PubSub/Publish',
        $argument,
        ['\PublishResponse', 'decode'],
        $metadata, $options);
    }

}
