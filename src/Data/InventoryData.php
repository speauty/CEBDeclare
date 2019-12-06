<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    InventoryData.php
 * Created: 2019/12/2 上午11:56
 */

namespace CEBDeclare\Data;
use CEBDeclare\Lib\Data;


/**
 * Class InventoryData
 * @package CEBDeclare\data
 */
class InventoryData extends Data
{
    protected $xmlFirstWrapperWithCebFlag = true;
    protected $inventoryListTemplate = [
        /** 序号 从1开始连续序号, 与关联的电子订单表体序号一一对应*/
        'gnum' => 1,
        /** 账册备案料号 保税进口必填 */
        'itemRecordNo' => '',
        /** 企业商品货号 电商企业自定义的商品货号 */
        'itemNo' => '',
        /** 企业商品品名 交易平台销售商品的中文名称 */
        'itemName' => '',
        /** 商品编码 */
        /** 按商品分类编码规则确定的进出口商品的商品编号
         * 分为商品编号和附加编号
         * 其中商品编号栏应填报《中华人民共和国进出口税则》8位税则号列
         * 附加编号应填报商品编号
         * 附加编号第9/10位
         */
        'gcode' => '',
        /** 商品名称 商品名称应据实填报, 与电子订单一致 */
        'gname' => '',
        /** 商品规格型号 */
        /** 满足海关归类/审价以及监管的要求为准.包括: 品名/牌名/规格/型号/成份/含量/等级等 */
        'gmodel' => '',
        /** 条码 商品条码一般由前缀部分、制造厂商代码、商品代码和校验码组成。
        没有条码填'无'*/
        'barCode' => '无',
        /** 原产国(地区) 海关标准的参数代码 《JGS-20 海关业务代码集》 国家(地区)代码表填写代码 */
        'country' => '',
        /** 贸易国 按海关规定的《国别（地区）代码表》选择填报相应的贸易国（地区）代码 */
        'tradeCountry' => '',
        /** 币制 限定为人民币, 填写'142'*/
        'currency' => '142',
        /** 数量 按成交计量单位的实际数量 */
        'qty' => 0,
        /** 法定数量 按照商品编码规则对应的法定计量单位的实际数量填写 */
        'qty1' => 0,
        /** 第二数量 */
        'qty2' => 0,
        /** 计量单位 海关标准的参数代码 《JGS-20 海关业务代码集》- 计量单位代码 */
        'unit' => '',
        /** 法定计量单位 海关标准的参数代码《JGS-20 海关业务代码集》- 计量单位代码 */
        'unit1' => '',
        /** 第二计量单位 */
        'unit2' => '',
        /** 单价 成交单价 */
        'price' => 0.00,
        /** 总价 成交总价 */
        'totalPrice' => 0.00,
        /** 备注 */
        'note' => ''
    ];

    protected $data = [
        'CEB621Message' => [
            /** 报文的36位系统唯一序号(英文字母大写)*/
            'guid' => '',
            'version' => '1.0'
        ],
        /** 进口订单业务节点 */
        'Inventory' => [
            /** 进口清单表头 */
            'InventoryHead' => [
                'guid' => '',
                /** 企业报送类型 1-新增 2-变更 */
                'appType' => '',
                /** 企业报送时间格式:YYYYMMDDhhmmss */
                'appTime' => '',
                /** 业务状态:1-暂存, 2-申报  */
                'appStatus' => '',
                /** 交易平台的订单编号, 同一交易平台的订单编号应唯一.订单编号长度不能超过60位 */
                'orderNo' => '',
                /** 电商平台的海关注册登记编号 */
                'ebpCode' => '',
                /** 电商平台的海关注册登记名称 */
                'ebpName' => '',
                /** 电商企业的海关注册登记编号 */
                'ebcCode' => '',
                /** 电商企业的海关注册登记名称 */
                'ebcName' => '',
                /** 物流企业的运单包裹面单号 */
                'logisticsNo' => '',
                /** 物流企业的海关注册登记编号 */
                'logisticsCode' => '',
                /** 物流企业在海关注册登记的名称 */
                'logisticsName' => '',
                /** 企业内部标识单证的编号 */
                'copNo' => '',
                /** 电子口岸标识单证的编号 */
                'preNo' => '',
                /** 担保扣税的企业海关注册登记编号, 只限清单的电商平台企业/电商企业/物流企业 */
                'assureCode' => '',
                /** 保税模式必填，填写区内仓储企业在海关备案的账册编号 */
                'emsNo' => '',
                /** 海关接受申报生成的清单编号 */
                'invtNo' => '',
                /** 进出口标记 I-进口  */
                'ieFlag' => 'I',
                /** 申报日期，以海关计算机系统接受清单申报数据时记录的日期为准 格式:YYYYMMDD */
                'declTime' => '',
                /** 申报海关代码 接受清单申报的海关关区代码，参照JGS/T 18《海关关区代码》 */
                'customsCode' => '',
                /** 口岸海关代码 商品实际进出我国关境口岸海关的关区代码, 参照JGS/T18《海关关区代码》 */
                'portCode' => '',
                /** 运载所申报商品的运输工具申报进境的日期，进口申报时无法确知相应的运输工具的实际进境日期时, 免填 */
                'ieDate' => '00000000',
                /** 订购人证件类型 1-身份证, 2-其它. 限定为身份证, 填写'1'*/
                'buyerIdType' => '1',
                /** 订购人的身份证件号码 */
                'buyerIdNumber' => '',
                /** 订购人的真实姓名 */
                'buyerName' => '',
                /** 订购人电话 */
                'buyerTelephone' => '',
                /** 收件地址 */
                'consigneeAddress' => '',
                /** 申报企业代码 申报单位的海关注册登记编号 */
                'agentCode' => '',
                /** 申报企业名称 申报单位在海关注册登记的名称 */
                'agentName' => '',
                /** 区内企业代码 保税模式必填, 区内仓储企业的海关注册登记编号 */
                'areaCode' => '',
                /** 区内企业名称 保税模式必填, 区内仓储企业在海关注册登记的名称 */
                'areaName' => '',
                /** 贸易方式 直购进口填写'9610'，保税进口填写'1210' */
                'tradeMode' => '',
                /** 运输方式 直购进口指跨境段物流运输方式, 保税进口指二线出区物流运输方式 */
                'trafMode' => '',
                /** 运输工具编号  */
                /** 直购进口必填.
                 * 货物进出境的运输工具的名称或运输工具编号.
                 * 填报内容应与运输部门向海关申报的载货清单所列相应内容一致;
                 * 同报关单填制规范.
                 * 保税进口免填
                 */
                'trafNo' => '',
                /** 航班航次号 直购进口必填.货物进出境的运输工具的航次编号.保税进口免填 */
                'voyageNo' => '',
                /** 提运单号 直购进口必填.货物提单或运单的编号,保税进口免填 */
                'billNo' => '',
                /** 监管场所代码 针对同一申报地海关下有多个跨境电子商务的监管场所, 需要填写区分 */
                'loctNo' => '',
                /** 许可证件号 商务主管部门及其授权发证机关签发的进出口货物许可证件的编号 */
                'licenseNo' => '',
                /** 起运国(地区) */
                /** 直购进口填写起始发出国家(地区)代码, 参照《JGS-20 海关业务代码集》的国家(地区)代码表;保税进口填写代码"142" */
                'country' => '',
                /** 运费 物流企业实际收取的运输费用 */
                'freight' => 0.00,
                /** 保费 物流企业实际收取的商品保价费用 */
                'insuredFee' => 0.00,
                /** 币制 限定为人民币, 填写"142" */
                'currency' => '142',
                /** 包装种类代码  */
                /** 海关对进出口货物实际采用的外部包装方式的标识代码, 采用1 位数字表示, 如: 木箱/纸箱/桶装/散装/托盘/包/油罐车等 */
                'wrapType' => '0',
                /** 件数 件数为包裹数量，限定为"1" */
                'packNo' => 1,
                /** 毛重(公斤) 货物及其包装材料的重量之和, 计量单位为千克 */
                'grossWeight' => 0.00,
                /** 净重(公斤) 货物的毛重减去外包装材料后的重量, 即货物本身的实际重量, 计量单位为千克 */
                'netWeight' => 0.00,
                /** 备注 */
                'note' => ''
            ],
            /** 进口清单表体 */
            'InventoryList' => []
        ],
        /** 放置报文传输企业信息 */
        'BaseTransfer' => [
            /** 传输企业代码 报文传输的企业代码(需要与接入客户端的企业身份一致)*/
            'copCode' => '',
            /** 传输企业名称 报文传输的企业名称 */
            'copName' => '',
            /** 报文传输模式 默认为DXP；指中国电子口岸数据交换平台 */
            'dxpMode' => 'DXP',
            /** 报文传输编号 向中国电子口岸数据中心申请数据交换平台的用户编号 */
            'dxpId' => ''
        ]
    ];

    /**
     * 架构方法
     * InventoryData constructor.
     * @param array $inventoryHead
     * @param array $inventoryList
     * @param array $baseTransfer
     * @param string $uuid
     */
    public function __construct(array $inventoryHead, array $inventoryList, array $baseTransfer, string $uuid = '')
    {
        if (!$uuid) {
            if (isset($inventoryHead['guid']) && $inventoryHead['guid']) {
                $uuid = $inventoryHead['guid'];
            } else {
                $uuid = $this->uuid();
            }
        }
        $inventoryHead['guid'] = $uuid;
        $this->data['CEB621Message']['guid'] = $uuid;
        $this->data['Inventory']['InventoryHead'] = array_intersect_key( array_merge($this->data['Inventory']['InventoryHead'], $inventoryHead), $this->data['Inventory']['InventoryHead']);
        foreach ($inventoryList as $v) {
            $this->data['Inventory']['InventoryList'][] = array_intersect_key(array_merge($this->inventoryListTemplate, $v), $this->inventoryListTemplate);
        }
        $baseTransfer && ($this->data['BaseTransfer'] = array_intersect_key(array_merge($this->data['BaseTransfer'], $baseTransfer), $this->data['BaseTransfer']));
    }

    /**
     * 合并配置
     */
    public function mergeConf()
    {
        /** 合并Inventory.InventoryHead节点 */
        $this->data['Inventory']['InventoryHead'] = array_intersect_key(array_merge($this->data['Inventory']['InventoryHead'], $this->conf), $this->data['Inventory']['InventoryHead']);
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
            'name' => 'CEB621Message',
            'attributes' => [
                'version' => $this->version,
                'guid' => $this->data['CEB621Message']['guid'],
                'xmlns:ceb' => 'http://www.chinaport.gov.cn/ceb',
                'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance'
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
        foreach ($this->data['CEB621Message'] as $k => $v) {
            if (empty($v)) {
                $this->broken("the node CEB621Message.{$k} is empty");
            }
        }

        /** 检测InventoryHead */
        $inventoryHeadCanIgnore = [
            'preNo', 'invtNo', 'ieDate', 'loctNo', 'licenseNo', 'wrapType', 'note'
        ];
        if (!in_array($this->data['Inventory']['InventoryHead']['appType'], ['1', '2'], true)) {
            $this->broken('the node Inventory.InventoryHead.appType invalid');
        } else {
            $inventoryHeadCanIgnore[] = 'appType';
        }
        if (!in_array($this->data['Inventory']['InventoryHead']['appStatus'], ['1', '2'],true)) {
            $this->broken('the node Inventory.InventoryHead.appStatus invalid');
        } else {
            $inventoryHeadCanIgnore[] = 'appStatus';
        }
        if ($this->data['Inventory']['InventoryHead']['ieFlag'] !== 'I') {
            $this->broken('the node Inventory.InventoryHead.ieFlag invalid');
        } else {
            $inventoryHeadCanIgnore[] = 'ieFlag';
        }
        if ($this->data['Inventory']['InventoryHead']['buyerIdType'] !== '1') {
            $this->broken('the node Inventory.InventoryHead.buyerIdType invalid');
        } else {
            $inventoryHeadCanIgnore[] = 'buyerIdType';
        }
        if (!in_array($this->data['Inventory']['InventoryHead']['tradeMode'], ['9610', '1210'], true)) {
            $this->broken('the node Inventory.InventoryHead.tradeMode invalid');
        } else {
            $inventoryHeadCanIgnore[] = 'appStatus';
        }
        if ($this->data['Inventory']['InventoryHead']['tradeMode'] === '1210') {
            $inventoryHeadCanIgnore[] = 'trafNo';
            $inventoryHeadCanIgnore[] = 'voyageNo';
            $inventoryHeadCanIgnore[] = 'billNo';
            $this->data['Inventory']['InventoryHead']['country'] = '142';
            $inventoryHeadCanIgnore[] = 'country';
        } else if ($this->data['Inventory']['InventoryHead']['tradeMode'] === '9610') {
            $inventoryHeadCanIgnore[] = 'emsNo';
            $inventoryHeadCanIgnore[] = 'areaCode';
            $inventoryHeadCanIgnore[] = 'areaName';
        }
        if ($this->data['Inventory']['InventoryHead']['currency'] !== '142') {
            $this->broken('the node Inventory.InventoryHead.currency invalid');
        } else {
            $inventoryHeadCanIgnore[] = 'currency';
        }
        if ($this->data['Inventory']['InventoryHead']['packNo'] !== 1) {
            $this->broken('the node Inventory.InventoryHead.packNo invalid');
        } else {
            $inventoryHeadChecked[] = 'packNo';
        }
        foreach ($this->data['Inventory']['InventoryHead'] as $k => $v) {
            if (!in_array($k, $inventoryHeadCanIgnore, true) && empty($v)) {
                $this->broken("the node Inventory.InventoryHead.{$k} is empty");
            }
        }

        /** 检测InventoryList */
        $inventoryListCanIgnore = [
            'itemNo', 'itemName', 'tradeCountry', 'qty2', 'unit2', 'note'
        ];
        if ($this->data['Inventory']['InventoryHead']['tradeMode'] === '9610') {
            $inventoryListCanIgnore[] = 'itemRecordNo';
        }
        foreach ($this->data['Inventory']['InventoryList'] as $k => $v) {
            foreach ($v as $sk => $sv) {
                if ($sk === 'barCode') {
                    if (empty($sv)) {
                        $this->data['Inventory']['InventoryList'][$k][$sk] = '无';
                    }
                } else if ($sk === 'currency') {
                    $this->data['Inventory']['InventoryList'][$k][$sk] = '142';
                } else if (!in_array($sk, $inventoryListCanIgnore, true) && empty($sv)) {
                    $this->broken("the node Inventory.InventoryList.{$k}.{$sk} is empty");
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