<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Data.php
 * Created: 2019/12/2 上午11:57
 */

namespace CEBDeclare\Lib;
use CEBDeclare\Traits\TraitThrow;


abstract class Data
{
    use TraitThrow;
    protected $version = '1.0';
    protected $xmlWithAttributes = null;
    protected $xmlFirstWrapper = null;
    protected $xmlFirstWrapperWithCebFlag = true;
    protected $conf = [];

    public function uuid()
    {
        if (function_exists('com_create_guid') === true) {
            return strtoupper(trim(com_create_guid(), '{}'));
        }

        return strtoupper(sprintf(
            '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(16384, 20479),
            mt_rand(32768, 49151),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
        ));
    }

    public function loadConf(Conf $conf)
    {
        $this->conf = $conf->get('conf');
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toXml()
    {
        if (isset($this->data) && $this->data) {
            $this->fillXmlAttributes();
            $this->fillXmlFirstWrapperAndAttributes();
            $this->mergeConf();
            $this->validate();
            $xml = '<?xml '.$this->buildXmlAttributes($this->xmlWithAttributes).' ?> <'.($this->xmlFirstWrapperWithCebFlag?'ceb:':'').$this->xmlFirstWrapper['name'].$this->buildXmlAttributes($this->xmlFirstWrapper['attributes']).'>';
            $data = $this->data;
            if (isset($data[$this->xmlFirstWrapper['name']])) unset($data[$this->xmlFirstWrapper['name']]);
            $xml .= $this->createXmlRecursion($data)." </".($this->xmlFirstWrapperWithCebFlag?'ceb:':'')."{$this->xmlFirstWrapper['name']}>";
            return $xml;
        } else {
            $this->broken('the xml content lost');
        }
    }

    /**
     * to build xml attributes from the data gaven
     * @param array $data
     * @return string|null
     * @throws \Exception
     */
    private function buildXmlAttributes(array $data)
    {
        $str = '';
        foreach ($data as $k => $v) {
            if (!$v) $this->broken("the xml attribute {$k} empty");
            $str .= " {$k}=\"{$v}\" ";
        }
        return $str;
    }

    private function createXmlRecursion($data, string $prefix = 'ceb')
    {
        $xml = '';
        foreach ($data as $k => $v) {
            if (is_array($v)) {
                if (is_string($k)) $xml .= " <{$prefix}:{$k}>";
                $xml .= $this->createXmlRecursion($v);
                if (is_string($k)) $xml .= " </{$prefix}:{$k}>";
            } else {
                $v = trim($v);
                $xml .= " <{$prefix}:{$k}>{$v}</{$prefix}:{$k}>";
            }
        }
        return $xml;
    }

    abstract public function mergeConf();
    abstract public function fillXmlAttributes();
    abstract public function fillXmlFirstWrapperAndAttributes();
    abstract public function validate();
}