<?php

namespace stlswm\PiaoZoneAe\Business;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Response\QuantifySearchRes;


class QuantitySearch
{
    /**
     * @param  Client  $client
     * @return QuantifySearchRes
     * @throws GuzzleException
     * @throws Exception
     */
    public static function req(Client $client): QuantifySearchRes
    {
        $response = $client->request('/bill/hx/yl/get', null, [
            'access_token' => $client->getToken(),
            'reqid'        => bcmul(microtime(true), 1000, 0).mt_rand(100, 999),
        ]);
        $resData = json_decode($response);
        if (!$resData) {
            throw new Exception('无法解析返回：'.$response);
        }
        if ($resData->errcode != '0000') {
            throw new Exception($resData->description.',response:'.$response);
        }
        $res = new QuantifySearchRes();
        $res->errcode = $resData->errcode;
        $res->description = $resData->description;
        $res->total = $resData->data->total;
        return $res;
    }
}