<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: pubsub/protoc/pubsub.proto

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>Message</code>
 */
class Message extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string payload = 1;</code>
     */
    private $payload = '';
    /**
     * Generated from protobuf field <code>string dataType = 2;</code>
     */
    private $dataType = '';
    /**
     * Generated from protobuf field <code>.Subscription topic = 3;</code>
     */
    private $topic = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $payload
     *     @type string $dataType
     *     @type \Subscription $topic
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Pubsub\Protoc\Pubsub::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string payload = 1;</code>
     * @return string
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Generated from protobuf field <code>string payload = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setPayload($var)
    {
        GPBUtil::checkString($var, True);
        $this->payload = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string dataType = 2;</code>
     * @return string
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Generated from protobuf field <code>string dataType = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDataType($var)
    {
        GPBUtil::checkString($var, True);
        $this->dataType = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.Subscription topic = 3;</code>
     * @return \Subscription
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Generated from protobuf field <code>.Subscription topic = 3;</code>
     * @param \Subscription $var
     * @return $this
     */
    public function setTopic($var)
    {
        GPBUtil::checkMessage($var, \Subscription::class);
        $this->topic = $var;

        return $this;
    }

}

