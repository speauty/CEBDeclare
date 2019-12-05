<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    TraitThrow.php
 * Created: 2019/12/2 上午11:18
 */

namespace CEBDeclare\Traits;


trait TraitThrow
{
    /**
     * @param string $msg
     * @param int $code
     * @throws \Exception
     */
    public function broken(string $msg, int $code = 0)
    {
        throw new \Exception($msg, $code);
    }
}