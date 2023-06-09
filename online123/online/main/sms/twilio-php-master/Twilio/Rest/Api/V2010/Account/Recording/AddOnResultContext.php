<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Recording;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Api\V2010\Account\Recording\AddOnResult\PayloadList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property \Twilio\Rest\Api\V2010\Account\Recording\AddOnResult\PayloadList payloads
 * @method \Twilio\Rest\Api\V2010\Account\Recording\AddOnResult\PayloadContext payloads(string $sid)
 */
class AddOnResultContext extends InstanceContext {
    protected $_payloads = null;

    /**
     * Initialize the AddOnResultContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $accountSid The account_sid
     * @param string $referenceSid The reference_sid
     * @param string $sid Fetch by unique result Sid
     * @return \Twilio\Rest\Api\V2010\Account\Recording\AddOnResultContext 
     */
    public function __construct(Version $version, $accountSid, $referenceSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'accountSid' => $accountSid,
            'referenceSid' => $referenceSid,
            'sid' => $sid,
        );

        $this->uri = '/Accounts/' . rawurlencode($accountSid) . '/Recordings/' . rawurlencode($referenceSid) . '/AddOnResults/' . rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a AddOnResultInstance
     * 
     * @return AddOnResultInstance Fetched AddOnResultInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new AddOnResultInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['referenceSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the AddOnResultInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Access the payloads
     * 
     * @return \Twilio\Rest\Api\V2010\Account\Recording\AddOnResult\PayloadList 
     */
    protected function getPayloads() {
        if (!$this->_payloads) {
            $this->_payloads = new PayloadList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['referenceSid'],
                $this->solution['sid']
            );
        }

        return $this->_payloads;
    }

    /**
     * Magic getter to lazy load subresources
     * 
     * @param strin