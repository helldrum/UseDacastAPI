<?php

include_once ("PHPWrapper/autoload.php");

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-05-05 at 18:47:11.
 */
class LiveTest extends PHPUnit_Framework_TestCase {

    /**
     * @var Live
     */
    protected $object;
    protected $objectMissSet;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {

        //test live_id
        try {
            $this->objectMissSet = new Live("er");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter live_id is not numeric in Live object Constructor.", $e->getMessage());
        }
        //test online
        try {
            $this->objectMissSet = new Live(0, "", "", "", "vsxf");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter online  can only take two value (0 = online or 1 = online) in Live object Constructor.", $e->getMessage());
        }


        //test stream type
        try {
            $this->objectMissSet = new Live(0, "", "", "", 0, "34g5");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter stream_type can only take two value (1 = live or 3 = radio)in Live object Constructor.", $e->getMessage());
        }

        //test stream category
        try {

            $this->objectMissSet = new Live(0, "", "", "", 0, 1, "rdgh");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter stream_category is not numeric in Live object Constructor.", $e->getMessage());
        }
        // test user_id
        try {
            $this->objectMissSet = new Live(0, "", "", "", 0, 1, 20, 0, "gsen");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter user_id is not numeric in Live object Constructor.", $e->getMessage());
        }
        //test activechat
        try {
            $this->objectMissSet = new Live(0, "", "", "", 0, 1, 20, "bdh");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter activateChat can only take two value (0 or 1)in Live object Constructor.", $e->getMessage());
        }

        //test autoplay
        try {
            $this->objectMissSet = new Live(0, "", "", "", 0, 3, 20, 0, 0, 1);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter autoplay can only take two value (0 or 1)in Live object Constructor.", $e->getMessage());
        }
        //init default Live
        $this->object = new Live;
        $this->object->set_currentRate(new Rate);
        $this->object->set_currentCoupon(new Coupon);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() {
        
    }

    /**
     * @covers Live::getLive_Id$
     */
    public function testGetLive_Id() {

        $this->assertEquals(0, $this->object->getLive_Id());
        $this->object->setLiveId(10);
        $this->assertEquals(10, $this->object->getLive_Id());
    }

    /**
     * @covers Live::getTitle
     */
    public function testGetTitle() {
        $this->assertEquals("", $this->object->getTitle());
        $this->object->setTitle("new title");
        $this->assertEquals("new title", $this->object->getTitle());
    }

    /**
     * @covers Live::getDescription

     */
    public function testGetDescription() {
        $this->assertEquals("", $this->object->getDescription());
        $this->object->setDescription("new description");
        $this->assertEquals("new description", $this->object->getDescription());
    }

    /**
     * @covers Live::getCustom_data
     */
    public function testGetCustom_data() {
        $this->assertEquals("", $this->object->getCustom_data());
        $this->object->setCustom_data("^354856486n@($%3ht6/'\'\"");
        $this->assertEquals("^354856486n@($%3ht6/'\'\"", $this->object->getCustom_data());
    }

    /**
     * @covers Live::getOnline
     */
    public function testGetOnline() {
        $this->assertEquals(0, $this->object->getOnline());
        $this->object->setOnline(1);
        $this->assertEquals(1, $this->object->getOnline());
    }

    /**
     * @covers Live::getStream_type
     */
    public function testGetStream_type() {
        $this->assertEquals(1, $this->object->getStream_type());
        $this->object->setStream_type(3);
        $this->assertEquals(3, $this->object->getStream_type());
    }

    /**
     * @covers Live::getAcquisition
     */
    public function testGetAcquisition() {
        $this->assertEquals(0, $this->object->getAcquisition());
        $this->object->setAcquisition(1);
        $this->assertEquals(1, $this->object->getAcquisition());
    }

    /**
     * @covers Live::getHttp_url
     */
    public function testGetHttp_url() {
        $this->assertEquals("", $this->object->getHttp_url());
        $this->object->setHttp_url("http://www.dacast.com");
        $this->assertEquals("http://www.dacast.com", $this->object->getHttp_url());
    }

    /**
     * @covers Live::getStream_category
     */
    public function testGetStream_category() {
        $this->assertEquals(20, $this->object->getStream_category());
        $this->object->setStream_category(10);
        $this->assertEquals(10, $this->object->getStream_category());
    }

    /**
     * @covers Live::getCreationDate
     */
    public function testGetCreationDate() {
        $this->assertEquals(null, $this->object->getCreationDate());
        $this->object->setCreationDate("2014-04-30 23:51:40");
        $this->assertEquals("2014-04-30 23:51:40", $this->object->getCreationDate());
    }

    /**
     * @covers Live::getSaveDate
     */
    public function testGetSaveDate() {
        $this->assertEquals(null, $this->object->getSaveDate());
        $this->object->setSaveDate("2014-04-30 23:51:40");
        $this->assertEquals("2014-04-30 23:51:40", $this->object->getSaveDate());
    }

    /**
     * @covers Live::getUser_id
     */
    public function testGetUser_id() {
        $this->assertEquals(0, $this->object->getUser_id());
        $this->object->setUser_id(42);
        $this->assertEquals(42, $this->object->getUser_id());
    }

    /**
     * @covers Live::getBandWidth
     */
    public function testGetBandWidth() {
        $this->assertEquals(0, $this->object->getBandWidth());
        $this->object->setBandWidth(300);
        $this->assertEquals(300, $this->object->getBandWidth());
    }

    /**
     * @covers Live::getActivateChat
     */
    public function testGetActivateChat() {
        $this->assertEquals(0, $this->object->getActivateChat());
        $this->object->setActivateChat(1);
        $this->assertEquals(1, $this->object->getActivateChat());
    }

    /**
     * @covers Live::getAutoplay
     */
    public function testGetAutoplay() {
        $this->assertEquals(0, $this->object->getAutoplay());
        $this->object->setAutoplay(1);
        $this->assertEquals(1, $this->object->getAutoplay());
    }

    /**
     * @covers Live::getNoframe_security
     */
    public function testGetNoframe_security() {
        $this->assertEquals(2, $this->object->getNoframe_security());
        $this->object->setNoframe_security(1);
        $this->assertEquals(1, $this->object->getNoframe_security());
    }

    /**
     * @covers Live::getEnable_ads
     */
    public function testGetEnable_ads() {
        $this->assertEquals(0, $this->object->getEnable_ads());
        $this->object->setEnable_ads(1);
        $this->assertEquals(1, $this->object->getEnable_ads());
    }

    /**
     * @covers Live::getEnable_subscription
     */
    public function testGetEnable_subscription() {
        $this->assertEquals(0, $this->object->getEnable_subscription());
        $this->object->setEnable_subscription(1);
        $this->assertEquals(1, $this->object->getEnable_subscription());
    }

    /**
     * @covers Live::getEnable_payperview
     */
    public function testGetEnable_payperview() {
        $this->assertEquals(0, $this->object->getEnable_payperview());
        $this->object->setEnable_payperview(1);
        $this->assertEquals(1, $this->object->getEnable_payperview());
    }

    /**
     * @covers Live::getEnable_coupon
     */
    public function testGetEnable_coupon() {
        $this->assertEquals(0, $this->object->getEnable_coupon());
        $this->object->setEnable_coupon(1);
        $this->assertEquals(1, $this->object->getEnable_coupon());
    }

    /**
     * @covers Live::getIs_private
     */
    public function testGetIs_private() {
        $this->assertEquals(0, $this->object->getIs_private());
        $this->object->setIs_private(1);
        $this->assertEquals(1, $this->object->getIs_private());
    }

    /**
     * @covers Live::getPublish_on_dacast
     */
    public function testGetPublish_on_dacast() {
        $this->assertEquals(1, $this->object->getPublish_on_dacast());
        $this->object->setPublish_on_dacast(0);
        $this->assertEquals(0, $this->object->getPublish_on_dacast());
    }

    /**
     * @covers Live::getExternal_video_page
     */
    public function testGetExternal_video_page() {
        $this->assertEquals("", $this->object->getExternal_video_page());
        $this->object->setExternal_video_page("http://www.mrdummy.com");
        $this->assertEquals("http://www.mrdummy.com", $this->object->getExternal_video_page());
    }

    /**
     * @covers Live::setExternal_video_page
     */
    public function testSetExternal_video_page() {
        $this->object->setExternal_video_page("http://www.plop.com");
        $this->assertEquals("http://www.plop.com", $this->object->getExternal_video_page());
    }

    /**
     * @covers Live::getSeo_index
     */
    public function testGetSeo_index() {
        $this->assertEquals(1, $this->object->getSeo_index());
        $this->object->setSeo_index(0.5);
        $this->assertEquals(0.5, $this->object->getSeo_index());
    }

    /**
     * @covers Live::getArchive_filename
     */
    public function testGetArchive_filename() {
        $this->assertEquals("", $this->object->getArchive_filename());
        $this->object->setArchive_filename("http://www.jointhedarksidewehavecookies.com");
        $this->assertEquals("http://www.jointhedarksidewehavecookies.com", $this->object->getArchive_filename());
    }

    /**
     * @covers Live::getCompanion_position
     */
    public function testGetCompanion_position() {
        $this->assertEquals("right", $this->object->getCompanion_position());
        $this->object->setCompanion_position("left");
        $this->assertEquals("left", $this->object->getCompanion_position());
    }

    /**
     * @covers Live::getTheme_id
     */
    public function testGetTheme_id() {
        $this->assertEquals(1, $this->object->getTheme_id());
        $this->object->setTheme_id(2);
        $this->assertEquals(2, $this->object->getTheme_id());
    }

    /**
     * @covers Live::getWatermark_position
     */
    public function testGetWatermark_position() {
        $this->assertEquals(0, $this->object->getWatermark_position());
        $this->object->setWatermark_position(1);
        $this->assertEquals(1, $this->object->getWatermark_position());
    }

    /**
     * @covers Live::getWatermark_size
     */
    public function testGetWatermark_size() {
        $this->assertEquals(0, $this->object->getWatermark_size());
        $this->object->setWatermark_size(1);
        $this->assertEquals(1, $this->object->getWatermark_size());
    }

    /**
     * @covers Live::getWatermark_url
     */
    public function testGetWatermark_url() {
        $this->assertEquals("", $this->object->getWatermark_url());
        $this->object->setWatermark_url("http://www.mywatermark.com");
        $this->assertEquals("http://www.mywatermark.com", $this->object->getWatermark_url());
    }

    /**
     * @covers Live::getId_player_size
     */
    public function testGetId_player_size() {
        $this->assertEquals(0, $this->object->getId_player_size());
        $this->object->setId_player_size(1234);
        $this->assertEquals(1234, $this->object->getId_player_size());
    }

    /**
     * @covers Live::getPlayer_width
     */
    public function testGetPlayer_width() {
        $this->assertEquals(null, $this->object->getPlayer_width());
        $this->object->setPlayer_width(1234);
        $this->assertEquals(1234, $this->object->getPlayer_width());
    }

    /**
     * @covers Live::getPlayer_height
     */
    public function testGetPlayer_height() {
        $this->assertEquals(null, $this->object->getPlayer_height());
        $this->object->setPlayer_height(4321);
        $this->assertEquals(4321, $this->object->getPlayer_height());
    }

    /**
     * @covers Live::getReferers_id
     */
    public function testGetReferers_id() {

        $this->assertEquals(0, $this->object->getReferers_id());
        $this->object->setReferers_id(4569);
        $this->assertEquals(4569, $this->object->getReferers_id());
    }

    /**
     * @covers Live::getCountries_id
     */
    public function testGetCountries_id() {

        $this->assertEquals(0, $this->object->getCountries_id());
        $this->object->setCountries_id(7896);
        $this->assertEquals(7896, $this->object->getCountries_id());
    }

    /**
     * @covers Live::getThumbnail_id
     */
    public function testGetThumbnail_id() {
        $this->assertEquals(1, $this->object->getThumbnail_id());
        $this->object->setThumbnail_id(41223);
        $this->assertEquals(41223, $this->object->getThumbnail_id());
    }

    /**
     * @covers Live::getSplashscreen_id
     */
    public function testGetSplashscreen_id() {
        $this->assertEquals(0, $this->object->getSplashscreen_id());
        $this->object->setSplashscreen_id(34536);
        $this->assertEquals(34536, $this->object->getSplashscreen_id());
    }

    /**
     * @covers Live::getThumbnail_online
     */
    public function testGetThumbnail_online() {
        $this->assertEquals("", $this->object->getThumbnail_online());
        $this->object->setThumbnail_online(1);
        $this->assertEquals(1, $this->object->getThumbnail_online());
    }

    /**
     * @covers Live::getBackup_url
     */
    public function testGetBackup_url() {
        $this->assertEquals("", $this->object->getBackup_url());
        $this->object->setBackup_url("http://www.mybackupurl.com");
        $this->assertEquals("http://www.mybackupurl.com", $this->object->getBackup_url());
    }

    /**
     * @covers Live::get_currentRate
     */
    public function testGet_currentRate() {
        $this->assertInstanceOf(Rate, $this->object->get_currentRate());
    }

    /**
     * @covers Live::getHds
     */
    public function testGetHds() {
        $this->assertNull($this->object->getHds());
        $this->object->setHds("http://developer.longtailvideo.com");
        $this->assertEquals("http://developer.longtailvideo.com", $this->object->getHds());
    }

    /**
     * @covers Live::getHls
     */
    public function testGetHls() {
        $this->assertNull($this->object->getHls());
        $this->object->setHls("http://developer2.longtailvideo.com");
        $this->assertEquals("http://developer2.longtailvideo.com", $this->object->getHls());
    }

    /**
     * @covers Live::setLiveId
     */
    public function testSetLiveId() {
        $this->assertEquals(0, $this->object->getLive_Id());
        $this->object->setLiveId(6549);
        $this->assertEquals(6549, $this->object->getLive_Id());
    }

    /**
     * @covers Live::setTitle
     */
    public function testSetTitle() {
        $this->object->setTitle("my super title");
        $this->assertEquals("my super title", $this->object->getTitle());
    }

    /**
     * @covers Live::setDescription
     */
    public function testSetDescription() {
        $this->object->setDescription("my super description");
        $this->assertEquals("my super description", $this->object->getDescription());
    }

    /**
     * @covers Live::setCustom_data
     */
    public function testSetCustom_data() {
        $this->object->setCustom_data("#%$%&%^fhbuy");
        $this->assertEquals("#%$%&%^fhbuy", $this->object->getCustom_data());
    }

    /**
     * @covers Live::setOnline
     */
    public function testSetOnline() {
        $exception = "Parameter online from setOnline function can only take two value (0 = online or 1 = online) in Live object.";
        try {
            $this->object->setOnline("gshfnng");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }


        try {
            $this->object->setOnline("42");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        $this->object->setOnline(1);
        $this->assertEquals(1, $this->object->getOnline());

        $this->object->setOnline(0);
        $this->assertEquals(0, $this->object->getOnline());
    }

    /**
     * @covers Live::setStream_type
     */
    public function testSetStream_type() {
        $exception = "Parameter stream_type from setStream_type() function can only take two value (1 = live or 3 = radio) in Live object.";
        try {
            $this->object->setOnline(0);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        try {
            $this->object->setOnline("egfyhfhfuy");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        $this->object->setStream_type(1);
        $this->assertEquals(1, $this->object->getStream_type());

        $this->object->setStream_type(3);
        $this->assertEquals(3, $this->object->getStream_type());
    }

    /**
     * @covers Live::setStream_category
     */
    public function testSetStream_category() {
        try {
            $this->object->setStream_category("aeshtr");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter stream_category from setStream_Category() function is not numeric in Live object.", $e->getMessage());
        }

        $this->object->setStream_category(3);
        $this->assertEquals(3, $this->object->getStream_category());
    }

    /**
     * @covers Live::setUser_id
     */
    public function testSetUser_id() {
        $exception = "Parameter user_id from function setUser_id() is not numeric in Live object.";
        try {
            $this->object->setUser_id("4k6jty");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        try {
            $this->object->setUser_id(null);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }


        $this->object->setUser_id(1256);
        $this->assertEquals(1256, $this->object->getUser_id());
    }

    /**
     * @covers Live::setActivateChat
     */
    public function testSetActivateChat() {
        $exception = "Parameter activateChat from setActivateChat() function can only take two value (0 = disable or 1 = enable) in Live object.";
        try {
            $this->object->setActivateChat("42DFH");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        try {
            $this->object->setActivateChat(42);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        $this->object->setActivateChat(1);
        $this->assertEquals(1, $this->object->getActivateChat());

        $this->object->setActivateChat(0);
        $this->assertEquals(0, $this->object->getActivateChat());
    }

    /**
     * @covers Live::setAutoplay
     */
    public function testSetAutoplay() {
        $exception = "Parameter autoplay from setAutoplay() function can only take two value (0 = disable or 1 = enable) in Live object.";
        try {
            $this->object->setAutoplay("42DFH");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        try {
            $this->object->setAutoplay("33");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        $this->object->setAutoplay(1);
        $this->assertEquals(1, $this->object->getAutoplay());

        $this->object->setAutoplay(0);
        $this->assertEquals(0, $this->object->getAutoplay());
    }

    /**
     * @covers Live::setPlayer_width
     */
    public function testSetPlayer_width() {
        try {
            $this->object->setPlayer_width("rgnrtrb");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter player_width from function setPlayer_width() need to be numeric or null in Live object.", $e->getMessage());
        }
        $this->object->setPlayer_width(null);
        $this->object->setPlayer_width(47769);
        $this->assertEquals(47769, $this->object->getPlayer_width());
    }

    /**
     * @covers Live::setPlayer_height
     */
    public function testSetPlayer_height() {
        try {
            $this->object->setPlayer_height("3h3i56");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter player_height from function setPlayer_height() need to be numeric or null in Live object.", $e->getMessage());
        }
        $this->object->setPlayer_height(null);
        $this->object->setPlayer_height(44569);
        $this->assertEquals(44569, $this->object->getPlayer_height());
    }

    /**
     * @covers Live::setReferers_id
     */
    public function testSetReferers_id() {
        $exception = "Parameter referers_id from function setReferers_id() is not numeric in Live object.";
        try {
            $this->object->setReferers_id("4k6jty");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        try {
            $this->object->setReferers_id(null);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        $this->object->setReferers_id(1256);
        $this->assertEquals(1256, $this->object->getReferers_id());
    }

    /**
     * @covers Live::setCountries_id
     */
    public function testSetCountries_id() {
        $exception = "Parameter countries_id from function setCountries_id() is not numeric in Live object.";
        try {
            $this->object->setCountries_id("4k6jty");
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        try {
            $this->object->setCountries_id(null);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals($exception, $e->getMessage());
        }

        $this->object->setCountries_id(12778);
        $this->assertEquals(12778, $this->object->getCountries_id());
    }

    /**
     * @covers Live::set_currentRate
     */
    public function testSet_currentRate() {
        try {
            $this->object->set_currentRate(new Coupon);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter currentRate from function set_currentRate() is not an instance of Rate in Live object.", $e->getMessage());
        }

        $rate = new Rate(0, "payperview", 20, "EUR", 10, "min");
        $this->object->set_currentRate($rate);
        $this->assertSame($rate, $this->object->get_currentRate());
    }

    /**
     * @covers Live::set_TabAllRate
     */
    public function testSet_TabAllRate() {
        $tabrateMissInit = array();
        $tabrateMissInit[] = new Rate(0, "payperview", 20, "EUR", 10, "min");
        $tabrateMissInit[] = new Coupon;

        try {
            $this->object->set_TabAllRate($tabrateMissInit);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("One attribute of the parameter TabAllRate from the function set_TabAllRate() is not an instance of Rate in Live object.", $e->getMessage());
        }

        $tabrate = array();
        $tabrate[] = new Rate(0, "payperview", 20, "EUR", 10, "min");
        $tabrate[] = new Rate(0, "payperview", 30, "USD", 20, "min");
        $this->object->set_TabAllRate($tabrate);

        $this->assertSame($tabrate, $this->object->get_TabAllRate());
    }

    /**
     * @covers Live::get_TabAllRate
     */
    public function testGet_TabAllRate() {
        foreach ($this->object->get_TabAllRate() as $rate) {
            $this->assertInstanceOf(Rate, $rate);
        }
    }

    /**
     * @covers Live::reset_ALLRate
     */
    public function testReset_ALLRate() {
        $this->object->reset_ALLRate();
        $this->assertNull($this->object->get_TabAllRate());
    }

    /**
     * @covers Live::get_currentCoupon
     */
    public function testGet_currentCoupon() {
        $this->assertInstanceOf(Coupon, $this->object->get_currentCoupon());
    }

    /**
     * @covers Live::set_tabAllCoupon
     */
    public function testSet_tabAllCoupon() {
        $tabcouponMissInit = array();
        $tabcouponMissInit[] = new Coupon;
        $tabcouponMissInit[] = new Rate(0, "payperview", 20, "EUR", 10, "min");

        try {
            $this->object->set_tabAllCoupon($tabcouponMissInit);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("One attribute of the parameter TabAllCoupon from the function set_TabAllCoupon() is not an instance of Coupon in Live object.", $e->getMessage());
        }

        $tabcoupon = array();
        $tabcoupon[] = new Coupon;
        $tabcoupon[] = new Coupon(0, "PLOP", 10, "USD", 10);
        $this->object->set_tabAllCoupon($tabcoupon);
        $this->assertSame($tabcoupon, $this->object->get_tabAllCoupon());
    }

    /**
     * @covers Live::get_tabAllCoupon
     */
    public function testGet_tabAllCoupon() {
        foreach ($this->object->get_currentCoupon() as $coupon) {
            $this->assertInstanceOf(Coupon, $coupon);
        }
    }

    /**
     * @covers Live::set_currentCoupon
     */
    public function testSet_currentCoupon() {
        try {
            $this->object->set_currentCoupon(new Coupon);
        } catch (InvalidArgumentException $e) {
            $this->assertEquals("Parameter currentCoupon from function set_currentCoupon() is not an instance of Coupon in Live object.", $e->getMessage());
        }

        $coupon = new Coupon(0, "code", 10, "EUR", 10, "freepass", "payperview", "channel");
        $this->object->set_currentCoupon($coupon);
        $this->assertSame($coupon, $this->object->get_currentCoupon());
    }

}
