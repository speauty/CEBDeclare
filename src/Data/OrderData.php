<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    OrderData.php
 * Created: 2019/12/5 下午2:32
 */

namespace CEBDeclare\Data;
use CEBDeclare\Lib\Data;


/**
 * Class OrderData
 * @package CEBDeclare\Data
 */
class OrderData extends Data
{
    protected $xmlFirstWrapperWithCebFlag = true;
    protected $orderListTemplate = [
        /** 商品序号 从1开始的递增序号 */
        'gnum' => 1,
        /** 企业商品货号 电商企业自定义的商品货号(SKU) */
        'itemNo' => '',
        /** 企业商品名称 交易平台销售商品的中文名称 */
        'itemName' => '',
        /** 商品规格型号 满足海关归类/审价以及监管的要求为准. 包括: 品名/牌名/规格/型号/成份/含量/等级等 */
        'gmodel' => '',
        /** 企业商品描述 交易平台销售商品的描述信息 */
        'itemDescribe' => '',
        /** 条形码 国际通用的商品条形码, 一般由前缀部分/制造厂商代码/商品代码和校验码组成 */
        'barCode' => '',
        /** 单位 填写海关标准的参数代码, 参照《JGS-20 海关业务代码集》 - 计量单位代码 */
        'unit' => '',
        /** 数量 商品实际数量 */
        'qty' => 0,
        /** 单价 商品单价. 赠品单价填写为'0' */
        'price' => 0,
        /** 总价 商品总价, 等于单价乘以数量 */
        'totalPrice' => 0,
        /** 币制 限定为人民币, 填写'142' */
        'currency' => '142',
        /** 原产国 填写海关标准的参数代码, 参照《JGS-20 海关业务代码集》-国家(地区)代码表 */
        'country' => '',
        /** 备注 促销活动, 商品单价偏离市场价格的, 可以在此说明*/
        'note' => '',
    ];
    protected $data = [
        'CEB311Message' => [
            'guid' => '',
            'version' => '1.0'
        ],
        'Order' => [
            'OrderHead' => [
                /** 系统唯一序号 企业系统生成36位唯一序号(英文字母大写) */
                'guid' => '',
                /** 报送类型 企业报送类型. 1-新增 2-变更 */
                'appType' => '',
                /** 报送时间 企业报送时间. 格式:YYYYMMDDhhmmss */
                'appTime' => '',
                /** 业务状态 业务状态: 1-暂存,2-申报,默认为2 */
                'appStatus' => '',
                /** 订单类型 电子订单类型: I进口 */
                'orderType' => 'I',
                /** 订单编号 交易平台的订单编号, 同一交易平台的订单编号应唯一. 订单编号长度不能超过60位*/
                'orderNo' => '',
                /** 电商平台代码 电商平台的海关注册登记编号; 电商平台未在海关注册登记, 由电商企业发送订单的, 以中国电子口岸发布的电商平台标识编号为准 */
                'ebpCode' => '',
                /** 电商平台名称 电商平台的海关注册登记名称; 电商平台未在海关注册登记, 由电商企业发送订单的, 以中国电子口岸发布的电商平台名称为准 */
                'ebpName' => '',
                /** 电商企业代码 电商企业的海关注册登记编号 */
                'ebcCode' => '',
                /** 电商企业名称 电商企业的海关注册登记名称 */
                'ebcName' => '',
                /** 商品价格 商品实际成交价, 含非现金抵扣金额 */
                'goodsValue' => 0,
                /** 运杂费 不包含在商品价格中的运杂费, 无则填写"0" */
                'freight' => 0,
                /** 非现金抵扣金额 使用积分/虚拟货币/代金券等非现金支付金额, 无则填写'0' */
                'discount' => 0,
                /** 代扣税款 企业预先代扣的税款金额,无则填写'0' */
                'taxTotal' => 0,
                /** 实际支付金额 商品价格+运杂费+代扣税款非现金抵扣金额, 与支付凭证的支付金额一致 */
                'acturalPaid' => 0,
                /** 币制 限定为人民币, 填写'142' */
                'currency' => '142',
                /** 订购人注册号 订购人的交易平台注册号 */
                'buyerRegNo' => '',
                /** 订购人姓名 订购人的真实姓名 */
                'buyerName' => '',
                /** 订购人电话 海关监管对象的电话, 要求实际联系电话 */
                'buyerTelephone' => '',
                /** 订购人证件类型 1-身份证,2-其它.限定为身份证,填写'1' */
                'buyerIdType' => '1',
                /** 订购人证件号码 订购人的身份证件号码 */
                'buyerIdNumber' => '',
                /** 支付企业代码 支付企业的海关注册登记编号 */
                'payCode' => '',
                /** 支付企业名称 支付企业在海关注册登记的企业名称 */
                'payName' => '',
                /** 支付交易编号 支付企业唯一的支付流水号 */
                'payTransactionId' => '',
                /** 商品批次号 */
                'batchNumbers' => '',
                /** 收货人姓名 收货人姓名, 必须与电子运单的收货人姓名一致 */
                'consignee' => '',
                /** 收货人电话 收货人联系电话, 必须与电子运单的收货人电话一致*/
                'consigneeTelephone' => '',
                /** 收货地址 收货地址, 必须与电子运单的收货地址一致 */
                'consigneeAddress' => '',
                /** 收货地址行政区划代码 参照国家统计局公布的国家行政区划标准填制 */
                'consigneeDistrict' => '',
                'note' => '',
            ],
            'OrderList' => []
        ],
        'BaseTransfer' => [
            /** 传输企业代码 报文传输的企业代码(需要与接入客户端的企业身份一致) */
            'copCode' => '',
            /** 传输企业名称 报文传输的企业名称 */
            'copName' => '',
            /** 报文传输模式 默认为DXP;指中国电子口岸数据交换平台 */
            'dxpMode' => 'DXP',
            /** 报文传输编号 向中国电子口岸数据中心申请数据交换平台的用户编号 */
            'dxpId' => '',
            'note' => ''
        ]

    ];

    /**
     * 架构方法
     * OrderData constructor.
     * @param array $orderHead
     * @param array $orderList
     * @param array $baseTransfer
     * @param string $uuid
     */
    public function __construct(array $orderHead, array $orderList, array $baseTransfer, string $uuid = '')
    {
        if (!$uuid) {
            if (isset($orderHead['guid']) && $orderHead['guid']) {
                $uuid = $orderHead['guid'];
            } else {
                $uuid = $this->uuid();
            }
        }
        $orderHead['guid'] = $uuid;
        $this->data['CEB311Message']['guid'] = $uuid;
        $this->data['Order']['OrderHead'] = array_intersect_key(array_merge($this->data['Order']['OrderHead'], $orderHead), $this->data['Order']['OrderHead']);
        foreach ($orderList as $v) {
            $this->data['Order']['OrderList'][] = array_intersect_key(array_merge($this->orderListTemplate, $v), $this->orderListTemplate);
        }
        $baseTransfer && ($this->data['BaseTransfer'] = array_intersect_key(array_merge($this->data['BaseTransfer'], $baseTransfer), $this->data['BaseTransfer']));
    }

    /**
     * 合并配置内容
     */
    public function mergeConf()
    {
        /** 合并Order.OrderHead节点 */
        $this->data['Order']['OrderHead'] = array_intersect_key(array_merge($this->data['Order']['OrderHead'], $this->conf), $this->data['Order']['OrderHead']);
        /** 合并BaseTransfer节点 */
        $this->data['BaseTransfer'] = array_intersect_key(array_merge($this->data['BaseTransfer'], $this->conf), $this->data['BaseTransfer']);
    }

    public function fillXmlAttributes()
    {
        $this->xmlWithAttributes = [
            'version' => $this->version,
            'encoding' => 'UTF-8'
        ];
    }

    public function fillXmlFirstWrapperAndAttributes()
    {
        $this->xmlFirstWrapper = [
            'name' => 'CEB311Message',
            'attributes' => [
                'version' => $this->version,
                'guid' => $this->data['CEB311Message']['guid'],
                'xmlns:ceb' => 'http://www.chinaport.gov.cn/ceb',
                'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            ]
        ];
    }

    /**
     * 验证数据有效性
     * @throws \Exception
     */
    public function validate()
    {
        if (empty($this->conf)) $this->broken('the conf not load');

        /** 检测CEB621Message */
        foreach ($this->data['CEB311Message'] as $k => $v) {
            if (empty($v)) {
                $this->broken("the node CEB311Message.{$k} is empty");
            }
        }

        /** 检测OrderHead */
        $orderHeadCanIgnore = ['batchNumbers', 'consigneeDistrict', 'note', 'freight', 'discount', 'taxTotal'];

        if (!in_array($this->data['Order']['OrderHead']['appType'], ['1', '2'], true)) {
            $this->broken('the node Order.OrderHead.appType invalid');
        } else {
            $orderHeadCanIgnore[] = 'appType';
        }
        if (!in_array($this->data['Order']['OrderHead']['appStatus'], ['1', '2'], true)) {
            $this->broken('the node Order.OrderHead.appStatus invalid');
        } else {
            $orderHeadCanIgnore[] = 'appStatus';
        }
        if ($this->data['Order']['OrderHead']['orderType'] !== 'I') {
            $this->broken('the node Order.OrderHead.orderType invalid');
        } else {
            $orderHeadCanIgnore[] = 'orderType';
        }
        if ($this->data['Order']['OrderHead']['currency'] !== '142') {
            $this->broken('the node Order.OrderHead.currency invalid');
        } else {
            $orderHeadCanIgnore[] = 'currency';
        }
        if ($this->data['Order']['OrderHead']['buyerIdType'] !== '1') {
            $this->broken('the node Order.OrderHead.buyerIdType invalid');
        } else {
            $orderHeadCanIgnore[] = 'buyerIdType';
        }

        foreach ($this->data['Order']['OrderHead'] as $k => $v) {
            if (!in_array($k, $orderHeadCanIgnore, true) && empty($v)) {
                $this->broken("the node Order.OrderHead.{$k} is empty");
            }
        }

        /** 检测OrderList */
        $orderListCanIgnore = ['itemNo', 'itemDescribe', 'barCode', 'note'];

        foreach ($this->data['Order']['OrderList'] as $k => $v) {
            foreach ($v as $sk => $sv) {
                if ($sk === 'currency') {
                    $this->data['Order']['OrderList'][$k][$sk] = '142';
                } else if (!in_array($sk, $orderListCanIgnore, true) && empty($sv)) {
                    $this->broken("the node Order.OrderList.{$k}.{$sk} is empty");
                }
            }
        }

        /** 检测BaseTransfer */
        foreach ($this->data['BaseTransfer'] as $k => $v) {
            if ($k !== 'note' && empty($v)) {
                $this->broken("the node BaseTransfer.{$k} is empty");
            }
        }
    }
}