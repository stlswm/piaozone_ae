<?php

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use stlswm\PiaoZoneAe\Business\AccessToken;
use stlswm\PiaoZoneAe\Client;

require "../vendor/autoload.php";
require "Config.php";

/**
 * Class AccessTokenTest
 */
class AccessTokenTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function testReq()
    {
        $client = Client::newClient(Config::ClientId, Config::ClientSecret, Config::EncryptKey);
        $res = AccessToken::req($client);
        var_dump($res);
        $this->assertEquals('0000', $res->errcode);
    }
}