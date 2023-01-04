<?php

namespace stlswm\PiaoZoneAe\Response;

use stlswm\PiaoZoneAe\Request\Req;

/**
 * Class AccessTokenReq
 * @package stlswm\PiaoZone\Request
 */
class AccessTokenRes extends Req
{

    public string $errcode;

    public string $description;

    public string $access_token;

    public string $token_type;

    public int $expires_in;

}