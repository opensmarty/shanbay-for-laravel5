<?php
/**
 * Created by PhpStorm.
 * User: MrCong <i@cong5.net>
 * Date: 2017/3/1
 * Time: 9:26
 */

namespace Cong5\Shanbay;


use Cong5\Shanbay\Traits\Util;
use Cong5\Shanbay\Traits\AuthTrait;
use Cong5\Shanbay\Traits\UserTrait;
use Cong5\Shanbay\Traits\WordTrait;
use Cong5\Shanbay\Traits\NoteTrait;
use Cong5\Shanbay\Traits\SentencesTrait;

class Shanbay
{

    use Util,
        AuthTrait,
        UserTrait,
        WordTrait,
        SentencesTrait,
        NoteTrait;

    protected $base_url = 'https://api.shanbay.com';

    protected $app_key;
    protected $app_secret;
    protected $access_token;
    protected $redirect_uri;
    protected $status_code;
    protected $headers = [];


    public function __construct($app_key = '', $app_secret = '', $redirect_uri = '', $access_token = null)
    {
        $this->app_key = $app_key;
        $this->app_secret = $app_secret;
        $this->redirect_uri = $redirect_uri;

        if (!is_null($access_token) && is_string($access_token)) {
            $this->access_token = $access_token;
            $this->headers = [
                'Authorization' => 'Bearer ' . $this->access_token
            ];
        }
    }

}