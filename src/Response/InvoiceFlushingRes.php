<?php

namespace stlswm\PiaoZoneAe\Response;

use stlswm\PiaoZoneAe\Request\Req;

/**
 * Class AccessTokenReq
 * @package stlswm\PiaoZone\Request
 */
class InvoiceFlushingRes extends Req
{
    /**
     * 状态码
     * @var string
     */
    public string $errcode;

    /**
     * 描述
     * @var string
     */
    public string $description;

    /**
     * 发票代码
     * @var string
     */
    public string $invoiceCode;

    /**
     * 发票号码
     * @var string
     */
    public string $invoiceNo;

    /**
     * PDF格式发票地址
     * @var string
     */
    public string $pdfUrl;

    /**
     * 发票流水号
     * @var string
     */
    public string $serialNo;

}