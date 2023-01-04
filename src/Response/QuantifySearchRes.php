<?php

namespace stlswm\PiaoZoneAe\Response;

use stlswm\PiaoZoneAe\Request\Req;

class QuantifySearchRes extends Req
{
    public string $errcode;
    public string $description;

    public int $total;

}