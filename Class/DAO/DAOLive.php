<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOLive
 *
 * @author Jonathan CHARDON
 */
class DAOLive {

    const API_URL = "https://www.dacast.com/backend/api/live";

    private $_APICall;
    private $_userSettings;
    private $_live;
    private $_fullUrlCall;

    function __construct($userSettings, $live) {
        if (isset($live)) {

            $this->_live = $live;
        } else {

            $this->_live = new Live();
        }
        if (isset($userSettings) && ($userSettings instanceof UserApiSettings)) {
            $this->_userSettings = $userSettings;
        } else {
            trigger_error("userSetting miss initialized in DAOLive contructor.", E_USER_ERROR);
        }
    }

    public function getUserSettings() {
        return $this->_userSettings;
    }

    public function getLiveById($live_id) {
        $message = null;

        if (is_numeric($live_id)) {
            $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                    "?bid=" . $this->_userSettings->getBroadcasterID() .
                    "&apikey=" . $this->_userSettings->getApiKey();


            $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
            $this->_APICall->ApiRequest("DELETE", $this->_fullUrlCall);

            $decoded = $this->_APICall->getJsonDecoded();

            if (isset($decoded['error']['message'])) {
                $message = "Error :  " . $decoded['error']['message'];
            } else {
                $message = $decoded['message'];
            }

             return $this->_live;
        } else {
            trigger_error("live_id is not numeric.", E_USER_ERROR);
        }

       
    }

    public function getFullUrlCall() {
        return $this->_fullUrlCall;
    }

    public function setUserSettings($userSettings) {
        $this->_userSettings = $userSettings;
    }

    public function setLive($live) {
        $this->_live = $live;
    }

    public function setFullUrlCall($fullUrlCall) {
        $this->_fullUrlCall = $fullUrlCall;
    }

    private function decodeOneLiveJson($decode) {
        
    }

    private function decodeAllLiveJson($decode) {
        
    }

    public function deleteLiveById($live_id) {
        $message = null;

        if (is_numeric($live_id)) {
            $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                    "?bid=" . $this->_userSettings->getBroadcasterID() .
                    "&apikey=" . $this->_userSettings->getApiKey();


            $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
            $this->_APICall->ApiRequest("DELETE", $this->_fullUrlCall);

            $decoded = $this->_APICall->getJsonDecoded();

            if (isset($decoded['error']['message'])) {
                $message = "Error :  " . $decoded['error']['message'];
            } else {
                $message = $decoded['message'];
            }


            return $message;
        } else {
            trigger_error("live_id is not numeric.", E_USER_ERROR);
        }
    }

}
