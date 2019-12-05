<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    test.php
 * Created: 2019/12/3 下午5:09
 */
include_once './vendor/autoload.php';
use CEBDeclare\CEBDeclare;
use CEBDeclare\Lib\Conf;

$conf = include_once 'conf.php';
$conf = new Conf($conf);

$time = time();
$inventoryHead = [
    'appType' => '1',
    'appTime' => date('YmdHis', $time),
    'appStatus' => '2',
    'orderNo' => '2131321',
    'logisticsNo' => '2131321',
    'logisticsCode' => '2131321',
    'logisticsName' => '2131321',
    'copNo' => '2131321',
    'assureCode' => '2131321',
    'emsNo' => '2131321',
    'declTime' => date('Ymd', $time),
    'customsCode' => '1234',
    'portCode' => '1234',
    'buyerIdNumber' => '2131321',
    'buyerName' => '2131321',
    'buyerTelephone' => '2131321',
    'consigneeAddress' => '2131321',
    'agentCode' => '2131321',
    'agentName' => '2131321',
    'areaCode' => '2131321',
    'areaName' => '2131321',
    'tradeMode' => '1210',
    'trafMode' => '1',
    'billNo' => '',
    'country' => '',
    'freight' => 2,
    'insuredFee' => 4.00,
    'grossWeight' => 12.00,
    'netWeight' => 3.00,
    'note' => ''
];
$inventoryList = [
    [
        'gnum' => 1,
        'itemRecordNo' => '2131321',
        'itemNo' => '2131321',
        'itemName' => '2131321',
        'gcode' => '1234567890',
        'gname' => '2131321',
        'gmodel' => '2131321',
        'barCode' => '无',
        'country' => '322',
        'tradeCountry' => '2.4',
        'currency' => '142',
        'qty' => 1,
        'qty1' => 1,
        'unit' => '001',
        'unit1' => '001',
        'price' => 2.00,
        'totalPrice' => 2.00,
    ]
];

$declare = new CEBDeclare();
$inventory = $declare->getClass('inventory');
$res = $inventory->run($conf, $inventoryHead, $inventoryList);
var_dump($res);

