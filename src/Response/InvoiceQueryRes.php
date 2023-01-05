<?php

namespace stlswm\PiaoZoneAe\Response;

use stlswm\PiaoZoneAe\Request\Req;

class InvoiceQueryRes extends Req
{
    public string $errcode;
    public string $description;

    public string $kdorgpdfurl;//金蝶云盘发票地址
    public string $salerName;//销方企业名称
    public string $buyerEmail;//购方邮箱
    public string $invoiceAmount;//发票金额(不含税)
    public string $remark;//备注
    public string $type;//0蓝票，1红票
    public string $qsbz;//清单标志
    public string $payee;//收款员
    public string $itemName;//清单名称
    public string $hxbw;//开票方类型，
    public string $salerTaxNo;//销方企业税号
    public string $invoiceChannel;//可忽略
    public string $invoiceType;//发票种类：1、普通电子发票；2、电子发票专票；3、普通纸质发票；4、专用纸质发票；5、普通纸质卷票
    public string $machineNo;//机器编号
    public string $invoiceNo;//发票号码
    public string $buyerAddressPhone;//购方地址电话
    public string $salerAccount;//销方银行账号
    public string $taxFlag;//含税标志，1：含税；0：不含税
    public string $orderNo;//订单号
    public string $buyerTaxNo;//购方税号
    public string $drawer;//开票员
    public string $reviewer;//复核员
    public string $sgfp;//收购票标志
    public string $invoiceDate;//开票时间
    public string $originalInvoiceNo;//原蓝票号码
    public string $buyerName;//购方名称
    public string $invoiceCode;//发票代码
    public string $pdfurl;//发票PDF地址

    public string $invalidDate; //作废时间
    public string $serialNo;//发票流水号(发票云唯一)
    public string $checkCode;//校验码
    public string $totalAmount;//总金额wxCardBagUrl[string]	是	微信卡包地址(暂时无用，可忽略)
    public string $salerAddressPhone;//销方地址电话
    public string $buyerAccount;//卖家银号账号
    public string $snapshotUrl;//发票PDF文件快照地址(图片，不可下载)
    public string $invalid;//是否作废
    public string $buyerMobilePhone;//购方手机号
    public string $cipherArea;//密码区
    public string $totalTaxAmount;//总税额
    public string $totalAmountCn;//中文总金额
    public string $invoiceStatus;//发票状态0:正常、1：失控、2：作废、3：红冲、4：异常
    public string $fwm;//可忽略
    public string $originalInvoiceCode;//原蓝票代码

    public array $items;//明细列表
}