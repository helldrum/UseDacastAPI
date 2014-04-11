<?php

/**
 * This class is use to interact with the Live function API SELECT, CREATE, UPDATE, DELETE 
 * get embed code of the Live function.
 *
 * @author Jonathan CHARDON
 */
include_once ($pre . "Class/DAO/DAO.php");

class DAOLive implements DAO {
 
    private $_APICall;
    private $_userSettings;
    private $_currentObjet;
    private $_fullUrlCall;
    private $_allObject;

    function __construct($userSettings, $live) {
        if (isset($live)) {

            $this->_currentObjet = $live;
        } else {

            $this->_currentObjet = new Live();
        }
        if (isset($userSettings) && ($userSettings instanceof UserApiSettings)) {
            $this->_userSettings = $userSettings;
        } else {
            trigger_error("userSetting miss initialized in DAOLive contructor.", E_USER_ERROR);
        }
    }

    public function get_UserSettings() {
        return $this->_userSettings;
    }

    public function get_currentObjet() {
        return $this->_currentObjet;
    }

    public function getById($live_id) {

        if (is_numeric($live_id)) {
            if ($live_id != 0) {

                $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                        "?bid=" . $this->_userSettings->getBroadcasterID() .
                        "&apikey=" . $this->_userSettings->getApiKey();

                $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
                $this->_APICall->ApiRequest("GET", $this->_fullUrlCall);

                $decoded = $this->_APICall->getJsonDecoded();

                $this->convertDecodedJsonToLive($decoded);
                return $this->_currentObjet;
            } else {

                trigger_error("live_id = 0 use the function getAllLive instead.", E_USER_ERROR);
            }
        } else {
            trigger_error("live_id is not numeric.", E_USER_ERROR);
        }
    }

    private function convertDecodedJsonToLive($decoded) {

        if (isset($decoded)) {
            $this->_currentObjet->setLiveId($decoded["live"]["id"]);
            $this->_currentObjet->setTitle($decoded["live"]["title"]);
            $this->_currentObjet->setDescription($decoded["live"]["description"]);
            $this->_currentObjet->setCustom_data($decoded["live"]["custom_data"]);
            $this->_currentObjet->setOnline($decoded["live"]["online"]);
            $this->_currentObjet->setStream_type($decoded["live"]["stream_type"]);
            $this->_currentObjet->setAcquisition($decoded["live"]["acquisition"]);
            $this->_currentObjet->setHttp_url($decoded["live"]["http_url"]);
            $this->_currentObjet->setStream_category($decoded["live"]["stream_category"]);
            $this->_currentObjet->setCreationDate($decoded["live"]["creationDate"]);
            $this->_currentObjet->setSaveDate($decoded["live"]["saveDate"]);
            $this->_currentObjet->setUser_id($decoded["live"]["user_id"]);
            $this->_currentObjet->setBandWidth($decoded["live"]["bandWidth"]);
            $this->_currentObjet->setActivateChat($decoded["live"]["activateChat"]);
            $this->_currentObjet->setAutoplay($decoded["live"]["autoplay"]);
            $this->_currentObjet->setNoframe_security($decoded["live"]["noframe_security"]);
            $this->_currentObjet->setEnable_ads($decoded["live"]["enable_ads"]);
            $this->_currentObjet->setEnable_subscription($decoded["live"]["enable_subscription"]);
            $this->_currentObjet->setEnable_payperview($decoded["live"]["enable_payperview"]);
            $this->_currentObjet->setEnable_coupon($decoded["live"]["enable_coupon"]);
            $this->_currentObjet->setIs_private($decoded["live"]["is_private"]);
            $this->_currentObjet->setPublish_on_dacast($decoded["live"]["publish_on_dacast"]);
            $this->_currentObjet->setSeo_index($decoded["live"]["seo_index"]);
            $this->_currentObjet->setArchive_filename($decoded["live"]["archive_filename"]);
            $this->_currentObjet->setCompanion_position($decoded["live"]["companion_position"]);
            $this->_currentObjet->setTheme_id($decoded["live"]["theme_id"]);
            $this->_currentObjet->setWatermark_position($decoded["live"]["watermark_position"]);
            $this->_currentObjet->setWatermark_size($decoded["live"]["watermark_size"]);
            $this->_currentObjet->setWatermark_url($decoded["live"]["watermark_url"]);
            $this->_currentObjet->setId_player_size($decoded["live"]["id_player_size"]);
            $this->_currentObjet->setPlayer_width($decoded["live"]["player_width"]);
            $this->_currentObjet->setPlayer_height($decoded["live"]["player_height"]);
            $this->_currentObjet->setReferers_id($decoded["live"]["referers_id"]);
            $this->_currentObjet->setCountries_id($decoded["live"]["countries_id"]);
            $this->_currentObjet->setThumbnail_id($decoded["live"]["thumbnail_id"]);
            $this->_currentObjet->setSplashscreen_id($decoded["live"]["splashscreen_id"]);
            $this->_currentObjet->setThumbnail_online($decoded["live"]["thumbnail_online"]);
            $this->_currentObjet->setHds($decoded["live"]["hds"]);
            $this->_currentObjet->setHls($decoded["live"]["hls"]);
        } else {
            $message = "Error :  no way to decode Live json.";
            return $message;
        }
    }

    public function get_all() {
        $this->_fullUrlCall = self::API_URL . "/" .
                "0?bid=" . $this->_userSettings->getBroadcasterID() .
                "&apikey=" . $this->_userSettings->getApiKey();
        $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
        $this->_APICall->ApiRequest("GET", $this->_fullUrlCall);

        $decoded = $this->_APICall->getJsonDecoded();

        $this->convertDecodedJsonToArrayAllLive($decoded);

        return $this->_allObject;
    }

    private function convertDecodedJsonToArrayAllLive($Arraydecoded) {
        if (isset($Arraydecoded)) {
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

    public function get_fullUrlCall() {
        return $this->_fullUrlCall;
    }

    public function set_userSettings($userSettings) {
        $this->_userSettings = $userSettings;
    }

    public function set_currentObjet($live) {
        if ($live instanceof Live) {
            $this->_currentObjet = $live;
        } else {
            trigger_error("objet is not instance of Live.", E_USER_ERROR);
        }
    }

    public function set_fullUrlCall($fullUrlCall) {
        $this->_fullUrlCall = $fullUrlCall;
    }

    public function deleteById($live_id) {

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

    public function create($live) {

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


            return $this->_currentObjet;
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

    public function update($live) {
        
    }

    public function reset_allObject() {
        unset($this->_allObject);
    }



    public function getEmbedCode() {
        
    }

}
