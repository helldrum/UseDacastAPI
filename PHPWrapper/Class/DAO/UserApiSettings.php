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
                if(isset($ApiKey)){

                $this->_broadcasterID = $broadcasterID;
                $this->_ApiKey = $ApiKey;
                }else{
                     trigger_error("API Key is not set in UsersApiSettings.", E_USER_WARNING);
                }
            } else {
                trigger_error("Brodcaster_id is not numeric in UsersApiSettings.", E_USER_WARNING);
            }
        } else {

            trigger_error("Brodcaster_id is not set in UsersApiSettings.", E_USER_WARNING);
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
