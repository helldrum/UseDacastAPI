<?php

/**
 * This class is use to interact with the Live function API: SELECT, CREATE, UPDATE, DELETE 
 * get embed code, and manage coupon and rates.
 *
 * @author Jonathan CHARDON
 */
include_once ($pre . "globalfunction.php");
require_once 'KLogger.php';

class DAOLive implements DAO {

    private $_APICall;
    private $_userSettings;
    private $_currentLive;
    private $_fullUrlCall;
    private $_tabAllLive;
    private $_logError;

    function __construct($userSettings, $live) {
        $this->_logError = new KLogger("/var/log/error", KLogger::ERR);
        if (isset($live)) {

            $this->_currentLive = $live;
        } else {

            $this->_currentLive = new Live();
        }
        if (isset($userSettings) && ($userSettings instanceof UserApiSettings)) {
            $this->_userSettings = $userSettings;
        } else {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "UserSetting miss initialized in DAOLive contructor" . print_r($userSettings, true) . $e->getMessage());
            trigger_error("userSetting miss initialized in DAOLive contructor.", E_USER_ERROR);
        }
    }

    public function get_UserSettings() {
        return $this->_userSettings;
    }

    public function get_currentObjet() {
        return $this->_currentLive;
    }

    public function get_fullUrlCall() {
        return $this->_fullUrlCall;
    }

    public function set_userSettings($userSettings) {
        $this->_userSettings = $userSettings;
    }

    public function reset_tabAllLive() {
        unset($this->_tabAllLive);
    }

    public function reset_tabAllRate() {
        unset($this->_tabAllRate);
    }

    public function set_currentObjet($live) {
        if ($live instanceof Live) {
            $this->_currentLive = $live;
        } else {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  objet is not instance of Live." . print_r($decoded["live"], true) . " " . $e->getMessage());
            trigger_error("Objet is not instance of Live.", E_USER_ERROR);
        }
    }

    public function set_fullUrlCall($fullUrlCall) {
        $this->_fullUrlCall = $fullUrlCall;
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

                $message = $this->convertDecodedJsonToLive($decoded);
                if (isset($message)) {
                    return $message;
                } else {
                    return $this->_currentLive;
                }
            } else {

                trigger_error("live_id = 0 use the function getAllLive instead.", E_USER_ERROR);
            }
        } else {
            trigger_error("live_id is not numeric.", E_USER_ERROR);
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "live_id is not numeric. " . $live_id . " " . $e->getMessage());
        }
    }

    private function convertDecodedJsonToLive($decoded) {

        if (isset($decoded)) {
            $this->_currentLive->setLiveId($decoded["live"]["id"]);
            $this->_currentLive->setTitle($decoded["live"]["title"]);
            $this->_currentLive->setDescription($decoded["live"]["description"]);
            $this->_currentLive->setCustom_data($decoded["live"]["custom_data"]);
            $this->_currentLive->setOnline($decoded["live"]["online"]);
            $this->_currentLive->setStream_type($decoded["live"]["stream_type"]);
            $this->_currentLive->setAcquisition($decoded["live"]["acquisition"]);
            $this->_currentLive->setHttp_url($decoded["live"]["http_url"]);
            $this->_currentLive->setStream_category($decoded["live"]["stream_category"]);
            $this->_currentLive->setCreationDate($decoded["live"]["creationDate"]);
            $this->_currentLive->setSaveDate($decoded["live"]["saveDate"]);
            $this->_currentLive->setUser_id($decoded["live"]["user_id"]);
            $this->_currentLive->setBandWidth($decoded["live"]["bandWidth"]);
            $this->_currentLive->setActivateChat($decoded["live"]["activateChat"]);
            $this->_currentLive->setAutoplay($decoded["live"]["autoplay"]);
            $this->_currentLive->setNoframe_security($decoded["live"]["noframe_security"]);
            $this->_currentLive->setEnable_ads($decoded["live"]["enable_ads"]);
            $this->_currentLive->setEnable_subscription($decoded["live"]["enable_subscription"]);
            $this->_currentLive->setEnable_payperview($decoded["live"]["enable_payperview"]);
            $this->_currentLive->setEnable_coupon($decoded["live"]["enable_coupon"]);
            $this->_currentLive->setIs_private($decoded["live"]["is_private"]);
            $this->_currentLive->setPublish_on_dacast($decoded["live"]["publish_on_dacast"]);
            $this->_currentLive->setSeo_index($decoded["live"]["seo_index"]);
            $this->_currentLive->setArchive_filename($decoded["live"]["archive_filename"]);
            $this->_currentLive->setCompanion_position($decoded["live"]["companion_position"]);
            $this->_currentLive->setTheme_id($decoded["live"]["theme_id"]);
            $this->_currentLive->setWatermark_position($decoded["live"]["watermark_position"]);
            $this->_currentLive->setWatermark_size($decoded["live"]["watermark_size"]);
            $this->_currentLive->setWatermark_url($decoded["live"]["watermark_url"]);
            $this->_currentLive->setId_player_size($decoded["live"]["id_player_size"]);
            $this->_currentLive->setPlayer_width($decoded["live"]["player_width"]);
            $this->_currentLive->setPlayer_height($decoded["live"]["player_height"]);
            $this->_currentLive->setReferers_id($decoded["live"]["referers_id"]);
            $this->_currentLive->setCountries_id($decoded["live"]["countries_id"]);
            $this->_currentLive->setThumbnail_id($decoded["live"]["thumbnail_id"]);
            $this->_currentLive->setSplashscreen_id($decoded["live"]["splashscreen_id"]);
            $this->_currentLive->setThumbnail_online($decoded["live"]["thumbnail_online"]);
            $this->_currentLive->setHds($decoded["live"]["hds"]);
            $this->_currentLive->setHls($decoded["live"]["hls"]);
        } else {
            $message = "Error :  no way to decode Live json.";
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  no way to decode Live json." . print_r($decoded["live"], true) . " " . $e->getMessage());

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

        $error = $this->convertDecodedJsonToArrayAllLive($decoded);

        if (isset($error)) {
            return $error;
        }

        if (isset($decoded['error']['message'])) {
            $message = "Error :  " . $decoded['error']['message'];
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);
            return $message;
        }
        return $this->_tabAllLive;
    }

    private function convertDecodedJsonToArrayAllLive($Arraydecoded) {
        $buffLive = new Live();
        $tabBuffLive;
        if (isset($Arraydecoded)) {
            foreach ($Arraydecoded['live'] as $i => $decoded) {

                $buffLive->setLiveId($decoded["id"]);
                $buffLive->setTitle($decoded["title"]);
                $buffLive->setDescription($decoded["description"]);
                $buffLive->setCustom_data($decoded["custom_data"]);
                $buffLive->setOnline($decoded["online"]);
                $buffLive->setStream_type($decoded["stream_type"]);
                $buffLive->setAcquisition($decoded["acquisition"]);
                $buffLive->setHttp_url($decoded["http_url"]);
                $buffLive->setStream_category($decoded["stream_category"]);
                $buffLive->setCreationDate($decoded["creationDate"]);
                $buffLive->setSaveDate($decoded["saveDate"]);
                $buffLive->setUser_id($decoded["user_id"]);
                $buffLive->setBandWidth($decoded["bandWidth"]);
                $buffLive->setActivateChat($decoded["activateChat"]);
                $buffLive->setAutoplay($decoded["autoplay"]);
                $buffLive->setNoframe_security($decoded["noframe_security"]);
                $buffLive->setEnable_ads($decoded["enable_ads"]);
                $buffLive->setEnable_subscription($decoded["enable_subscription"]);
                $buffLive->setEnable_payperview($decoded["enable_payperview"]);
                $buffLive->setEnable_coupon($decoded["enable_coupon"]);
                $buffLive->setIs_private($decoded["is_private"]);
                $buffLive->setPublish_on_dacast($decoded["publish_on_dacast"]);
                $buffLive->setSeo_index($decoded["seo_index"]);
                $buffLive->setArchive_filename($decoded["archive_filename"]);
                $buffLive->setCompanion_position($decoded["companion_position"]);
                $buffLive->setTheme_id($decoded["theme_id"]);
                $buffLive->setWatermark_position($decoded["watermark_position"]);
                $buffLive->setWatermark_size($decoded["watermark_size"]);
                $buffLive->setWatermark_url($decoded["watermark_url"]);
                $buffLive->setId_player_size($decoded["id_player_size"]);
                $buffLive->setPlayer_width($decoded["player_width"]);
                $buffLive->setPlayer_height($decoded["player_height"]);
                $buffLive->setReferers_id($decoded["referers_id"]);
                $buffLive->setCountries_id($decoded["countries_id"]);
                $buffLive->setThumbnail_id($decoded["thumbnail_id"]);
                $buffLive->setSplashscreen_id($decoded["splashscreen_id"]);
                $buffLive->setThumbnail_online($decoded["thumbnail_online"]);
                $buffLive->setHds($decoded["hds"]);
                $buffLive->setHls($decoded["hls"]);

                $tabBuffLive[$i] = $buffLive;
            }
            $this->reset_tabAllLive();
            $this->_tabAllLive = $tabBuffLive;
        } else {
            $message = "Error :  no way to decode all Live json.";
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  no way to decode All Live json." . print_r($decoded["live"], true) . " " . $e->getMessage());
            return $message;
        }
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
                $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);
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

            $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
            $this->_APICall->ApiRequest("POST", $this->_fullUrlCall);

            $decoded = $this->_APICall->getJsonDecoded();

            $this->convertDecodedJsonToLive($decoded);

            if (isset($decoded['error']['message'])) {
                $message = "Error :  " . $decoded['error']['message'];
                $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);
                return $message;
            }


            return $this->_currentLive;
        } else {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "live parameter is not a live object");
            trigger_error("live parameter is not a live object.", E_USER_ERROR);
        }
    }

    private function setCreateLiveURL($live_id, $live) {
        $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                "?bid=" . $this->_userSettings->getBroadcasterID() .
                "&apikey=" . $this->_userSettings->getApiKey() .
                "&title=" . urlencode($live->getTitle());

        if (($live->getDescription()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&description=" . urlencode($live->getDescription());
        }
        if ($live->getCustom_data() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&custom_data=" . urlencode($live->getCustom_data());
        }
        if ($live->getStream_type() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&stream_type=" . urlencode($live->getStream_type());
        }
        if ($live->getBackup_url() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&backup_url=" . urlencode($live->getBackup_url());
        }
        if ($live->getStream_category() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&stream_category=" . urlencode($live->getStream_category());
        }
        if ($live->getActivateChat() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&activateChat=" . urlencode($live->getActivateChat());
        }
        if ($live->getAutoplay() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&autoplay=" . urlencode($live->getAutoplay());
        }
        if ($live->getPublish_on_dacast() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&publish_on_dacast=" . urlencode($live->getPublish_on_dacast());
        }
        if ($live->getExternal_video_page() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&external_video_page=" . urlencode($live->getExternal_video_page());
        }
        if ($live->getPlayer_width() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&player_width=" . urlencode($live->getPlayer_width());
        }
        if ($live->getPlayer_height() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&player_height=" . urlencode($live->getPlayer_height());
        }
        if ($live->getCountries_id() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&countries_id=" . urlencode($live->getCountries_id());
        }
        if ($live->getReferers_id() != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&referers_id=" . urlencode($live->getReferers_id());
        }
    }

    public function getEmbedCode($live_id, $type) {
        if ($type == 'js' || $type == 'frame') {
            if (is_numeric($live_id)) {
                $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                        "/embed/" . $type . "?bid=" . $this->_userSettings->getBroadcasterID() .
                        "&apikey=" . $this->_userSettings->getApiKey();

                $this->_APICall->ApiRequestWithRawData($this->_fullUrlCall);

                $decoded = $this->_APICall->getJsonDecoded();

                if (isset($decoded['error']['message'])) {
                    $this->_logError->logError(__LINE__ . " " . __FILE__ . $decoded['error']['message']);
                    $message = "Error :  " . $decoded['error']['message'];
                    return $message;
                }
                return $decoded;
            } else {
                $this->_logError->logError(__LINE__ . " " . __FILE__ . "live_id is not numeric " . $live_id);
                trigger_error("live_id is not numeric.", E_USER_ERROR);
            }
        } else {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Unknown type of embed code." . $type);
            trigger_error("Unknown type of embed code.", E_USER_ERROR);
        }
    }

    public function createRateById($live_id, $rate) {
        throw new Exception('pending function due to currency issues');

        if (is_numeric($live_id)) {
            if ($live_id != 0) {
                if ($rate instanceof Rate) {
                    $this->setURLcreateRate($live_id, $rate);
                    $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
                    $this->_APICall->ApiRequest("POST", $this->_fullUrlCall);

                    $decoded = $this->_APICall->getJsonDecoded();
                    $this->convertDecodedJsonToRate($decoded);

                    if (isset($decoded['error']['message'])) {
                        $message = "Error :  " . $decoded['error']['message'];
                        $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);
                        return $message;
                    }
                    return $this->_currentLive->get_currentRate();
                } else {
                    trigger_error("Parameter rate is not a instance of Rate.", E_USER_ERROR);
                }
            } else {
                trigger_error("Parameter live_id can be set to 0.", E_USER_ERROR);
            }
        }
        trigger_error("Parameter live_id is not numeric.", E_USER_ERROR);
    }

    private function setURLcreateRate($live_id, $rate) {
        $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                "/rate/0?bid=" . $this->_userSettings->getBroadcasterID() .
                "&apikey=" . $this->_userSettings->getApiKey();


        if (($rate->get_type()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&type=" . urlencode($rate->get_type());
        }

        if (($rate->get_price()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&price=" . urlencode($rate->get_price());
        }

        if (($rate->get_currency()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "¤cy=" . urlencode($rate->get_currency());
        }

        if (($rate->get_time_quantity()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&time_quantity=" . urlencode($rate->get_time_quantity());
        }
        if (($rate->get_time_unit()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&time_unit=" . urlencode($rate->get_time_unit());
        }
        if (($rate->get_multiply_by_quantity()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&multiply_by_quantity=" . urlencode($rate->get_multiply_by_quantity());
        }
        if (($rate->get_start_time()) != null) {
            $this->_fullUrlCall = $this->_fullUrlCall . "&start_time=" . urlencode($rate->get_start_time());
        }
    }

    public function getRatebyId($live_id, $rate_id) {

        if (is_numeric($live_id)) {
            if ($live_id != 0) {
                if (is_numeric($rate_id)) {
                    if ($rate_id != 0) {

                        $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                                "/rate/" . $rate_id .
                                "?bid=" . $this->_userSettings->getBroadcasterID() .
                                "&apikey=" . $this->_userSettings->getApiKey();

                        $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
                        $this->_APICall->ApiRequest("GET", $this->_fullUrlCall);

                        $decoded = $this->_APICall->getJsonDecoded();

                        $message = $this->convertDecodedJsonToRate($decoded);

                        if (isset($message)) {
                            return $message;
                        }
                        if (isset($decoded['error']['message'])) {
                            $message = "Error :  " . $decoded['error']['message'];
                            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);

                            return $message;
                        }

                        return $this->_currentLive->get_currentRate();
                    } else {
                        $this->_logError->logError(__LINE__ . " " . __FILE__ . "rate_id = 0 use the function getAllRate instead.");
                        trigger_error("rate_id = 0 use the function getAllRate instead.", E_USER_ERROR);
                    }
                } else {
                    $this->_logError->logError(__LINE__ . " " . __FILE__ . "rate_id is not numeric.");
                    trigger_error("rate_id is not numeric.", E_USER_ERROR);
                }
            } else {
                $this->_logError->logError(__LINE__ . " " . __FILE__ . "live_id = 0 use the function getAllRate instead.");
                trigger_error("live_id = 0 use the function getAllRate instead.", E_USER_ERROR);
            }
        } else {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "live_id is not numeric. " . $live_id);
            trigger_error("live_id is not numeric.", E_USER_ERROR);
        }
    }

    private function convertDecodedJsonToRate($decoded) {
        $buffRate = new Rate();
        if (isset($decoded)) {
            $buffRate->set_id($decoded["rate"]["id"]);
            $buffRate->set_type($decoded["rate"]["type"]);
            $buffRate->set_recurrence($decoded["rate"]["recurrence"]);
            $buffRate->set_price($decoded["rate"]["price"]);
            $buffRate->set_beginDate($decoded["rate"]["beginDate"]);
            $buffRate->set_endDate($decoded["rate"]["endDate"]);
            $buffRate->set_currency($decoded["rate"]["currency"]);
            $buffRate->set_active($decoded["rate"]["active"]);
            $buffRate->set_channel_id($decoded["rate"]["channel_id"]);
            $buffRate->set_channels_package_id($decoded["rate"]["channels_package_id"]);
            $buffRate->set_time_quantity($decoded["rate"]["time_quantity"]);
            $buffRate->set_time_unit($decoded["rate"]["time_unit"]);
            $buffRate->set_multiply_by_quantity($decoded["rate"]["multiply_by_quantity"]);
            $buffRate->set_start_method($decoded["rate"]["start_method"]);

            return $this->_currentLive->set_currentRate($buffRate);
        } else {
            $this->_logError->logInfo(__LINE__ . " " . __FILE__ . "Empty Rate result.");
            return "Empty Rate result";
        }
    }

    public function getAllRatebyId($live_id) {

        if (is_numeric($live_id)) {

            $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                    "/rate/" . $rate_id .
                    "?bid=" . $this->_userSettings->getBroadcasterID() .
                    "&apikey=" . $this->_userSettings->getApiKey();

            $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
            $this->_APICall->ApiRequest("GET", $this->_fullUrlCall);

            $decoded = $this->_APICall->getJsonDecoded();
            $this->convertDecodedJsonToAllRate($decoded);

            if (isset($decoded['error']['message'])) {
                $message = "Error :  " . $decoded['error']['message'];
                $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);

                return $message;
            }
            return $this->_currentLive->get_TabAllRate();
        } else {
            trigger_error("live_id is not numeric.", E_USER_ERROR);
            $this->_logError->logError(__LINE__ . " " . __FILE__ .
                    "live_id is not numeric.");
        }
    }

    private function convertDecodedJsonToAllRate($Arraydecoded) {
        $buffRate = new Rate();
        $TabBufferAllRate;

        if (isset($Arraydecoded)) {
            foreach ($Arraydecoded['rate'] as $i => $decoded) {
                $buffRate->set_id($decoded["id"]);
                $buffRate->set_type($decoded["type"]);
                $buffRate->set_recurrence($decoded["recurrence"]);
                $buffRate->set_price($decoded["price"]);
                $buffRate->set_beginDate($decoded["beginDate"]);
                $buffRate->set_endDate($decoded["endDate"]);
                $buffRate->set_currency($decoded["currency"]);
                $buffRate->set_active($decoded["active"]);
                $buffRate->set_channel_id($decoded["channel_id"]);
                $buffRate->set_channels_package_id($decoded["channels_package_id"]);
                $buffRate->set_time_quantity($decoded["time_quantity"]);
                $buffRate->set_time_unit($decoded["time_unit"]);
                $buffRate->set_multiply_by_quantity($decoded["multiply_by_quantity"]);
                $buffRate->set_start_method($decoded["start_method"]);
                $TabBufferAllRate[$i] = $buffRate;
            }
            $this->_currentLive->reset_AllRate();
            $this->_currentLive->set_TabAllRate($TabBufferAllRate);
        } else {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Empty Rate result.");
            trigger_error("Empty Rate result.", E_USER_ERROR);
        }
    }

    public function deleteRatebyId($live_id, $rate_id) {
        if (is_numeric($live_id)) {
            if ($live_id != 0) {
                if (is_numeric($rate_id)) {
                    if ($rate_id != 0) {

                        $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                                "/rate/" . $rate_id .
                                "?bid=" . $this->_userSettings->getBroadcasterID() .
                                "&apikey=" . $this->_userSettings->getApiKey();


                        $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
                        $this->_APICall->ApiRequest("DELETE", $this->_fullUrlCall);

                        $decoded = $this->_APICall->getJsonDecoded();

                        if (isset($decoded['error']['message'])) {
                            $message = "Error :  " . $decoded['error']['message'];
                            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);
                        } else {
                            $message = $decoded['message'];
                        }

                        return $message;
                    } else {
                        trigger_error("rate_id is not numeric.", E_USER_ERROR);
                    }
                } else {
                    trigger_error("Parameter rate_id can be set to 0.", E_USER_ERROR);
                }
            } else {
                trigger_error("Parameter live_id can be set to 0.", E_USER_ERROR);
            }
        } else {
            trigger_error("live_id is not numeric.", E_USER_ERROR);
        }
    }

    public function getCouponbyId($live_id, $coupon_id) {
   
        if (is_numeric($live_id)) {
            if ($live_id != 0) {
                if (is_numeric($coupon_id)) {
                    if ($coupon_id != 0) {

                        $this->_fullUrlCall = self::API_URL . "/" . $live_id .
                                "/coupon/" . $coupon_id .
                                "?bid=" . $this->_userSettings->getBroadcasterID() .
                                "&apikey=" . $this->_userSettings->getApiKey();

                        $this->_APICall = new APICall($this->_userSettings->getApiKey(), $this->_userSettings->getBroadcasterID(), $this->_fullUrlCall);
                        $this->_APICall->ApiRequest("GET", $this->_fullUrlCall);

                        $decoded = $this->_APICall->getJsonDecoded();

                        $message = $this->convertDecodedJsonToCoupon($decoded);

                        if (isset($message)) {
                            return $message;
                        }
                        if (isset($decoded['error']['message'])) {
                            $message = "Error :  " . $decoded['error']['message'];
                            $this->_logError->logError(__LINE__ . " " . __FILE__ . "Error :  " . $decoded['error']['message']);

                            return $message;
                        }

                        return $this->_currentLive->get_currentCoupon();
                    } else {
                        $this->_logError->logError(__LINE__ . " " . __FILE__ . "rate_id = 0 use the function getAllCoupon instead.");
                        trigger_error("coupon_id = 0 use the function getAllCoupon instead.", E_USER_ERROR);
                    }
                } else {
                    $this->_logError->logError(__LINE__ . " " . __FILE__ . "rate_id is not numeric.");
                    trigger_error("coupon_id is not numeric.", E_USER_ERROR);
                }
            } else {
                $this->_logError->logError(__LINE__ . " " . __FILE__ . "live_id = 0 use the function getAllCoupon instead.");
                trigger_error("live_id = 0 use the function getAllCoupon instead.", E_USER_ERROR);
            }
        } else {
            $this->_logError->logError(__LINE__ . " " . __FILE__ . "live_id is not numeric. " . $live_id);
            trigger_error("live_id is not numeric.", E_USER_ERROR);
        }
    }

    private function convertDecodedJsonToCoupon($decoded) {
        $buffCoupon = new Coupon();
        if (isset($decoded)) {
            $buffCoupon->set_id($decoded["coupon"]["id"]);
            $buffCoupon->set_code($decoded["coupon"]["code"]);
            $buffCoupon->set_value($decoded["coupon"]["value"]);
            $buffCoupon->set_currency($decoded["coupon"]["currency"]);
            $buffCoupon->set_max($decoded["coupon"]["max"]);
            $buffCoupon->set_type($decoded["coupon"]["type"]);
            $buffCoupon->set_rate_type($decoded["coupon"]["rate_type"]);
            $buffCoupon->set_media_type($decoded["coupon"]["media_type"]);
            $buffCoupon->set_media_id($decoded["coupon"]["media_id"]);
            $buffCoupon->set_gift_type($decoded["coupon"]["gift_type"]);
            $buffCoupon->set_gift_id($decoded["coupon"]["gift_id"]);
            $buffCoupon->set_status($decoded["coupon"]["status"]);
            $buffCoupon->set_user_id($decoded["coupon"]["user_id"]);

            return $this->_currentLive->set_currentCoupon($buffCoupon);
        } else {
            $this->_logError->logInfo(__LINE__ . " " . __FILE__ . "Empty Coupon result.");
            return "Empty Coupon result";
        }
    }

    public function createCouponById($live_id, $coupon) {
        trigger_error("not yet implemented.", E_USER_ERROR);
    }

    public function deleteCouponbyId($live_id, $coupon_id) {
        trigger_error("not yet implemented.", E_USER_ERROR);
    }

    public function getAllCouponbyId($live_id) {
        trigger_error("not yet implemented.", E_USER_ERROR);
    }

}
