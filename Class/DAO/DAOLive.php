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
    private $_Currentlive;
    private $_fullUrlCall;
    private $_allLive = array();

    function __construct($userSettings, $live) {
        if (isset($live)) {

            $this->_Currentlive = $live;
        } else {

            $this->_Currentlive = new Live();
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

    public function getCurrentLive() {
        return $this->_Currentlive;
    }

    public function getLiveById($live_id) {

        if (is_numeric($live_id)) {
            if ($live_id != 0) {

                $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                        "?bid=" . $this->_userSettings->getBroadcasterID() .
                        "&apikey=" . $this->_userSettings->getApiKey();

                $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
                $this->_APICall->ApiRequest("GET", $this->_fullUrlCall);

                $decoded = $this->_APICall->getJsonDecoded();

                $this->convertDecodedJsonToLive($decoded);
                return $this->_Currentlive;
            } else {

                trigger_error("live_id = 0 use the function getAllLive instead.", E_USER_ERROR);
            }
        } else {
            trigger_error("live_id is not numeric.", E_USER_ERROR);
        }
    }

    private function convertDecodedJsonToLive($decoded) {

        if (isset($decoded)) {
            $this->_Currentlive->setLiveId($decoded["live"]["id"]);
            $this->_Currentlive->setTitle($decoded["live"]["title"]);
            $this->_Currentlive->setDescription($decoded["live"]["description"]);
            $this->_Currentlive->setCustom_data($decoded["live"]["custom_data"]);
            $this->_Currentlive->setOnline($decoded["live"]["online"]);
            $this->_Currentlive->setStream_type($decoded["live"]["stream_type"]);
            $this->_Currentlive->setAcquisition($decoded["live"]["acquisition"]);
            $this->_Currentlive->setHttp_url($decoded["live"]["http_url"]);
            $this->_Currentlive->setStream_category($decoded["live"]["stream_category"]);
            $this->_Currentlive->setCreationDate($decoded["live"]["creationDate"]);
            $this->_Currentlive->setSaveDate($decoded["live"]["saveDate"]);
            $this->_Currentlive->setUser_id($decoded["live"]["user_id"]);
            $this->_Currentlive->setBandWidth($decoded["live"]["bandWidth"]);
            $this->_Currentlive->setActivateChat($decoded["live"]["activateChat"]);
            $this->_Currentlive->setAutoplay($decoded["live"]["autoplay"]);
            $this->_Currentlive->setNoframe_security($decoded["live"]["noframe_security"]);
            $this->_Currentlive->setEnable_ads($decoded["live"]["enable_ads"]);
            $this->_Currentlive->setEnable_subscription($decoded["live"]["enable_subscription"]);
            $this->_Currentlive->setEnable_payperview($decoded["live"]["enable_payperview"]);
            $this->_Currentlive->setEnable_coupon($decoded["live"]["enable_coupon"]);
            $this->_Currentlive->setIs_private($decoded["live"]["is_private"]);
            $this->_Currentlive->setPublish_on_dacast($decoded["live"]["publish_on_dacast"]);
            $this->_Currentlive->setSeo_index($decoded["live"]["seo_index"]);
            $this->_Currentlive->setArchive_filename($decoded["live"]["archive_filename"]);
            $this->_Currentlive->setCompanion_position($decoded["live"]["companion_position"]);
            $this->_Currentlive->setTheme_id($decoded["live"]["theme_id"]);
            $this->_Currentlive->setWatermark_position($decoded["live"]["watermark_position"]);
            $this->_Currentlive->setWatermark_size($decoded["live"]["watermark_size"]);
            $this->_Currentlive->setWatermark_url($decoded["live"]["watermark_url"]);
            $this->_Currentlive->setId_player_size($decoded["live"]["id_player_size"]);
            $this->_Currentlive->setPlayer_width($decoded["live"]["player_width"]);
            $this->_Currentlive->setPlayer_height($decoded["live"]["player_height"]);
            $this->_Currentlive->setReferers_id($decoded["live"]["referers_id"]);
            $this->_Currentlive->setCountries_id($decoded["live"]["countries_id"]);
            $this->_Currentlive->setThumbnail_id($decoded["live"]["thumbnail_id"]);
            $this->_Currentlive->setSplashscreen_id($decoded["live"]["splashscreen_id"]);
            $this->_Currentlive->setThumbnail_online($decoded["live"]["thumbnail_online"]);
            $this->_Currentlive->setHds($decoded["live"]["hds"]);
            $this->_Currentlive->setHls($decoded["live"]["hls"]);
        } else {
            $message = "Error :  no way to decode Live json.";
            return $message;
        }
    }

    public function getAllLive() {
        $this->_fullUrlCall = self::API_URL . "/" .
                "0?bid=" . $this->_userSettings->getBroadcasterID() .
                "&apikey=" . $this->_userSettings->getApiKey();
        $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
        $this->_APICall->ApiRequest("GET", $this->_fullUrlCall);

        $decoded = $this->_APICall->getJsonDecoded();

        $this->convertDecodedJsonToArrayAllLive($decoded);

        return $this->_allLive;
    }

    private function convertDecodedJsonToArrayAllLive($Arraydecoded) {
        if (isset($Arraydecoded)) {
            //var_dump($Arraydecoded);
            foreach ($Arraydecoded['live'] as $i => $decoded) {
                $this->_allLive[$i] = new Live();
                $this->_allLive[$i]->setLiveId($decoded["id"]);
                $this->_allLive[$i]->setTitle($decoded["title"]);
                $this->_allLive[$i]->setDescription($decoded["description"]);
                $this->_allLive[$i]->setCustom_data($decoded["custom_data"]);
                $this->_allLive[$i]->setOnline($decoded["online"]);
                $this->_allLive[$i]->setStream_type($decoded["stream_type"]);
                $this->_allLive[$i]->setAcquisition($decoded["acquisition"]);
                $this->_allLive[$i]->setHttp_url($decoded["http_url"]);
                $this->_allLive[$i]->setStream_category($decoded["stream_category"]);
                $this->_allLive[$i]->setCreationDate($decoded["creationDate"]);
                $this->_allLive[$i]->setSaveDate($decoded["saveDate"]);
                $this->_allLive[$i]->setUser_id($decoded["user_id"]);
                $this->_allLive[$i]->setBandWidth($decoded["bandWidth"]);
                $this->_allLive[$i]->setActivateChat($decoded["activateChat"]);
                $this->_allLive[$i]->setAutoplay($decoded["autoplay"]);
                $this->_allLive[$i]->setNoframe_security($decoded["noframe_security"]);
                $this->_allLive[$i]->setEnable_ads($decoded["enable_ads"]);
                $this->_allLive[$i]->setEnable_subscription($decoded["enable_subscription"]);
                $this->_allLive[$i]->setEnable_payperview($decoded["enable_payperview"]);
                $this->_allLive[$i]->setEnable_coupon($decoded["enable_coupon"]);
                $this->_allLive[$i]->setIs_private($decoded["is_private"]);
                $this->_allLive[$i]->setPublish_on_dacast($decoded["publish_on_dacast"]);
                $this->_allLive[$i]->setSeo_index($decoded["seo_index"]);
                $this->_allLive[$i]->setArchive_filename($decoded["archive_filename"]);
                $this->_allLive[$i]->setCompanion_position($decoded["companion_position"]);
                $this->_allLive[$i]->setTheme_id($decoded["theme_id"]);
                $this->_allLive[$i]->setWatermark_position($decoded["watermark_position"]);
                $this->_allLive[$i]->setWatermark_size($decoded["watermark_size"]);
                $this->_allLive[$i]->setWatermark_url($decoded["watermark_url"]);
                $this->_allLive[$i]->setId_player_size($decoded["id_player_size"]);
                $this->_allLive[$i]->setPlayer_width($decoded["player_width"]);
                $this->_allLive[$i]->setPlayer_height($decoded["player_height"]);
                $this->_allLive[$i]->setReferers_id($decoded["referers_id"]);
                $this->_allLive[$i]->setCountries_id($decoded["countries_id"]);
                $this->_allLive[$i]->setThumbnail_id($decoded["thumbnail_id"]);
                $this->_allLive[$i]->setSplashscreen_id($decoded["splashscreen_id"]);
                $this->_allLive[$i]->setThumbnail_online($decoded["thumbnail_online"]);
                $this->_allLive[$i]->setHds($decoded["hds"]);
                $this->_allLive[$i]->setHls($decoded["hls"]);
            }
        } else {
            $message = "Error :  no way to decode all Live json.";
            return $message;
        }
    }

    public function getFullUrlCall() {
        return $this->_fullUrlCall;
    }

    public function setUserSettings($userSettings) {
        $this->_userSettings = $userSettings;
    }

    public function setCurrentLive($live) {
        if ($live instanceof Live) {
            $this->_Currentlive = $live;
        } else {
            trigger_error("objet is not instance of Live.", E_USER_ERROR);
        }
    }

    public function setFullUrlCall($fullUrlCall) {
        $this->_fullUrlCall = $fullUrlCall;
    }

    public function deleteLiveById($live_id) {

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

    public function createNewLive($live) {

        if ($live instanceof Live) {

            $this->setCreateLiveURL(0, $live);

            echo $this->_fullUrlCall;

            $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
            $this->_APICall->ApiRequest("POST", $this->_fullUrlCall);

            $decoded = $this->_APICall->getJsonDecoded();

            $this->convertDecodedJsonToLive($decoded);

            if (isset($decoded['error']['message'])) {
                $message = "Error :  " . $decoded['error']['message'];
                return $message;
            }


            return $this->_Currentlive;
        } else {
            trigger_error("live parameter is not a live object.", E_USER_ERROR);
        }
    }

    private function setCreateLiveURL($live_id, $live) {
        $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                "?bid=" . $this->_userSettings->getBroadcasterID() .
                "&apikey=" . $this->_userSettings->getApiKey() .
                "&title=" . urlencode($live->getTitle()) .
                "&description=" . urlencode($live->getDescription()) .
                "&custom_data=" . urlencode($live->getCustom_data()) .
                "&stream_type=" . urlencode($live->getStream_type()) .
                "&backup_url=" . urlencode($live->getBackup_url()) .
                "&stream_category=" . urlencode($live->getStream_category()) .
                "&activateChat=" . urlencode($live->getActivateChat()) .
                "&autoplay=" . urlencode($live->getAutoplay()) .
                "&publish_on_dacast=" . urlencode($live->getPublish_on_dacast()) .
                "&external_video_page=" . urlencode($live->getExternal_video_page()) .
                "&player_width=" . urlencode($live->getPlayer_width()) .
                "&player_height=" . urlencode($live->getPlayer_height()) .
                "&countries_id=" . urlencode($live->getCountries_id()) .
                "&referers_id=" . urlencode($live->getReferers_id());
    }

}
