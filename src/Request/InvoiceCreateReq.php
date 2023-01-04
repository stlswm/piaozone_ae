<?php

namespace stlswm\PiaoZoneAe\Request;

class InvoiceCreateReq extends Req
{
    public string $inventoryProjectName;
    public string $originalInvoiceNo;
    public string $originalInvoiceCode;
    public string $salerCardNumber;
    public string $salerCardName;
    public string $salerPhone;
    public string $salerAddress;
    public string $salerAccount;
    public string $salerTaxNo;
    public string $buyerAddress;
    public string $buyerTaxNo;
    public string $buyerFixedTelephone;
    public string $buyerName;
    public string $buyerAccount;
    public string $buyerEmail;
    public string $buyerMobilePhone;
    public string $invoiceAmount;
    public string $remark;
    public string $type;
    public string $payee;
    public string $taxFlag;
    public string $inventoryFlag;
    public string $drawer;
    public string $reviewer;
    public string $serialNo;
    public string $totalAmount;
    public string $totalTaxAmount;
    public string $purchaseFlag;
    public string $redReason;
    public string $invoiceType;

    /**
     * @var array  []InvoiceCreateItem
     */
    public array $items;
}