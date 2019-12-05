<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    DeclareClass.php
 * Created: 2019/12/2 上午10:27
 */

namespace CEBDeclare;
use CEBDeclare\Lib\Core;
use CEBDeclare\Opts\UploadInventory;


/**
 * Class CEBDeclare
 * @package CEBDeclare
 */
class CEBDeclare extends Core
{
    private $registers = [
        'inventory' => UploadInventory::class
    ];

    public function getClass(string $name)
    {
        if (isset($this->registers[$name])) {
            return new $this->registers[$name];
        } else {
            throw new \Exception("the class {$name} not registered");
        }
    }


}