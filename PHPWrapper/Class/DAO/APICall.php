<?php

/**
 * This class is use to make all the  API call, all the curl request are make here
 *
 * @author Jonathan CHARDON
 */
include_once 'KLogger.php';

class APICall {

    private $_apiKey;
    private $_broadcasterId;
    private $_action;
    private $_jsonDecoded;
    private $_url;
    private $_log;
    private $_logError;

    function __construct($apiKey, $broadcasterId, $url) {
        $this->_log = new KLogger("/var/log/APICall", KLogger::INFO);
        $this->_logError = new KLogger("/var/log/error", KLogger::ERR);

        if (isset($apiKey)) {
            if (isset($broadcasterId)) {
                if (isset($url)) {
                    $this->_apiKey = $apiKey;
                    $this->_broadcasterId = $broadcasterId;
                    $this->_url = $url;
                } else {
                    $this->_logError->logError(__LINE__ . " " . __FILE__ . "URL miss initialized");
                    throw new InvalidArgumentException("URL miss initialized in APICall contructor.");
                }
            } else {
                $this->_logError->logError(__LINE__ . " " . __FILE__ . "Broadcaster_id miss initialized in APICall contructor");
                throw new InvalidArgumentException("Broadcaster_id miss initialized in APICall contructor.");
            }
        } else {

            $this->_logError->logError(__LINE__ . " " . __FILE__ . "APIKey miss initialized");
            throw new InvalidArgumentException("APIKey miss initialized in APICall contructor.");
        }
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
        if ($apiKey == null) {
            throw new InvalidArgumentException("Parameter APIKey can't be null for the setApiKey() function.");
        } else {
            if ($apiKey == "") {
                throw new InvalidArgumentException("API Key can't be blank");
            } else {
                $this->_apiKey = $apiKey;
            }
        }
    }

    public function setBroadcasterId($broadcasterId) {
        if ($broadcasterId != null) {
            if (is_numeric($broadcasterId)) {
                $this->_broadcasterId = $broadcasterId;
            } else {
                throw new UnexpectedValueException("Broadcaster_id parameter is not numeric for the setBroadcasterId() function.");
            }
        } else {

            throw new UnexpectedValueException("Broadcaster_id parameter can't be null for the setBroadcasterId() function.");
        }

        $this->_broadcasterId = $broadcasterId;
    }

    public function setAction($action) {
        if ($action != null) {

            if ($action == "POST" || $action == "DELETE" || $action == "GET") {
                
            } else {
                throw new UnexpectedValueException("Wrong value for the setAction() function (can be POST,DELETE or GET).");
            }
        } else {

            throw new UnexpectedValueException("Action parameter can't be null for the setAction() function.");
        }


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
        $this->_log->logInfo("action = $action ; url= $url");
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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
                    throw new InvalidArgumentException ("Wrong value for the setAction() function (can be POST,DELETE or GET).");
                    break;
            }

            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $output = curl_exec($ch);

            $this->_jsonDecoded = json_decode($output, true);

            if (curl_errno($ch)) {
                return 'error:' . curl_error($ch);
            }
            curl_close($ch);
        } catch (Exception $e) {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . " " . $e->getMessage());
            trigger_error($e->getMessage(), E_USER_WARNING);
        }
    }

    function ApiRequestWithRawData($url) {
//use to make API call for the Raw return (like embed code)
        $this->_log->logInfo("GET RAW DATA url= $url");
        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CAINFO, "cacert.pem");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
            curl_setopt($ch, CURLOPT_VERBOSE, 1);

            $output = curl_exec($ch);

            $this->_jsonDecoded = $output;
            if (curl_errno($ch)) {
                echo 'error:' . curl_error($ch);
            }
            curl_close($ch);
        } catch (Exception $e) {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . " GET RAW DATA url = " . $url . $e->getMessage());
            trigger_error($e->getMessage(), E_USER_WARNING);
        }
    }

}
