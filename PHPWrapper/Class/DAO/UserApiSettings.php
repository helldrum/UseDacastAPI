<?php

/**
 * This Class is use to set the users Settings for the API call (APIKEY and Broadcaster ID)
 * This is not a Singleton pattern in case of the user need to manage more than one account
 * @author Jonathan CHARDON
 */
class UserApiSettings {

    private $_broadcasterID;
    private $_ApiKey;

    function __construct($broadcasterID, $ApiKey) {
        if (isset($broadcasterID)) {
            if (is_numeric($broadcasterID)) {
                if (isset($ApiKey)) {
                    if (strlen($ApiKey) == 20) {
                        $this->_broadcasterID = $broadcasterID;
                        $this->_ApiKey = $ApiKey;
                    } else {
                        throw new LengthException("Length of APIKey need to be 20 characters.");
                    }
                } else {
                    throw new InvalidArgumentException("APIKey is not set in UsersApiSettings.");
                }
            } else {
                throw new InvalidArgumentException("Broadcaster_id is not numeric in UsersApiSettings.");
            }
        } else {

            throw new InvalidArgumentException("Broadcaster_id is not set in UsersApiSettings.");
        }
    }

    public function setBroadcasterID($broadcasterID) {
        $this->_broadcasterID = $broadcasterID;
    }

    public function setApiKey($ApiKey) {
        $this->_ApiKey = $ApiKey;
    }

    public function getBroadcasterID() {
        return $this->_broadcasterID;
    }

    public function getApiKey() {
        return $this->_ApiKey;
    }

    public function __toString() {

        $toString = "apiKey = $this->_apiKey<br>
            broadcasterId= $this->_broadcasterId<br>";
        return $toString;
    }

}
