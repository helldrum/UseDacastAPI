<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserApiSettings
 *
 * @author User
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
