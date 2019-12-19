<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    UploadOrder.php
 * Created: 2019/12/6 上午9:04
 */

namespace CEBDeclare\Opts;
use CEBDeclare\Data\OrderData;
use CEBDeclare\Lib\AbstractClient;
use CEBDeclare\Lib\Conf;


/**
 * Class UploadOrder
 * @package CEBDeclare\Opts
 */
class UploadOrder extends AbstractClient
{

    /**
     * @param Conf $conf
     * @param array $orderHead
     * @param array $orderList
     * @return array|null
     * @throws \Exception
     */
    public function run(Conf $conf, array $orderHead, array $orderList)
    {
        $order = new OrderData($orderHead, $orderList, []);
        $order->loadConf($conf);
        $xml = $order->toXml();
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