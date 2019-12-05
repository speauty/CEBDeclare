<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Inventory.php
 * Created: 2019/12/2 上午11:55
 */

namespace CEBDeclare\Opts;
use CEBDeclare\Data\InventoryData;
use CEBDeclare\Lib\AbstractClient;
use CEBDeclare\Lib\Conf;

class UploadInventory extends AbstractClient
{
    protected $uri = 'http://222.211.87.12:7112/rest/declare';

    /**
     * @param Conf $conf
     * @param array $inventoryHead
     * @param array $inventoryList
     * @return array|null
     * @throws \Exception
     */
    public function run(Conf $conf, array $inventoryHead, array $inventoryList)
    {
        $inventory = new InventoryData($inventoryHead, $inventoryList, []);
        $inventory->loadConf($conf);
        $inventory->mergeConf();
        $inventory->validate();
        $xml = $inventory->toXml();
        $response = $this->http()->post($this->uri, [
            'form_params' => [
                'xml' => $xml
            ]
        ]);
        return $this->result($response);
    }
}