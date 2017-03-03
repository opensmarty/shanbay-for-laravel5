<?php
/**
 * Created by PhpStorm.
 * User: MrCong <i@cong5.net>
 * Date: 2017/3/1
 * Time: 10:41
 */

namespace Cong5\Shanbay\Traits;


trait WordTrait
{

    public function searchWord($word = '')
    {
        return $this->call('GET', '/bdc/search/', ['word' => $word]);
    }

    public function addWord($word_id = 0)
    {
        return $this->call('POST', '/bdc/learning/', ['id' => $word_id]);
    }

    public function forgetWord($learning_id = 0)
    {
        return $this->call('PUT', '/bdc/learning/' . $learning_id, ['forget' => 1]);
    }

}