<?php

class Coupon {

    private $_id;
    private $_code;
    private $_value;
    private $_currency;
    private $_max;
    private $_type;
    private $_rate_type;
    private $_media_type;
    private $_media_id;
    private $_gift_type;
    private $_gift_id;
    private $_status;
    private $_user_id;

    function __construct($_id=0, $_code='', $_value=0, $_currency='US', $_max=0, $_type='freepass', $_rate_type='payperview', $_media_type='channel', $_media_id=0, $_gift_type=null, $_gift_id=null, $_status=1, $_user_id=0) {
        $this->_id = $_id;
        $this->_code = $_code;
        $this->_value = $_value;
        $this->_currency = $_currency;
        $this->_max = $_max;
        $this->_type = $_type;
        $this->_rate_type = $_rate_type;
        $this->_media_type = $_media_type;
        $this->_media_id = $_media_id;
        $this->_gift_type = $_gift_type;
        $this->_gift_id = $_gift_id;
        $this->_status = $_status;
        $this->_user_id = $_user_id;
    }

    public function get_id() {
        return $this->_id;
    }

    public function get_code() {
        return $this->_code;
    }

    public function get_value() {
        return $this->_value;
    }

    public function get_currency() {
        return $this->_currency;
    }

    public function get_max() {
        return $this->_max;
    }

    public function get_type() {
        return $this->_type;
    }

    public function get_rate_type() {
        return $this->_rate_type;
    }

    public function get_media_type() {
        return $this->_media_type;
    }

    public function get_media_id() {
        return $this->_media_id;
    }

    public function get_gift_type() {
        return $this->_gift_type;
    }

    public function get_gift_id() {
        return $this->_gift_id;
    }

    public function get_status() {
        return $this->_status;
    }

    public function get_user_id() {
        return $this->_user_id;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function set_code($_code) {
        $this->_code = $_code;
    }

    public function set_value($_value) {
        $this->_value = $_value;
    }

    public function set_currency($_currency) {
        $this->_currency = $_currency;
    }

    public function set_max($_max) {
        $this->_max = $_max;
    }

    public function set_type($_type) {
        $this->_type = $_type;
    }

    public function set_rate_type($_rate_type) {
        $this->_rate_type = $_rate_type;
    }

    public function set_media_type($_media_type) {
        $this->_media_type = $_media_type;
    }

    public function set_media_id($_media_id) {
        $this->_media_id = $_media_id;
    }

    public function set_gift_type($_gift_type) {
        $this->_gift_type = $_gift_type;
    }

    public function set_gift_id($_gift_id) {
        $this->_gift_id = $_gift_id;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }

    public function set_user_id($_user_id) {
        $this->_user_id = $_user_id;
    }

}
