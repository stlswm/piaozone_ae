<?php

namespace stlswm\PiaoZoneAe\Business;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Response\InvoiceCreateRes;
use stlswm\PiaoZoneAe\Request\InvoiceCreateReq;

class InvoiceCreate
{
    /**
     * @param  Client            $client
     * @param  InvoiceCreateReq  $invoiceCreateReq
     * @return InvoiceCreateRes
     * @throws GuzzleException
     * @throws Exception
     */
    public static function req(Client $client, InvoiceCreateReq $invoiceCreateReq): InvoiceCreateRes
    {
        $response = $client->request("/m5/bill/invoice/create", $invoiceCreateReq, [
            'access_token' => $client->getToken(),
            'reqid'        => bcmul(microtime(true), 1000, 0).mt_rand(100, 999),
        ], true);
        echo $response;
        $resData = json_decode($response);
        if (!$resData) {
            throw new Exception('无法解析返回：'.$response);
        }
        $res = new InvoiceCreateRes();
        $res->errcode = $resData->errcode;
        $res->description = $resData->description;
        if (!empty($resData->data)) {
            foreach ($resData->data as $key => $value) {
                $res->{$key} = $value;
            }
        }
        return $res;
    }
}