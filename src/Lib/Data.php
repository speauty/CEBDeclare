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

    public function toXml()
    {
        if (isset($this->data) && $this->data) {
            $guid = '';
            if (isset($this->data['CEB621Message']) && isset($this->data['CEB621Message']['guid'])) {
                $guid = $this->data['CEB621Message']['guid'];
            }
            if (empty($guid)) $this->broken('the guid is empty');
            $xml = '<?xml version="1.0" encoding="UTF-8"?> <ceb:CEB621Message guid="'.$guid.'" version="1.0" xmlns:ceb="http://www.chinaport.gov.cn/ceb" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">';
            $data = $this->data;
            if (isset($data['CEB621Message'])) unset($data['CEB621Message']);
            $xml .= $this->createXmlRecursion($data).' </ceb:CEB621Message>';
            return $xml;
        } else {
            $this->broken('the xml content lost');
        }
    }

    private function createXmlRecursion($data, string $prefix = 'ceb')
    {
        $xml = '';
        foreach ($data as $k => $v) {
            if (is_array($v)) {
                if (!is_int($k)) $xml .= " <{$prefix}:{$k}>";
                $xml .= $this->createXmlRecursion($v);
                if (!is_int($k)) $xml .= " </{$prefix}:{$k}>";
            } else {
                $v = trim($v);
                $xml .= " <{$prefix}:{$k}>{$v}</{$prefix}:{$k}>";
            }
        }
        return $xml;
    }

    abstract public function mergeConf();
    abstract public function validate();
}