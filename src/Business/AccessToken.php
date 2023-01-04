<?php

namespace stlswm\PiaoZoneAe\Business;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use stlswm\PiaoZoneAe\Client;
use stlswm\PiaoZoneAe\Request\AccessTokenReq;
use stlswm\PiaoZoneAe\Response\AccessTokenRes;


class AccessToken
{
    /**
     * @param  Client  $client
     * @return AccessTokenRes
     * @throws GuzzleException
     * @throws Exception
     */
    public static function req(Client $client): AccessTokenRes
    {
        $timestamp = time();
        $accessTokenReq = new AccessTokenReq();
        $accessTokenReq->client_id = $client->clientId;
        $accessTokenReq->sign = md5($client->clientId.$client->secret.$timestamp);
        $accessTokenReq->timestamp = $timestamp;
        $response = $client->request('/base/oauth/token', $accessTokenReq);
        $resData = json_decode($response);
        if (!$resData) {
            throw new Exception('无法解析返回：'.$response);
        }
        if ($resData->errcode != '0000') {
            throw new Exception($resData->description.',response:'.$response);
        }
        $res = new AccessTokenRes();
        $res->errcode = $resData->errcode;
        $res->description = $resData->description;
        $res->access_token = $resData->access_token;
        $res->token_type = $resData->token_type;
        $res->expires_in = $resData->expires_in;
        return $res;
    }
}