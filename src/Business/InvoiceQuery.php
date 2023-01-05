<?php

namespace stlswm\PiaoZoneAe\Business;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Request\InvoiceQueryReq;
use stlswm\PiaoZoneAe\Response\InvoiceQueryRes;

/**
 * Class InvoiceQuery
 * @package stlswm\PiaoZone\Business
 */
class InvoiceQuery
{
    /**
     * @param  Client           $client
     * @param  InvoiceQueryReq  $invoiceQueryReq
     * @return InvoiceQueryRes
     * @throws GuzzleException
     * @throws Exception
     */
    public static function req(
        Client $client,
        InvoiceQueryReq $invoiceQueryReq
    ): InvoiceQueryRes {
        $response = $client->request("/m7/bill/invoice/serialno/query", $invoiceQueryReq, [
            'access_token' => $client->getToken(),
            'reqid'        => bcmul(microtime(true), 1000, 0).mt_rand(100, 999),
        ], true);
        $resData = json_decode($response);
        if (!$resData) {
            throw new Exception('无法解析返回：'.$response);
        }
        $invoiceQueryRes = new InvoiceQueryRes();
        $invoiceQueryRes->errcode = $resData->errcode;
        $invoiceQueryRes->description = $resData->description;
        if ($resData->data) {
            foreach ($resData->data as $key => $value) {
                $invoiceQueryRes->{$key} = $value;
            }
        }
        return $invoiceQueryRes;
    }
}