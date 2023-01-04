<?php

use GuzzleHttp\Exception\GuzzleException;
use PHPUnit\Framework\TestCase;
use stlswm\PiaoZoneAe\Business\InvoiceCreate;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Request\InvoiceCreateItem;
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
        $req->salerTaxNo = Config::SalerTaxNo;
        $req->salerAddress = Config::SalerAddress;
        $req->buyerName = '王敏-test';
        $req->invoiceAmount = '1';//金额合计(不含税)
        $req->type = '0';
        $req->taxFlag = '1';
        $req->inventoryFlag = '0';
        $req->drawer = '王瑜';
        $req->serialNo = '2023010414231000';
        $req->totalAmount = '1';//价税合计(小写)
        $req->totalTaxAmount = '0.06';//总税额
        $req->invoiceType = '1';
        $item = new InvoiceCreateItem();
        $item->preferentialPolicy = '0';
        $item->taxRate = '0.06';
        $item->detailAmount = '1';//总价
        $item->discountType = '0';
        $item->goodsCode = '3040408000000000000';
        $item->taxAmount = '0.06';//税额
        $item->goodsName = '装卸费';
        $req->items = [$item];

        // echo json_encode($req,JSON_UNESCAPED_UNICODE);
        // DIE;

        $res = InvoiceCreate::req($client, $req);
        var_dump($res);
        $this->assertEquals('0000', $res->errcode);
    }
}