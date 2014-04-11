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

        if (is_numeric($broadcasterID)) {

            $this->_broadcasterID = $broadcasterID;
            $this->_ApiKey = $ApiKey;
        } else {
            trigger_error("BID is not numeric.", E_USER_ERROR);
        }
    }

    public function getBroadcasterID() {
        return $this->_broadcasterID;
    }

    public function getApiKey() {
        return $this->_ApiKey;
    }

    public function setBroadcasterID($broadcasterID) {
        $this->_broadcasterID = $broadcasterID;
    }

    public function setApiKey($ApiKey) {
        $this->_ApiKey = $ApiKey;
    }

}
