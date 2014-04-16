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

    function __construct($_id = 0, $_type = "payperview", $_price = 0, $_currency = "US", $_time_quantity = 0, $_time_unit = 0) {
        $this->_id = $_id;
        $this->_type = $_type;
        $this->_price = $_price;
        $this->_currency = $_currency;
        $this->_time_quantity = $_time_quantity;
        $this->_time_unit = $_time_unit;
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
        $this->_id = $_id;
    }

    public function set_type($_type) {
        $this->_type = $_type;
    }

    public function set_recurrence($_recurrence) {
        $this->_recurrence = $_recurrence;
    }

    public function set_price($_price) {
        $this->_price = $_price;
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

    public function set_active($_active) {
        $this->_active = $_active;
    }

    public function set_channel_id($_channel_id) {
        $this->_channel_id = $_channel_id;
    }

    public function set_channels_package_id($_channels_package_id) {
        $this->_channels_package_id = $_channels_package_id;
    }

    public function set_time_quantity($_time_quantity) {
        $this->_time_quantity = $_time_quantity;
    }

    public function set_time_unit($_time_unit) {
        $this->_time_unit = $_time_unit;
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
