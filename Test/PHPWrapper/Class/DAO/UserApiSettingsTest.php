<?php

include_once ("PHPWrapper/autoload.php");
define('BID', '26708');
define('API_KEY', '7c70028b237d85cda0cc');

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-05-02 at 21:41:47.
 */
class UserApiSettingsTest extends PHPUnit_Framework_TestCase {

    /**
     * @var UserApiSettings
     */
    protected $_APISettingGood;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     * @expectedException PHPUnit_Framework_Error
     */
    protected function setUp() {
        $this->_APISettingGood = new UserApiSettings(BID, API_KEY);
        $this->tryBroacasterIdNull();
        $this->tryBroacasterIdNotNumeric();
        $this->tryAPIKeyNull();
    }

    private function tryBroacasterIdNull() {
        try {
            new UserApiSettings(null, API_KEY);
        } catch (Exception $e) {
               $this->assertEquals("Broadcaster_id is not set in UsersApiSettings.", $e->getMessage());
            return;
        }

    }

    private function tryBroacasterIdNotNumeric() {

        try {
            new UserApiSettings("646dryb", API_KEY);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Broadcaster_id is not numeric in UsersApiSettings.", $e->getMessage());
            return;
        }
    }

    private function tryAPIKeyNull() {
        try {
            new UserApiSettings(BID, null);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("APIKey is not set in UsersApiSettings.", $e->getMessage());
            return;
        }
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers UserApiSettings::getBroadcasterID
     * @todo   Implement testGetBroadcasterID().
     */
    public function testGetBroadcasterID() {
        // Remove the following lines when you implement this test.
        $this->assertNotEmpty($this->_APISettingGood->getBroadcasterID());
        $this->assertEquals($this->_APISettingGood->getBroadcasterID(), BID);
    }

    /**
     * @covers UserApiSettings::getApiKey
     * @todo   Implement testGetApiKey().
     */
    public function testGetApiKey() {
        // Remove the following lines when you implement this test.
        $this->assertNotEmpty($this->_APISettingGood->getApiKey());
        $this->assertEquals($this->_APISettingGood->getApiKey(), API_KEY);
    }

    /**
     * @covers UserApiSettings::setBroadcasterID
     * @todo   Implement testSetBroadcasterID().
     */
    public function testSetBroadcasterID() {
        // Remove the following lines when you implement this test.
        $this->_APISettingGood->setBroadcasterID("42");
        $this->assertEquals($this->_APISettingGood->getBroadcasterID(), "42");
    }

    /**
     * @covers UserApiSettings::setApiKey
     * @todo   Implement testSetApiKey().
     */
    public function testSetApiKey() {
        // Remove the following lines when you implement this test.
        $this->_APISettingGood->setApiKey("42hgrhnuyucghj");
        $this->assertEquals($this->_APISettingGood->getApiKey(), "42hgrhnuyucghj");
    }

}
