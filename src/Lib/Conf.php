<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Conf.php
 * Created: 2019/12/2 上午10:28
 */

namespace CEBDeclare\Lib;


/**
 * Class Conf
 * @package CEBDeclare\Lib
 */
class Conf extends Core
{
    /**
     * @var array 配置参数
     * conf.ebpCode string 电商平台代码
     * conf.ebpName string 电商平台名称
     * conf.ebcCode string 电商企业代码
     * conf.ebcName string 电商企业名称
     * conf.copCode string 企业代码
     * conf.copName string 企业名称
     * conf.dxpId   string dxpId
     */
    private $conf = [
        'ebpCode' => '',
        'ebpName' => '',
        'ebcCode' => '',
        'ebcName' => '',
        'copCode' => '',
        'copName' => '',
        'dxpId' => '',
    ];

    /**
     * Conf constructor.
     * @param array $sets
     * @throws \Exception
     */
    public function __construct(array $sets)
    {
        $this->conf = array_intersect_key(array_merge($this->conf, $sets), $this->conf);
        $this->validate();
    }

    /**
     * @param string $name
     * @return array|null
     */
    public function get(string $name):?array
    {
        return property_exists($this, $name)?$this->$name:null;
    }

    /**
     * @throws \Exception
     */
    private function validate():void
    {
        if (empty($this->conf)) {
            $this->broken('the conf must be set');
        }
        foreach ($this->conf as $k => $v) {
            if (empty($v)) {
                $this->broken("the conf {$k} must be set");
            }
        }
    }
}