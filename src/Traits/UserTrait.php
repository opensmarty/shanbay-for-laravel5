<?php
/**
 * Created by PhpStorm.
 * User: MrCong <i@cong5.net>
 * Date: 2017/3/1
 * Time: 9:41
 */

namespace Cong5\Shanbay\Traits;


trait UserTrait
{

    /**
     * 获取用户信息
     * @return mixed
     */
    public function getUserInfo()
    {
        return $this->call('GET','/account/');
    }

}