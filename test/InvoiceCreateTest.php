<?php

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use stlswm\PiaoZoneAe\Business\InvoiceCreate;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Request\InvoiceCreateReq;

require "../vendor/autoload.php";
require "Config.php";

/**
 * Class InvoiceCreateReq
 */
class InvoiceCreateTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testReq()
    {
        $client = Client::newClient(Config::ClientId, Config::ClientSecret, Config::EncryptKey);
        $client->setToken(Config::AccessToken);
        $req = new InvoiceCreateReq();
        $res = InvoiceCreate::req($client, $req);
        var_dump($res);
        $this->assertEquals('0000', $res->errcode);
    }
}