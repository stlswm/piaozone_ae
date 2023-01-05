<?php

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use stlswm\PiaoZoneAe\Business\InvoiceQuery;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Request\InvoiceQueryReq;

require "../vendor/autoload.php";
require "Config.php";

/**
 * Class InvoiceQueryTest
 */
class InvoiceQueryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testReq()
    {
        $client = Client::newClient(Config::ClientId, Config::ClientSecret, Config::EncryptKey);
        $client->setToken(Config::AccessToken);
        $req = new InvoiceQueryReq();
        $req->serialNo = '15479120230105135139';
        $res = InvoiceQuery::req($client, $req);
        var_dump($res);
        $this->assertEquals('0000', $res->errcode);
    }
}