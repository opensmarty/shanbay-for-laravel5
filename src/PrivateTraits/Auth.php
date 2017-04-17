<?php
/**
 * Created by PhpStorm.
 * User: MrCong
 * Date: 2017/4/17
 * Time: 14:54
 */

namespace Cong5\Shanbay\PrivateTraits;


use Carbon\Carbon;

trait Auth
{

    /**
     * 使用模拟登陆
     * 获取打卡记录的页面的dom内容
     */
    public function login()
    {
        $username = config('shanbay.username');
        $password = config('shanbay.password');
        $this->call('GET', '/g_auth/?username=' . $username);
        $response = $this->call('PUT', '/account/login/web/', [
            'json' => [
                'username' => $username,
                'password' => $password
            ],
            'verify' => false
        ],false);
        $authCookie = $response->getHeader('Set-Cookie');
        $this->headers['Cookie'] = $authCookie;
        $response = $this->call('GET', '/checkin/?for_web=true&_=' . $this->getTimestamp(),[],false);
        $checkInCookie = $response->getHeader('Set-Cookie');
        $cookies = array_merge($authCookie, $checkInCookie);
        cache(['shanbayCookie' => $cookies], Carbon::now()->addDays(9));
    }

}