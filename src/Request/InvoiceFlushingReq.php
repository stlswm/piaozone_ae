<?php


namespace stlswm\PiaoZoneAe\Request;


class InvoiceFlushingReq extends Req
{
    /**
     * 发票序列号，20位以上 (此参数必填)
     * @var string
     */
    public string $serialNo;

    /**
     * 指定生成红票流水号 （此参数非必填）
     * @var string
     */
    public string $originalSerialNo;

    /**
     * 红冲原因  不填系统默认传2，需要税局校验 1:销货退回 2:开票有误 3:服务中止 4:销售折让 （此参数非必填）
     * @var string
     */
    public string $redReason;
}