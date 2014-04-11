<?php

/**
 * This class is use to make all the  API call, all the curl request are make here
 *
 * @author Jonathan CHARDON
 */
class APICall {

    private $_apiKey;
    private $_broadcasterId;
    private $_action;
    private $_jsonDecoded;
    private $_url;

    function __construct($_apiKey, $_broadcasterId, $_url) {
        $this->_apiKey = $_apiKey;
        $this->_broadcasterId = $_broadcasterId;
        $this->_url = $_url;
    }

    public function getApiKey() {
        return $this->_apiKey;
    }

    public function getBroadcasterId() {
        return $this->_broadcasterId;
    }

    public function getAction() {
        return $this->_action;
    }

    public function getUrl() {
        return $this->_url;
    }

    public function setApiKey($apiKey) {
        $this->_apiKey = $apiKey;
    }

    public function setBroadcasterId($broadcasterId) {
        $this->_broadcasterId = $broadcasterId;
    }

    public function setAction($action) {
        $this->_action = $action;
    }

    public function setUrl($url) {
        $this->_url = $url;
    }

    public function getJsonDecoded() {
        return $this->_jsonDecoded;
    }

    public function setJsonDecoded($jsonDecoded) {
        $this->_jsonDecoded = $jsonDecoded;
    }

    function ApiRequest($action, $url) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
            curl_setopt($ch, CURLOPT_VERBOSE, 1);

            switch ($action) {
                case "POST":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    break;
                case "GET":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    break;
                case "DELETE":
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                    break;

                default:
                    break;
            }

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            
            $output = curl_exec($ch);
            curl_close($ch);
            
            $this->_jsonDecoded = json_decode($output, true);
            
        } catch (Exception $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }

}
