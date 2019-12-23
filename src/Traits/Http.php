<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    TraitHttp.php
 * Created: 2019/12/4 下午2:31
 */

namespace CEBDeclare\Traits;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

trait Http
{
    public function http():Client
    {
        return new Client();
    }
}