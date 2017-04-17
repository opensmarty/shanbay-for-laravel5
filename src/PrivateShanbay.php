<?php
/**
 * 本类是使用模拟登陆，调用shanbay的私有API接口
 * 非稳定接口
 * User: MrCong
 * Date: 2017/4/17
 * Time: 14:18
 */

namespace Cong5\Shanbay;


use Cong5\Shanbay\PrivateTraits\Auth;
use Cong5\Shanbay\Traits\Util;
use GuzzleHttp\Client;
use Cong5\Shanbay\PrivateTraits\StateTrait;
use Cong5\Shanbay\PrivateTraits\CheckInTrait;

class PrivateShanbay
{

    use Util,
        Auth,
        CheckInTrait,
        StateTrait;

    protected $base_uri = 'https://www.shanbay.com/api/v1';
    protected $client_ip = '180.136.239.166';
    protected $statusCode;
    protected $response;
    protected $headers;

    public function __construct()
    {
        if (empty(cache('shanbayCookie'))) {
            $this->login();
        }

        $this->headers = [
            'Accept' => 'application / json, text / javascript, */*; q=0.01',
            'Content-Type' => 'application/json',
            'Host' => 'www.shanbay.com',
            'Origin' => 'https://www.shanbay.com/',
            'Referer' => sprintf("https://www.shanbay.com/checkin/user/calendar/%s/%s", $this->getUserId(), date('Ym')),
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
            'X-Requested-With' => 'XMLHttpRequest',
            //模拟登陆的IP
            'CLIENT-IP' => $this->client_ip,
            'X-FORWARDED-FOR' => $this->client_ip,
            'X-CSRFToken' => null,
            'DNT' => 1
        ];
    }

    /**
     * 获取UID
     * @return int
     */
    protected function getUserId()
    {
        $stringCookies = implode(';', cache('shanbayCookie'));
        preg_match('/userid\=(\d+)/is', $stringCookies, $matches);
        return count($matches) > 0 ? $matches[1] : 0;
    }
}