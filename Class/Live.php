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
    private $_seo_index;
    private $_archive_filename;
    private $_companion_position;
    private $_theme_id;
    private $_watermark_position;
    private $watermark_size;
    private $watermark_url;
    private $id_player_size;
    private $player_width;
    private $player_height;
    private $referers_id;
    private $countries_id;
    private $thumbnail_id;
    private $splashscreen_id;
    private $thumbnail_online;
    private $hds;
    private $hls;
    private $backup_url;



    function __construct($id=0, $title='default title',
            $description='default description', $custom_data=null,
            $online=0, $stream_type=1, $acquisition=null, $http_url=null, 
            $stream_category=20, $creationDate=null, $saveDate=null, $user_id=0,
            $bandWidth=null, $activateChat=null, $autoplay=1,
            $noframe_security=2,$enable_ads=0, $enable_subscription=0, 
            $enable_payperview=0, $enable_coupon=0, $is_private=0,
            $publish_on_dacast=1,$seo_index=1, $archive_filename=null,
            $companion_position= "right",$theme_id=null, $watermark_position=0,
            $watermark_size=0,$watermark_url=null, $id_player_size=0, 
            $player_width=640,$player_height=480, $referers_id=0,
            $countries_id=0, $thumbnail_id=null, $splashscreen_id=null, 
            $thumbnail_online=null, $hds=null, $hls=null) {
        
        $this->id = $id;
        $this->_title = $title;
        $this->_description = $description;
        $this->_custom_data = $custom_data;
        $this->_online = $online;
        $this->_stream_type = $stream_type;
        $this->_acquisition = $acquisition;
        $this->_http_url = $http_url;
        $this->_stream_category = $stream_category;
        $this->_creationDate = $creationDate;
        $this->_saveDate = $saveDate;
        $this->_user_id = $user_id;
        $this->_bandWidth = $bandWidth;
        $this->_activateChat = $activateChat;
        $this->_autoplay = $autoplay;
        $this->_noframe_security = $noframe_security;
        $this->_enable_ads = $enable_ads;
        $this->_enable_subscription = $enable_subscription;
        $this->_enable_payperview = $enable_payperview;
        $this->_enable_coupon = $enable_coupon;
        $this->_is_private = $is_private;
        $this->_publish_on_dacast = $publish_on_dacast;
        $this->_seo_index = $seo_index;
        $this->_archive_filename = $archive_filename;
        $this->_companion_position = $companion_position;
        $this->_theme_id = $theme_id;
        $this->_watermark_position = $watermark_position;
        $this->watermark_size = $watermark_size;
        $this->watermark_url = $watermark_url;
        $this->id_player_size = $id_player_size;
        $this->player_width = $player_width;
        $this->player_height = $player_height;
        $this->referers_id = $referers_id;
        $this->countries_id = $countries_id;
        $this->thumbnail_id = $thumbnail_id;
        $this->splashscreen_id = $splashscreen_id;
        $this->thumbnail_online = $thumbnail_online;
        $this->hds = $hds;
        $this->hls = $hls;
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
        return $this->watermark_size;
    }

    public function getWatermark_url() {
        return $this->watermark_url;
    }

    public function getId_player_size() {
        return $this->id_player_size;
    }

    public function getPlayer_width() {
        return $this->player_width;
    }

    public function getPlayer_height() {
        return $this->player_height;
    }

    public function getReferers_id() {
        return $this->referers_id;
    }

    public function getCountries_id() {
        return $this->countries_id;
    }

    public function getThumbnail_id() {
        return $this->thumbnail_id;
    }

    public function getSplashscreen_id() {
        return $this->splashscreen_id;
    }

    public function getThumbnail_online() {
        return $this->thumbnail_online;
    }

    public function getHds() {
        return $this->hds;
    }

    public function getHls() {
        return $this->hls;
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
        $this->_online = $online;
    }

    public function setStream_type($stream_type) {
        $this->_stream_type = $stream_type;
    }

    public function setAcquisition($acquisition) {
        $this->_acquisition = $acquisition;
    }

    public function setHttp_url($http_url) {
        $this->_http_url = $http_url;
    }

    public function setStream_category($stream_category) {
        $this->_stream_category = $stream_category;
    }

    public function setCreationDate($creationDate) {
        $this->_creationDate = $creationDate;
    }

    public function setSaveDate($saveDate) {
        $this->_saveDate = $saveDate;
    }

    public function setUser_id($user_id) {
        $this->_user_id = $user_id;
    }

    public function setBandWidth($bandWidth) {
        $this->_bandWidth = $bandWidth;
    }

    public function setActivateChat($activateChat) {
        $this->_activateChat = $activateChat;
    }

    public function setAutoplay($autoplay) {
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
        $this->watermark_size = $watermark_size;
    }

    public function setWatermark_url($watermark_url) {
        $this->watermark_url = $watermark_url;
    }

    public function setId_player_size($id_player_size) {
        $this->id_player_size = $id_player_size;
    }

    public function setPlayer_width($player_width) {
        $this->player_width = $player_width;
    }

    public function setPlayer_height($player_height) {
        $this->player_height = $player_height;
    }

    public function setReferers_id($referers_id) {
        $this->referers_id = $referers_id;
    }

    public function setCountries_id($countries_id) {
        $this->countries_id = $countries_id;
    }

    public function setThumbnail_id($thumbnail_id) {
        $this->thumbnail_id = $thumbnail_id;
    }

    public function setSplashscreen_id($splashscreen_id) {
        $this->splashscreen_id = $splashscreen_id;
    }

    public function setThumbnail_online($thumbnail_online) {
        $this->thumbnail_online = $thumbnail_online;
    }

    public function setHds($hds) {
        $this->hds = $hds;
    }

    public function setHls($hls) {
        $this->hls = $hls;
    }
        public function getBackup_url() {
        return $this->backup_url;
    }

    public function setBackup_url($backup_url) {
        $this->backup_url = $backup_url;
    }

}
