<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rate {

    private $_id;
    private $_type;
    private $_recurrence;
    private $_price;
    private $_beginDate;
    private $_endDate;
    private $_currency;
    private $_active;
    private $_channel_id;
    private $_channels_package_id;
    private $_time_quantity;
    private $_time_unit;
    private $_multiply_by_quantity;
    private $_start_time;
    private $_start_method;

    function __construct($id = 0, $type = "payperview", $price = 0, $currency = "USD", $time_quantity = 0, $time_unit = "min", $multiply_by_quantity = 0, $start_time = 0) {
        if (!is_numeric($id)) {
            throw new InvalidArgumentException("Parameter live_id is not numeric in Rate object Constructor.");
        }

        $this->test_RateType($type, "Parameter type unknown in Rate object Constructor.");

        $this->test_time_unit($time_unit, "Parameter time_unit unknown in Rate object Constructor.");

        if (!is_numeric($price)) {
            throw new InvalidArgumentException("Parameter price is not numeric in Rate object Constructor.");
        }
        if ($currency != "USD" && $currency != "EUR") {
            throw new InvalidArgumentException("Parameter currency can take only two value (\"EUR\" or \"USD\" )in Rate object Constructor.");
        }
        if (!is_numeric($time_quantity)) {
            throw new InvalidArgumentException("Parameter time_quantity is not numeric in Rate object Constructor.");
        }

        if ($multiply_by_quantity != 1 && $multiply_by_quantity != 0) {
            throw new InvalidArgumentException("Parameter multiply_by_quantity can take only two value (0 default or 1)in Rate object Constructor.");
        }
        if (!is_numeric($start_time)) {
            throw new InvalidArgumentException("Parameter start_time is not numeric in Rate object Constructor.");
        }


        $this->_id = $id;
        $this->_type = $type;
        $this->_price = $price;
        $this->_currency = $currency;
        $this->_time_quantity = $time_quantity;
        $this->_time_unit = $time_unit;
        $this->_recurrence = "none";
        $this->_beginDate = null;
        $this->_endDate = null;
        $this->_active = 1;
        $this->_channel_id = 0;
        $this->_channels_package_id = null;
        $this->_multiply_by_quantity = $multiply_by_quantity;
        $this->_start_time = $start_time;
        $this->_start_method = null;
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

    private function test_time_unit($time_unit, $message) {
        switch ($time_unit) {

            case "min":
                break;
            case "hour":
                break;
            case "day":
                break;
            case "weekly":
                break;
            case "monthly":
                break;
            case "quarterly":
                break;
            case "biannual":
                break;
            default:
                throw new InvalidArgumentException($message);
        }
    }

    public function get_id() {
        return $this->_id;
    }

    public function get_type() {
        return $this->_type;
    }

    public function get_recurrence() {
        return $this->_recurrence;
    }

    public function get_price() {
        return $this->_price;
    }

    public function get_beginDate() {
        return $this->_beginDate;
    }

    public function get_endDate() {
        return $this->_endDate;
    }

    public function get_currency() {
        return $this->_currency;
    }

    public function get_active() {
        return $this->_active;
    }

    public function get_channel_id() {
        return $this->_channel_id;
    }

    public function get_channels_package_id() {
        return $this->_channels_package_id;
    }

    public function get_time_quantity() {
        return $this->_time_quantity;
    }

    public function get_time_unit() {
        return $this->_time_unit;
    }

    public function get_multiply_by_quantity() {
        return $this->_multiply_by_quantity;
    }

    public function get_start_method() {
        return $this->_start_method;
    }

    public function set_id($_id) {
        if (!is_numeric($_id)) {
            throw new InvalidArgumentException("Parameter id is not numeric in set_id() function in Rate object.");
        }
        $this->_id = $_id;
    }

    public function set_type($type) {
        if ($type != "subscription" && $type != "payperview") {
            throw new InvalidArgumentException("Parameter type unknown in set_type() function in Rate object.");
        }
        $this->_type = $type;
    }

    public function set_recurrence($_recurrence) {
        $this->_recurrence = $_recurrence;
    }

    public function set_price($price) {
        if (is_numeric($price)) {
            throw new InvalidArgumentException("Parameter price is not numeric in  set_price() function in Rate object.");
        }
        $this->_price = $price;
    }

    public function set_beginDate($_beginDate) {
        $this->_beginDate = $_beginDate;
    }

    public function set_endDate($_endDate) {
        $this->_endDate = $_endDate;
    }

    public function set_currency($_currency) {
        $this->_currency = $_currency;
    }

    public function set_active($active) {
        if ($active != 0 && $active != 1) {
            throw new InvalidArgumentException("Parameter active can take only two value (0 or 1)in set_active() function in Rate object.");
        }
        $this->_active = $active;
    }

    public function set_channel_id($channel_id) {
        if (!is_numeric($channel_id)) {
            throw new InvalidArgumentException("Parameter channel_id is not numeric in  set_channel_id() function in Rate object.");
        }
        $this->_channel_id = $channel_id;
    }

    public function set_channels_package_id($channels_package_id) {
        if (!is_numeric($channels_package_id)) {
            throw new InvalidArgumentException("Parameter channels_package_id is not numeric in set_channels_package_id() function in Rate object.");
        }
        $this->_channels_package_id = $channels_package_id;
    }

    public function set_time_quantity($time_quantity) {
        if (!is_numeric($time_quantity)) {
            throw new InvalidArgumentException("Parameter time_quantity is not numeric in set_time_quantity() function in Rate object.");
        }
        $this->_time_quantity = $time_quantity;
    }

    public function set_time_unit($time_unit) {
        $this->test_time_unit($time_unit, "Parameter time_unit unknown in Rate object Constructor.");
        $this->_time_unit = $time_unit;
    }

    public function get_start_time() {
        return $this->_start_time;
    }

    public function set_start_time($_start_time) {
        $this->_start_time = $_start_time;
    }

    public function set_multiply_by_quantity($_multiply_by_quantity) {
        $this->_multiply_by_quantity = $_multiply_by_quantity;
    }

    public function set_start_method($_start_method) {
        $this->_start_method = $_start_method;
    }

    public function __toString() {

        $toString = "rate_id =  $this->_id<br>
    type = $this->_type<br>
    recurrence = $this->_recurrence<br>
    price = $this->_price<br>
    beginDate = $this->_beginDate<br>
    endDate = $this->_endDate<br>
    currency = $this->_currency<br>
    active = $this->_active<br>
    channel_id = $this->_channel_id<br>
    channels_package_id = $this->_channels_package_id<br>
    time_quantity = $this->_time_quantity<br>
    time_unit = $this->_time_unit<br>
    multiply_by_quantity = $this->_multiply_by_quantity<br>
    start_time = $this->_start_time<br>
    start_method = $this->_start_method<br>";
        return $toString;
    }

}
