<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZeebeClient;

/**
 */
class GatewayClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     *
     * Iterates through all known partitions round-robin and activates up to the requested
     * maximum and streams them back to the client as they are activated.
     *
     * Errors:
     * INVALID_ARGUMENT:
     * - type is blank (empty string, null)
     * - worker is blank (empty string, null)
     * - timeout less than 1
     * - maxJobsToActivate is less than 1
     * @param \ZeebeClient\ActivateJobsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ActivateJobs(\ZeebeClient\ActivateJobsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/gateway_protocol.Gateway/ActivateJobs',
        $argument,
        ['\ZeebeClient\ActivateJobsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Cancels a running workflow instance
     *
     * Errors:
     * NOT_FOUND:
     * - no workflow instance exists with the given key
     * @param \ZeebeClient\CancelWorkflowInstanceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CancelWorkflowInstance(\ZeebeClient\CancelWorkflowInstanceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CancelWorkflowInstance',
        $argument,
        ['\ZeebeClient\CancelWorkflowInstanceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Completes a job with the given variables, which allows completing the associated service task.
     *
     * Errors:
     * NOT_FOUND:
     * - no job exists with the given job key. Note that since jobs are removed once completed,
     * it could be that this job did exist at some point.
     *
     * FAILED_PRECONDITION:
     * - the job was marked as failed. In that case, the related incident must be resolved before
     * the job can be activated again and completed.
     * @param \ZeebeClient\CompleteJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CompleteJob(\ZeebeClient\CompleteJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CompleteJob',
        $argument,
        ['\ZeebeClient\CompleteJobResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Creates and starts an instance of the specified workflow. The workflow definition to use to
     * create the instance can be specified either using its unique key (as returned by
     * DeployWorkflow), or using the BPMN process ID and a version. Pass -1 as the version to use the
     * latest deployed version. Note that only workflows with none start events can be started through
     * this command.
     *
     * Errors:
     * NOT_FOUND:
     * - no workflow with the given key exists (if workflowKey was given)
     * - no workflow with the given process ID exists (if bpmnProcessId was given but version was -1)
     * - no workflow with the given process ID and version exists (if both bpmnProcessId and version were given)
     *
     * FAILED_PRECONDITION:
     * - the workflow definition does not contain a none start event; only workflows with none
     * start event can be started manually.
     *
     * INVALID_ARGUMENT:
     * - the given variables argument is not a valid JSON document; it is expected to be a valid
     * JSON document where the root node is an object.
     * @param \ZeebeClient\CreateWorkflowInstanceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateWorkflowInstance(\ZeebeClient\CreateWorkflowInstanceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CreateWorkflowInstance',
        $argument,
        ['\ZeebeClient\CreateWorkflowInstanceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Behaves similarly to `rpc CreateWorkflowInstance`, except that a successful response is received when the workflow completes successfully.
     * @param \ZeebeClient\CreateWorkflowInstanceWithResultRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateWorkflowInstanceWithResult(\ZeebeClient\CreateWorkflowInstanceWithResultRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CreateWorkflowInstanceWithResult',
        $argument,
        ['\ZeebeClient\CreateWorkflowInstanceWithResultResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Deploys one or more workflows to Zeebe. Note that this is an atomic call,
     * i.e. either all workflows are deployed, or none of them are.
     *
     * Errors:
     * INVALID_ARGUMENT:
     * - no resources given.
     * - if at least one resource is invalid. A resource is considered invalid if:
     * - it is not a BPMN or YAML file (currently detected through the file extension)
     * - the resource data is not deserializable (e.g. detected as BPMN, but it's broken XML)
     * - the workflow is invalid (e.g. an event-based gateway has an outgoing sequence flow to a task)
     * @param \ZeebeClient\DeployWorkflowRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeployWorkflow(\ZeebeClient\DeployWorkflowRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/DeployWorkflow',
        $argument,
        ['\ZeebeClient\DeployWorkflowResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Marks the job as failed; if the retries argument is positive, then the job will be immediately
     * activatable again, and a worker could try again to process it. If it is zero or negative however,
     * an incident will be raised, tagged with the given errorMessage, and the job will not be
     * activatable until the incident is resolved.
     *
     * Errors:
     * NOT_FOUND:
     * - no job was found with the given key
     *
     * FAILED_PRECONDITION:
     * - the job was not activated
     * - the job is already in a failed state, i.e. ran out of retries
     * @param \ZeebeClient\FailJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FailJob(\ZeebeClient\FailJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/FailJob',
        $argument,
        ['\ZeebeClient\FailJobResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Reports a business error (i.e. non-technical) that occurs while processing a job. The error is handled in the workflow by an error catch event. If there is no error catch event with the specified errorCode then an incident will be raised instead.
     *
     * Errors:
     * NOT_FOUND:
     * - no job was found with the given key
     *
     * FAILED_PRECONDITION:
     * - the job is not in an activated state
     * @param \ZeebeClient\ThrowErrorRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ThrowError(\ZeebeClient\ThrowErrorRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/ThrowError',
        $argument,
        ['\ZeebeClient\ThrowErrorResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Publishes a single message. Messages are published to specific partitions computed from their
     * correlation keys.
     *
     * Errors:
     * ALREADY_EXISTS:
     * - a message with the same ID was previously published (and is still alive)
     * @param \ZeebeClient\PublishMessageRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function PublishMessage(\ZeebeClient\PublishMessageRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/PublishMessage',
        $argument,
        ['\ZeebeClient\PublishMessageResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Resolves a given incident. This simply marks the incident as resolved; most likely a call to
     * UpdateJobRetries or SetVariables will be necessary to actually resolve the
     * problem, following by this call.
     *
     * Errors:
     * NOT_FOUND:
     * - no incident with the given key exists
     * @param \ZeebeClient\ResolveIncidentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ResolveIncident(\ZeebeClient\ResolveIncidentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/ResolveIncident',
        $argument,
        ['\ZeebeClient\ResolveIncidentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Updates all the variables of a particular scope (e.g. workflow instance, flow element instance)
     * from the given JSON document.
     *
     * Errors:
     * NOT_FOUND:
     * - no element with the given elementInstanceKey exists
     * INVALID_ARGUMENT:
     * - the given variables document is not a valid JSON document; valid documents are expected to
     * be JSON documents where the root node is an object.
     * @param \ZeebeClient\SetVariablesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetVariables(\ZeebeClient\SetVariablesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/SetVariables',
        $argument,
        ['\ZeebeClient\SetVariablesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Obtains the current topology of the cluster the gateway is part of.
     * @param \ZeebeClient\TopologyRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Topology(\ZeebeClient\TopologyRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/Topology',
        $argument,
        ['\ZeebeClient\TopologyResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Updates the number of retries a job has left. This is mostly useful for jobs that have run out of
     * retries, should the underlying problem be solved.
     *
     * Errors:
     * NOT_FOUND:
     * - no job exists with the given key
     *
     * INVALID_ARGUMENT:
     * - retries is not greater than 0
     * @param \ZeebeClient\UpdateJobRetriesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateJobRetries(\ZeebeClient\UpdateJobRetriesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/UpdateJobRetries',
        $argument,
        ['\ZeebeClient\UpdateJobRetriesResponse', 'decode'],
        $metadata, $options);
    }

}
