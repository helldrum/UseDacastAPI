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

    function __construct($id = 0, $code = "free", $value = 0, $currency = "USD", $max = 0, $type = "freepass", $rate_type = "payperview") {
        if (!is_numeric($id)) {
            throw new InvalidArgumentException("Parameter live_id is not numeric in Coupon object Constructor.");
        }

        if (is_null($code)) {
            throw new InvalidArgumentException("Parameter code can't be null in Coupon object Constructor.");
        }
        if (!is_numeric($value)) {
            throw new InvalidArgumentException("Parameter value is not numeric in Coupon object Constructor.");
        }

        if ($currency != "USD" && $currency != "EUR") {
            throw new InvalidArgumentException("Parameter currency can take only two value (\"EUR\" or \"USD\" )in Coupon object Constructor.");
        }
        if (!is_numeric($max)) {
            throw new InvalidArgumentException("Parameter max is not numeric in Coupon object Constructor.");
        }

        $this->test_type($type, "Parameter type unknown in Coupon object Constructor.");
        $this->test_RateType($rate_type, "Parameter rate_type unknown in Coupon object Constructor.");

        $this->_id = $id;
        $this->_code = $code;
        $this->_value = $value;
        $this->_currency = $currency;
        $this->_max = $max;
        $this->_type = $type;
        $this->_rate_type = $rate_type;
        $this->_media_type = "";
        $this->_media_id = 0;
        $this->_gift_type = null;
        $this->_gift_id = null;
        $this->_status = 1;
        $this->_user_id = 0;
    }

    private function test_type($type, $message) {
        switch ($type) {
            case "discount-percent":
                break;
            case "discount-money":
                break;
            case "freepass":
                break;
            case "gift":
                break;
            default:
                throw new InvalidArgumentException($message);
        }
    }

    private function test_RateType($rate, $message) {
        switch ($rate) {


            case "payperview":
                break;
            case "subscription":
                break;
            default:
                throw new InvalidArgumentException($message);
        }
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

    public function set_id($id) {
        if (!is_numeric($id)) {
            throw new InvalidArgumentException("Parameter id is not numeric in function set_id() in Coupon object.");
        }
        $this->_id = $id;
    }

    public function set_code($code) {
        $this->_code = $code;
    }

    public function set_value($value) {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException("Parameter value is not numeric in function set_value() in Coupon Object.");
        }
        $this->_value = $value;
    }

    public function set_currency($currency) {
        if ($currency != "USD" && $currency != "EUR") {
            throw new InvalidArgumentException("Parameter currency from function set_currency() can only take two value (\"EUR\" or \"USD\" )in Coupon object.");
        }
        $this->_currency = $currency;
    }

    public function set_max($max) {
        if (!is_numeric($max)) {
            throw new InvalidArgumentException("Parameter max is not numeric in function set_max() in Coupon object.");
        }
        $this->_max = $max;
    }

    public function set_type($type) {
        $this->test_type($type, "Parameter type unknown from function set_type in Coupon object.");
        $this->_type = $type;
    }

    public function set_rate_type($rate_type) {
        $this->test_RateType($rate_type, "Parameter rate_type unknown in Coupon object.");
        $this->_rate_type = $rate_type;
    }

    public function set_media_type($media_type) {

        $this->_media_type = $media_type;
    }

    public function set_media_id($media_id) {
        if (!is_numeric($media_id)) {
            throw new InvalidArgumentException("Parameter media_id is not numeric in function set_media_id() in Coupon object.");
        }
        $this->_media_id = $media_id;
    }

    public function set_gift_type($gift_type) {
        $this->_gift_type = $gift_type;
    }

    public function set_gift_id($gift_id) {
        if (!is_numeric($gift_id)) {
            throw new InvalidArgumentException("Parameter gift_id is not numeric in function set_gift_id() in Coupon object.");
        }
        $this->_gift_id = $gift_id;
    }

    public function set_status($status) {
        if (!is_numeric($status)) {
            throw new InvalidArgumentException("Parameter status is not numeric in function set_status() in Coupon object.");
        }
        $this->_status = $status;
    }

    public function set_user_id($user_id) {
        if (!is_numeric($user_id)) {
            throw new InvalidArgumentException("Parameter user_id is not numeric in function set_user_id() in Coupon object.");
        }
        $this->_user_id = $user_id;
    }

}
