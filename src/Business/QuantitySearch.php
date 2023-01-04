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
     * @param  string  $accessToken
     * @return QuantifySearchRes
     * @throws GuzzleException
     * @throws Exception
     */
    public static function req(Client $client, string $accessToken): QuantifySearchRes
    {
        $response = $client->request('/bill/hx/yl/get', null, [
            'access_token' => $accessToken,
            'reqid'        => bcmul(microtime(true), 1000, 0),
        ]);
        $resData = json_decode($response);
        if (!$resData) {
            throw new Exception('无法解析返回：'.$response);
        }
        if ($resData->errcode != '0000') {
            throw new Exception($resData->description);
        }
        $res = new QuantifySearchRes();
        $res->errcode = $resData->errcode;
        $res->description = $resData->description;
        $res->total = $resData->data->total;
        return $res;
    }
}