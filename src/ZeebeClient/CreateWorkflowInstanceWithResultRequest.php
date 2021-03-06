<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace ZeebeClient;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.CreateWorkflowInstanceWithResultRequest</code>
 */
class CreateWorkflowInstanceWithResultRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.gateway_protocol.CreateWorkflowInstanceRequest request = 1;</code>
     */
    protected $request = null;
    /**
     * timeout (in ms). the request will be closed if the workflow is not completed
     * before the requestTimeout.
     * if requestTimeout = 0, uses the generic requestTimeout configured in the gateway.
     *
     * Generated from protobuf field <code>int64 requestTimeout = 2;</code>
     */
    protected $requestTimeout = 0;
    /**
     * list of names of variables to be included in `CreateWorkflowInstanceWithResultResponse.variables`
     * if empty, all visible variables in the root scope will be returned.
     *
     * Generated from protobuf field <code>repeated string fetchVariables = 3;</code>
     */
    private $fetchVariables;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \ZeebeClient\CreateWorkflowInstanceRequest $request
     *     @type int|string $requestTimeout
     *           timeout (in ms). the request will be closed if the workflow is not completed
     *           before the requestTimeout.
     *           if requestTimeout = 0, uses the generic requestTimeout configured in the gateway.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $fetchVariables
     *           list of names of variables to be included in `CreateWorkflowInstanceWithResultResponse.variables`
     *           if empty, all visible variables in the root scope will be returned.
     * }
     */
    public function __construct($data = NULL) {
        \ZeebeClient\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.gateway_protocol.CreateWorkflowInstanceRequest request = 1;</code>
     * @return \ZeebeClient\CreateWorkflowInstanceRequest
     */
    public function getRequest()
    {
        return isset($this->request) ? $this->request : null;
    }

    public function hasRequest()
    {
        return isset($this->request);
    }

    public function clearRequest()
    {
        unset($this->request);
    }

    /**
     * Generated from protobuf field <code>.gateway_protocol.CreateWorkflowInstanceRequest request = 1;</code>
     * @param \ZeebeClient\CreateWorkflowInstanceRequest $var
     * @return $this
     */
    public function setRequest($var)
    {
        GPBUtil::checkMessage($var, \ZeebeClient\CreateWorkflowInstanceRequest::class);
        $this->request = $var;

        return $this;
    }

    /**
     * timeout (in ms). the request will be closed if the workflow is not completed
     * before the requestTimeout.
     * if requestTimeout = 0, uses the generic requestTimeout configured in the gateway.
     *
     * Generated from protobuf field <code>int64 requestTimeout = 2;</code>
     * @return int|string
     */
    public function getRequestTimeout()
    {
        return $this->requestTimeout;
    }

    /**
     * timeout (in ms). the request will be closed if the workflow is not completed
     * before the requestTimeout.
     * if requestTimeout = 0, uses the generic requestTimeout configured in the gateway.
     *
     * Generated from protobuf field <code>int64 requestTimeout = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setRequestTimeout($var)
    {
        GPBUtil::checkInt64($var);
        $this->requestTimeout = $var;

        return $this;
    }

    /**
     * list of names of variables to be included in `CreateWorkflowInstanceWithResultResponse.variables`
     * if empty, all visible variables in the root scope will be returned.
     *
     * Generated from protobuf field <code>repeated string fetchVariables = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFetchVariables()
    {
        return $this->fetchVariables;
    }

    /**
     * list of names of variables to be included in `CreateWorkflowInstanceWithResultResponse.variables`
     * if empty, all visible variables in the root scope will be returned.
     *
     * Generated from protobuf field <code>repeated string fetchVariables = 3;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFetchVariables($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->fetchVariables = $arr;

        return $this;
    }

}

