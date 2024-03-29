<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace ZeebeClient;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.DeployProcessRequest</code>
 */
class DeployProcessRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * List of process resources to deploy
     *
     * Generated from protobuf field <code>repeated .gateway_protocol.ProcessRequestObject processes = 1;</code>
     */
    private $processes;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \ZeebeClient\ProcessRequestObject[]|\Google\Protobuf\Internal\RepeatedField $processes
     *           List of process resources to deploy
     * }
     */
    public function __construct($data = NULL) {
        \ZeebeClient\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * List of process resources to deploy
     *
     * Generated from protobuf field <code>repeated .gateway_protocol.ProcessRequestObject processes = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getProcesses()
    {
        return $this->processes;
    }

    /**
     * List of process resources to deploy
     *
     * Generated from protobuf field <code>repeated .gateway_protocol.ProcessRequestObject processes = 1;</code>
     * @param \ZeebeClient\ProcessRequestObject[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setProcesses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \ZeebeClient\ProcessRequestObject::class);
        $this->processes = $arr;

        return $this;
    }

}

