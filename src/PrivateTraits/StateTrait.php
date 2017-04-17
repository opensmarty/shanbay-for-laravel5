<?php
/**
 * Created by PhpStorm.
 * User: MrCong
 * Date: 2017/4/17
 * Time: 12:37
 */

namespace Cong5\Shanbay\PrivateTraits;


trait StateTrait
{

    /**
     * 获取被单词的状态
     * @return mixed
     */
    public function getState()
    {
        if (empty(cache('shanbayCookie'))) {
            $this->login();
        }
        $this->headers = [
            'Referer' => 'https://www.shanbay.com/bdc/review/',
            'Cookie' => implode('; ', cache('shanbayCookie'))
        ];
        return $this->call('GET', '/bdc/stats/today/?_=' . $this->getTimestamp());
    }

}