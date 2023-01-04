<?php

namespace stlswm\PiaoZoneAe\Request;


class AccessTokenReq extends Req
{

    public string $client_id;


    public string $sign;


    public int $timestamp;
}