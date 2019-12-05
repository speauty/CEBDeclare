<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Core.php
 * Created: 2019/12/2 上午11:15
 */

namespace CEBDeclare\Lib;
use CEBDeclare\Traits\TraitThrow;

/**
 * Class Core
 * @package CEBDeclare\Lib
 */
class Core
{
    use TraitThrow;

    /**
     * @param string $name
     * @param $value
     * @throws \Exception
     */
    public function __set(string $name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            $this->broken('the property '.$name.' not found');
        }
    }

    /**
     * @param string $name
     * @return |null
     */
    public function __get(string $name)
    {
        return property_exists($this, $name)?$this->$name:null;
    }
}