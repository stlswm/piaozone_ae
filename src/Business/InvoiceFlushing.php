<?php

namespace stlswm\PiaoZoneAe\Business;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Request\InvoiceFlushingReq;
use stlswm\PiaoZoneAe\Response\InvoiceFlushingRes;

/**
 * 发票冲红
 * Class InvoiceFlushing
 * @package stlswm\PiaoZoneAe\Business
 */
class InvoiceFlushing
{
    /**
     * @param  Client              $client
     * @param  InvoiceFlushingReq  $invoiceFlushing
     * @return InvoiceFlushingRes
     * @throws GuzzleException
     * @throws Exception
     */
    public static function req(Client $client, InvoiceFlushingReq $invoiceFlushing): InvoiceFlushingRes
    {
        $response = $client->request('/m5/bill/invoice/invalid', $invoiceFlushing, [
            'access_token' => $client->getToken(),
            'reqid'        => bcmul(microtime(true), 1000, 0),
        ]);
        $resData = json_decode($response);
        if (!$resData) {
            throw new Exception('无法解析返回：'.$response);
        }
        $res = new InvoiceFlushingRes();
        $res->errcode = $resData->errcode;
        $res->description = $resData->description;
        if (!empty($resData->data)) {
            $res->invoiceCode = $resData->data->invoiceCode;
            $res->invoiceNo = $resData->data->invoiceNo;
            $res->pdfUrl = $resData->data->pdfUrl;
            $res->serialNo = $resData->data->serialNo;
        }
        return $res;
    }
}