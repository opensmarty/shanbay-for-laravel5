<?php
/**
 * Created by PhpStorm.
 * User: MrCong <i@cong5.net>
 * Date: 2017/3/1
 * Time: 9:57
 */

namespace Cong5\Shanbay\Traits;


trait AuthTrait
{

    /**
     * 获取授权URL
     * @param string $response_type 授权类型，在接口应用的时候选择Authorization grant type
     * @return string
     */
    public function getAuthUrl($response_type = 'code')
    {
        $query = [
            'client_id' => $this->app_key,
            'response_type' => $response_type,
            'redirect_uri' => $this->redirect_uri
        ];
        /**
         * WEB应用授权是Authorization Code模式 ：$response_type=code
         * 客户端应用授权是Implicit模式：$response_type=token
         */
        if ($response_type == 'code') {
            $query['state'] = md5(time());
        }
        return $this->base_url . '/oauth2/authorize/?' . http_build_query($query);
    }

    /**
     * 获取AccessToken
     * @param $code
     * @return mixed
     */
    public function getAccessToken($code)
    {
        $paramaters = [
            'client_id' => $this->app_key,
            'client_secret' => $this->app_secret,
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $this->redirect_uri
        ];
        return $this->call('POST', '/oauth2/token/', $paramaters);
    }



}