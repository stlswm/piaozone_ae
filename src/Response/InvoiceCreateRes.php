<?php

namespace stlswm\PiaoZoneAe\Response;

use stlswm\PiaoZoneAe\Request\Req;

class InvoiceCreateRes extends Req
{

    public string $errcode;

    public string $description;

    public string $invoiceCode;
    public string $invoiceNo;
    public string $pdfUrl;
    public string $serialNo;

}