<?php
/**
 * Created by PhpStorm.
 * User: MrCong <i@cong5.net>
 * Date: 2017/3/1
 * Time: 9:42
 */

namespace Cong5\Shanbay\Traits;


trait SentencesTrait
{
    /**
     * 获取例句
     * @param $vocabulary 单词id
     * @param string $type
     * @return mixed
     */
    public function getExample($vocabulary, $type = 'sys')
    {
        return $this->call('GET', '/bdc/example/', ['vocabulary_id' => $vocabulary, 'type' => $type]);
    }

    /**
     * 添加例句
     * @param $vocabulary 单词的id
     * @param $original 例句原文
     * @param $translation 例句的中文译文
     * @return mixed
     * @info 例句和译文的总长度不能超过255个字符，否则添加会失败。
     */
    public function createExample($vocabulary, $original, $translation)
    {
        return $this->call('POST', '/bdc/example/', [
            'vocabulary' => $vocabulary,
            'original' => $original,
            'translation' => $translation
        ]);
    }

    /**
     * 收藏例句
     * @param $example_id 例句的ID
     * @return mixed
     */
    public function favoritesExample($example_id)
    {
        return $this->call('POST', '/bdc/learning_example/', ['example_id' => $example_id]);
    }

    /**
     * 删除例句
     * @param $example_id 例句的ID
     * @return mixed
     */
    public function deleteExample($example_id)
    {
        return $this->call('DELETE', '/bdc/example/' . $example_id, ['example_id' => $example_id]);
    }

}