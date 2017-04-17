<?php
/**
 * Created by PhpStorm.
 * User: MrCong
 * Date: 2017/4/17
 * Time: 15:02
 */

namespace Cong5\Shanbay\Traits;


use GuzzleHttp\Client;

trait Util
{

    /**
     * 请求方法
     * @param string $method
     * @param $uri
     * @param array $parameters
     * @return mixed
     */
    protected function call($method = 'GET', $uri, array $parameters = [], $decode = true)
    {
        $http = new Client(['cookies' => true]);
        $parameters = array_merge($parameters, [
            'headers' => $this->headers,
        ]);
        $response = $http->request($method, $this->base_uri . $uri, $parameters);
        $this->statusCode = $response->getStatusCode();
        if ($decode) {
            return json_decode($response->getBody()->getContents(), true);
        }
        return $response;
    }

    /**
     * 模拟生成JS时间戳
     * @return int
     */
    protected function getTimestamp()
    {
        return time() * 1000;
    }

}