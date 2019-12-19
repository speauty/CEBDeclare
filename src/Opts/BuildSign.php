<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    BuildSign.php
 * Created: 2019/12/2 上午11:52
 */

namespace CEBDeclare\Opts;
use CEBDeclare\Data\BuildSignData;
use CEBDeclare\Lib\AbstractClient;
use CEBDeclare\Lib\Conf;


/**
 * Class BuildSign
 * @package CEBDeclare\Opts
 */
class BuildSign extends AbstractClient
{
    /**
     * @param Conf $conf
     * @param array $signData
     * @return array|null
     * @throws \Exception
     */
    public function run(Conf $conf, array $signData)
    {
        $inventory = new BuildSignData($signData);
        $inventory->loadConf($conf);
        $xml = $inventory->toXml();
        $this->requestXml = $xml;
        $response = $this->http()->post($this->uri, [
            'form_params' => [
                'xml' => $xml
            ]
        ]);
        $this->responseXml = $response->getBody()->getContents();
        return $this->result($response);
    }
}