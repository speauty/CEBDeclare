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
$head = [
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
$list = [
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


$head = [
    'appType' => '1',
    'appTime' => date('YmdHis', $time),
    'appStatus' => '2',
    'orderNo' => 'A000001',
    'goodsValue' => 10,
    'freight' => 0,
    'discount' => 0,
    'taxTotal' => 0,
    'acturalPaid' => 10,
    'buyerName' => '范德萨',
    'buyerTelephone' => '4326742874267847827482',
    'buyerIdNumber' => 'feerqweeqwrwq',
    'buyerRegNo' => 'fdafd',
    'payCode' => 'fsdafsd',
    'payName' => 'fdsafdsa',
    'payTransactionId' => 'fdsafdsaf',
    'consignee' => 'fdsafsa',
    'consigneeTelephone' => 'fdsaf',
    'consigneeAddress' => 'fdsafas',
    'note' => 'fdsaf',
];
$list = [
    [
        'gnum' => 1,
        'itemNo' => 'B23213121',
        'itemName' => 'fdsa',
        'gmodel' => 'fdsaf',
        'itemDescribe' => 'fdsa',
        'unit' => '132',
        'qty' => 1,
        'price' => 10,
        'totalPrice' => 10,
        'country' => '111',
    ]
];
$declare = new CEBDeclare();
//$order = $declare->getClass('order');
//$res = $order->run($conf, $head, $list);
//var_dump($res);
$signData = [
    'userInfo' => '1BB81DD910C74D7AA3688BB1CF2CFBB6',
    'customsRegistCode' => 'testCode',
    'waitSignData' => 'data',
    'purpose' => '原始',
    'copNo' => '原始',
];
var_dump($declare->getClass('sign')->run($conf, $signData));

