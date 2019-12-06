<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    BuildSignData.php
 * Created: 2019/12/2 上午11:54
 */

namespace CEBDeclare\Data;


use CEBDeclare\Lib\Data;

class BuildSignData extends Data
{
    protected $xmlFirstWrapperWithCebFlag = true;
    protected $data = [
        'CEBSignMessage' => [
            'guid' => '',
            'version' => '1.0'
        ],
        'SignData' => [
            /** 账户信息 账户MD5(用户名+MD5(密码)) MD5全大写 32位MD5 */
            'userInfo' => '',
            /** 企业海关注册代码  */
            'customsRegistCode' => '',
            /** 编码后待加签数据 BASE64Encoder.encode('待加签数据') */
            'waitSignData' => '',
            /** 企业内部编号 企业内部生成唯一编号 */
            'copNo' => '',
            /** 用途 电商平台的海关注册登记编号*/
            'purpose' => '',
            /** 备注 支付企业的海关注册登记编号 */
            'note' => '',
        ]
    ];

    public function __construct(array $signData, string $uuid = '')
    {
        if (!$uuid) $uuid = $this->uuid();
        $this->data['CEBSignMessage']['guid'] = $uuid;
        $signData && ($this->data['SignData'] = array_intersect_key(array_merge($this->data['SignData'], $signData), $this->data['SignData']));
    }

    public function mergeConf()
    {

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
            'name' => 'CEBSignMessage',
            'attributes' => [
                'version' => $this->version,
                'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance'
            ]
        ];
    }

    /**
     * @throws \Exception
     */
    public function validate()
    {
        if (empty($this->conf)) $this->broken('the conf not load');

        /** 检测CEBSignMessage */
        foreach ($this->data['CEBSignMessage'] as $k => $v) {
            if (empty($v)) {
                $this->broken("the node CEBSignMessage.{$k} is empty");
            }
        }

        /** 检测CEBSignMessage */
        foreach ($this->data['CEBSignMessage'] as $k => $v) {
            if ($k !== 'note' && empty($v)) {
                $this->broken("the node CEBSignMessage.{$k} is empty");
            }
        }
    }
}