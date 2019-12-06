<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Client.php
 * Created: 2019/12/4 下午2:32
 */

namespace CEBDeclare\Lib;
use CEBDeclare\Traits\Http;


abstract class AbstractClient
{
    use Http;
    protected $uri = 'http://222.211.87.12:7112/rest/declare';
}