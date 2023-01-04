<?php

namespace stlswm\PiaoZoneAe\Request;

class InvoiceCreateItem
{
    public string $unitPrice;
    public string $num;
    public string $preferentialPolicy;
    public string $zeroTaxRateFlag;
    public string $taxRate;
    public string $unit;
    public string $vatException;
    public string $detailAmount;
    public string $specModel;
    public string $discountType;
    public string $goodsCode;
    public string $taxAmount;
    public string $goodsName;
    public string $deduction;
}