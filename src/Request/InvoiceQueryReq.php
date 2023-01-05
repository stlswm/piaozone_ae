<?php

namespace stlswm\PiaoZoneAe\Request;

/**
 * Class InvoiceCreateReq
 * @package stlswm\PiaoZone\Request
 */
class InvoiceQueryReq extends Req
{
    /**
     * @var string 开票流水号
     */
    public string $serialNo;
}