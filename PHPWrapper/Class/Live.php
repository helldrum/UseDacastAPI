<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Live
 *
 * @author User
 */
class Live {

    private $_live_id;
    private $_title;
    private $_description;
    private $_custom_data;
    private $_online;
    private $_stream_type;
    private $_acquisition;
    private $_http_url;
    private $_stream_category;
    private $_creationDate;
    private $_saveDate;
    private $_user_id;
    private $_bandWidth;
    private $_activateChat;
    private $_autoplay;
    private $_noframe_security;
    private $_enable_ads;
    private $_enable_subscription;
    private $_enable_payperview;
    private $_enable_coupon;
    private $_is_private;
    private $_publish_on_dacast;
    private $_external_video_page;
    private $_seo_index;
    private $_archive_filename;
    private $_companion_position;
    private $_theme_id;
    private $_watermark_position;
    private $_watermark_size;
    private $_watermark_url;
    private $_id_player_size;
    private $_player_width;
    private $_player_height;
    private $_referers_id;
    private $_countries_id;
    private $_thumbnail_id;
    private $_splashscreen_id;
    private $_thumbnail_online;
    private $_hds;
    private $_hls;
    private $_backup_url;
    private $_tabAllRate;
    private $_tabAllCoupon;
    private $_currentRate;
    private $_currentCoupon;

    function __construct($id = 0, $title = "", $description = "", $custom_data = "", $online = 0, $stream_type = 1, $stream_category = 20, $activateChat = 0, $user_id = 0, $autoplay = 0, $publish_on_dacast = 1, $external_video_page = "", $player_width = null, $player_height = null, $referers_id = 0, $countries_id = 0) {
        if (!is_numeric($id)) {
            throw new InvalidArgumentException("Parameter live_id is not numeric in Live object Constructor.");
        }
        if (!is_numeric($online)) {

            throw new InvalidArgumentException("Parameter online  can only take two value (0 = online or 1 = online) in Live object Constructor.");
        }
        if ($stream_type != 1 && $stream_type != 3) {
            throw new InvalidArgumentException("Parameter stream_type can only take two value (1 = live or 3 = radio)in Live object Constructor.");
        }

        if (!is_numeric($stream_category)) {
            throw new InvalidArgumentException("Parameter stream_category is not numeric in Live object Constructor.");
        }

        if (!is_numeric($user_id)) {
            throw new InvalidArgumentException("Parameter user_id is not numeric in Live object Constructor.");
        }
        if ($activateChat != 0 && $activateChat != 1) {
            throw new InvalidArgumentException("Parameter activateChat can only take two value (0 or 1)in Live object Constructor.");
        }
        if (!is_numeric($autoplay)) {
            throw new InvalidArgumentException("Parameter autoplay is not numeric in Live object Constructor.");
        }

//, $seo_index = 1, $archive_filename = null, $companion_position = "right", $theme_id = null, $watermark_position = 0, $watermark_size = 0, $watermark_url = null, $id_player_size = 0,
//, $thumbnail_id = null, $splashscreen_id = null, $thumbnail_online = null, $hds = null, $hls = null, $backup_url = ''       
        $this->id = $id;
        $this->_title = $title;
        $this->_description = $description;
        $this->_custom_data = $custom_data;
        $this->_online = $online;
        $this->_stream_type = $stream_type;
        $this->_acquisition = 0;
        $this->_http_url = "";
        $this->_stream_category = $stream_category;
        $this->_creationDate = null;
        $this->_saveDate = null;
        $this->_user_id = $user_id;
        $this->_bandWidth = 0;
        $this->_activateChat = $activateChat;
        $this->_autoplay = $autoplay;
        $this->_noframe_security = 2;
        $this->_enable_ads = 0;
        $this->_enable_subscription = 0;
        $this->_enable_payperview = 0;
        $this->_enable_coupon = 0;
        $this->_is_private = 0;
        $this->_publish_on_dacast = $publish_on_dacast;
        $this->_external_video_page = $external_video_page;
        $this->_seo_index = 1;
        $this->_archive_filename = "";
        $this->_companion_position = "right";
        $this->_theme_id = 1;
        $this->_watermark_position = 0;
        $this->_watermark_size = 0;
        $this->_watermark_url = "";
        $this->_id_player_size = 0;
        $this->_player_width = $player_width;
        $this->_player_height = $player_height;
        $this->_referers_id = $referers_id;
        $this->_countries_id = $countries_id;
        $this->_thumbnail_id = 1;
        $this->_splashscreen_id = 0;
        $this->_thumbnail_online = "";
        $this->_hds = null;
        $this->_hls = null;
        $this->_backup_url = "";
    }

    public function getLive_Id() {
        return $this->_live_id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getCustom_data() {
        return $this->_custom_data;
    }

    public function getOnline() {
        return $this->_online;
    }

    public function getStream_type() {
        return $this->_stream_type;
    }

    public function getAcquisition() {
        return $this->_acquisition;
    }

    public function getHttp_url() {
        return $this->_http_url;
    }

    public function getStream_category() {
        return $this->_stream_category;
    }

    public function getCreationDate() {
        return $this->_creationDate;
    }

    public function getSaveDate() {
        return $this->_saveDate;
    }

    public function getUser_id() {
        return $this->_user_id;
    }

    public function getBandWidth() {
        return $this->_bandWidth;
    }

    public function getActivateChat() {
        return $this->_activateChat;
    }

    public function getAutoplay() {
        return $this->_autoplay;
    }

    public function getNoframe_security() {
        return $this->_noframe_security;
    }

    public function getEnable_ads() {
        return $this->_enable_ads;
    }

    public function getEnable_subscription() {
        return $this->_enable_subscription;
    }

    public function getEnable_payperview() {
        return $this->_enable_payperview;
    }

    public function getEnable_coupon() {
        return $this->_enable_coupon;
    }

    public function getIs_private() {
        return $this->_is_private;
    }

    public function getPublish_on_dacast() {
        return $this->_publish_on_dacast;
    }

    public function getExternal_video_page() {
        return $this->external_video_page;
    }

    public function setExternal_video_page($external_video_page) {
        $this->external_video_page = $external_video_page;
    }

    public function getSeo_index() {
        return $this->_seo_index;
    }

    public function getArchive_filename() {
        return $this->_archive_filename;
    }

    public function getCompanion_position() {
        return $this->_companion_position;
    }

    public function getTheme_id() {
        return $this->_theme_id;
    }

    public function getWatermark_position() {
        return $this->_watermark_position;
    }

    public function getWatermark_size() {
        return $this->_watermark_size;
    }

    public function getWatermark_url() {
        return $this->_watermark_url;
    }

    public function getId_player_size() {
        return $this->_id_player_size;
    }

    public function getPlayer_width() {
        return $this->_player_width;
    }

    public function getPlayer_height() {
        return $this->_player_height;
    }

    public function getReferers_id() {
        return $this->_referers_id;
    }

    public function getCountries_id() {
        return $this->_countries_id;
    }

    public function getThumbnail_id() {
        return $this->_thumbnail_id;
    }

    public function getSplashscreen_id() {
        return $this->_splashscreen_id;
    }

    public function getThumbnail_online() {
        return $this->_thumbnail_online;
    }

    public function getHds() {
        return $this->_hds;
    }

    public function getHls() {
        return $this->_hls;
    }

    public function setLiveId($id) {
        $this->_live_id = $id;
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }

    public function setCustom_data($custom_data) {
        $this->_custom_data = $custom_data;
    }

    public function setOnline($online) {
        if ($online != 0 && $online != 1) {
            throw new InvalidArgumentException("Parameter online from setOnline function can only take two value (0 = online or 1 = online) in Live object.");
        }

        $this->_online = $online;
    }

    public function setStream_type($stream_type) {
        if ($stream_type != 3 && $stream_type != 1) {
            throw new InvalidArgumentExceptionException("Parameter stream_type from setStream_type() function can only take two value (1 = live or 3 = radio) in Live object.", $e->getMessage());
        }
        $this->_stream_type = $stream_type;
    }

    public function setAcquisition($acquisition) {
        $this->_acquisition = $acquisition;
    }

    public function setHttp_url($http_url) {
        $this->_http_url = $http_url;
    }

    public function setStream_category($stream_category) {
        if (!is_numeric($stream_category)) {
            throw new InvalidArgumentException("Parameter stream_category from setStream_Category() function is not numeric in Live object.");
        }
        $this->_stream_category = $stream_category;
    }

    public function setCreationDate($creationDate) {
        $this->_creationDate = $creationDate;
    }

    public function setSaveDate($saveDate) {
        $this->_saveDate = $saveDate;
    }

    public function setUser_id($user_id) {
        if (!is_numeric($user_id)) {
            throw new InvalidArgumentException("Parameter user_id from function setUser_id() is not numeric in Live object.");
        }
        $this->_user_id = $user_id;
    }

    public function setBandWidth($bandWidth) {
        $this->_bandWidth = $bandWidth;
    }

    public function setActivateChat($activateChat) {

        if ($activateChat != 0 && $activateChat != 1) {
            throw new InvalidArgumentException("Parameter activateChat from setActivateChat() function can only take two value (0 = disable or 1 = enable) in Live object.");
        }
        $this->_activateChat = $activateChat;
    }

    public function setAutoplay($autoplay) {
        if ($autoplay != 0 && $autoplay != 1) {
            throw new InvalidArgumentException("Parameter autoplay from setAutoplay() function can only take two value (0 = disable or 1 = enable) in Live object.");
        }
        $this->_autoplay = $autoplay;
    }

    public function setNoframe_security($noframe_security) {
        $this->_noframe_security = $noframe_security;
    }

    public function setEnable_ads($enable_ads) {
        $this->_enable_ads = $enable_ads;
    }

    public function setEnable_subscription($enable_subscription) {
        $this->_enable_subscription = $enable_subscription;
    }

    public function setEnable_payperview($enable_payperview) {
        $this->_enable_payperview = $enable_payperview;
    }

    public function setEnable_coupon($enable_coupon) {
        $this->_enable_coupon = $enable_coupon;
    }

    public function setIs_private($is_private) {
        $this->_is_private = $is_private;
    }

    public function setPublish_on_dacast($publish_on_dacast) {
        $this->_publish_on_dacast = $publish_on_dacast;
    }

    public function setSeo_index($seo_index) {
        $this->_seo_index = $seo_index;
    }

    public function setArchive_filename($archive_filename) {
        $this->_archive_filename = $archive_filename;
    }

    public function setCompanion_position($companion_position) {
        $this->_companion_position = $companion_position;
    }

    public function setTheme_id($theme_id) {
        $this->_theme_id = $theme_id;
    }

    public function setWatermark_position($watermark_position) {
        $this->_watermark_position = $watermark_position;
    }

    public function setWatermark_size($watermark_size) {
        $this->_watermark_size = $watermark_size;
    }

    public function setWatermark_url($watermark_url) {
        $this->_watermark_url = $watermark_url;
    }

    public function setId_player_size($id_player_size) {
        $this->_id_player_size = $id_player_size;
    }

    public function setPlayer_width($player_width) {
        if (is_numeric($player_width)) {
            $this->_player_width = $player_width;
        } else {
            if (!is_null($player_width)) {
                throw new InvalidArgumentException("Parameter player_width from function setPlayer_width() need to be numeric or null in Live object.");
            }
        }
    }

    public function setPlayer_height($player_height) {

        if (is_numeric($player_height)) {
            $this->_player_height = $player_height;
        } else {
            if (!is_null($player_height)) {
                throw new InvalidArgumentException("Parameter player_height from function setPlayer_height() need to be numeric or null in Live object.");
            }
        }
    }

    public function setReferers_id($referers_id) {
        if (!is_numeric($referers_id)) {
            throw new InvalidArgumentException("Parameter referers_id from function setReferers_id() is not numeric in Live object.");
        }
        $this->_referers_id = $referers_id;
    }

    public function setCountries_id($countries_id) {
        if (!is_numeric($countries_id)) {
            throw new InvalidArgumentException("Parameter countries_id from function setCountries_id() is not numeric in Live object.");
        }
        $this->_countries_id = $countries_id;
    }

    public function setThumbnail_id($thumbnail_id) {
        if (!is_numeric($thumbnail_id)) {
            throw new InvalidArgumentException("Parameter thumbnail_id from function SetThumbnail_id() is not numeric in Live object.");
        }
        $this->_thumbnail_id = $thumbnail_id;
    }

    public function setSplashscreen_id($splashscreen_id) {
        if (!is_numeric($splashscreen_id)) {
            throw new InvalidArgumentException("Parameter splashscreen_id from function setSplashscreen_id() is not numeric in Live object.");
        }
        $this->_splashscreen_id = $splashscreen_id;
    }

    public function setThumbnail_online($thumbnail_online) {
        $this->_thumbnail_online = $thumbnail_online;
    }

    public function setHds($hds) {
        $this->_hds = $hds;
    }

    public function setHls($hls) {
        $this->_hls = $hls;
    }

    public function getBackup_url() {
        return $this->_backup_url;
    }

    public function setBackup_url($backup_url) {
        $this->_backup_url = $backup_url;
    }

    public function get_TabAllRate() {
        return $this->_tabAllRate;
    }

    public function get_currentRate() {
        return $this->_currentRate;
    }

    public function set_currentRate($_currentRate) {
        $this->_currentRate = $_currentRate;
    }

    public function set_TabAllRate($_TabAllRate) {
        $this->_tabAllRate = $_TabAllRate;
    }

    public function reset_ALLRate() {

        unset($this->_tabAllRate);
    }

    public function get_tabAllCoupon() {
        return $this->_tabAllCoupon;
    }

    public function get_currentCoupon() {
        return $this->_currentCoupon;
    }

    public function set_tabAllCoupon($_tabAllCoupon) {
        $this->_tabAllCoupon = $_tabAllCoupon;
    }

    public function set_currentCoupon($_currentCoupon) {
        $this->_currentCoupon = $_currentCoupon;
    }

    public function __toString() {

        $toString = "live_id = $this->_live_id <br>
    title = $this->_title <br> 
    description = $this->_description <br>
    custom_data = $this->_custom_data <br>
    online = $this->_online <br>
    stream_type = $this->_stream_type <br>
    acquisition = $this->_acquisition <br>
    http_url = $this->_http_url <br>
    stream_category = $this->_stream_category <br>
    creationDate = $this->_creationDate <br>
    saveDate = $this->_saveDate <br>
    user_id = $this->_user_id <br>
    bandWidth = $this->_bandWidth <br>
    activateChat = $this->_activateChat <br>
    autoplay = $this->_autoplay <br>
    noframe_security = $this->_noframe_security <br>
    enable_ads  = $this->_enable_ads <br>
    enable_subscription = $this->_enable_subscription <br>
    enable_payperview = $this->_enable_payperview <br>
    enable_coupon = $this->_enable_coupon <br>
    is_private = $this->_is_private <br>
    publish_on_dacast = $this->_publish_on_dacast <br>
    external_video_page  = $this->_external_video_page <br>
    seo_index = $this->_seo_index <br>
    archive_filename = $this->_archive_filename <br>
    companion_position = $this->_companion_position <br>
    theme_id = $this->_theme_id <br>
    watermark_position =  $this->_watermark_position <br>
    watermark_size = $this->_watermark_size <br>
    watermark_url = $this->_watermark_url <br>
    id_player_size = $this->_id_player_size <br>
    player_width = $this->_player_width <br>
    player_height = $this->_player_height <br>
    referers_id = $this->_referers_id <br>
    countries_id = $this->_countries_id <br>
    thumbnail_id = $this->_thumbnail_id <br>
    splashscreen_id = $this->_splashscreen_id <br>
    thumbnail_online = $this->_thumbnail_online <br>
    hds  =$this->_hds <br>
    hls = $this->_hls <br>
    backup_url = $this->_backup_url <br>";
        return $toString;
    }

}
