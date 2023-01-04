<?php

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use stlswm\PiaoZoneAe\Business\InvoiceFlushing;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Request\InvoiceFlushingReq;

require "../vendor/autoload.php";
require "Config.php";

/**
 * Class InvoiceCreateReq
 */
class InvoiceFlushingTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testReq()
    {
        $client = Client::newClient(Config::ClientId, Config::ClientSecret, Config::EncryptKey);
        $client->setToken(Config::AccessToken);
        $req = new InvoiceFlushingReq();
        $req->serialNo = "";  //发票序列号 必填
        $req->originalSerialNo = "";  //指定生成红票流水号 非必填
        $req->redReason = "";  //红冲原因 非必填

        $res = InvoiceFlushing::req($client, $req);
        var_dump($res);
        $this->assertEquals('0000', $res->errcode);
    }
}