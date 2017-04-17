<?php
/**
 * Created by PhpStorm.
 * User: MrCong <i@cong5.net>
 * Date: 2017/3/1
 * Time: 9:42
 */

namespace Cong5\Shanbay\Traits;


trait NoteTrait
{

    /**
     * 获取笔记
     * @param $vocabulary_id 要获取笔记的单词id
     * @return mixed
     */
    public function getNote($vocabulary_id)
    {
        return $this->call('GET', '/bdc/note/', ['vocabulary_id' => $vocabulary_id]);
    }

    /**
     * 创建笔记
     * @param $vocabulary 要创建笔记的单词id
     * @param $note 笔记内容
     * @return mixed
     */
    public function createNote($vocabulary, $note)
    {
        return $this->call('POST', '/bdc/note/', ['vocabulary' => $vocabulary, 'note' => $note]);
    }

    /**
     * 收藏笔记
     * @param $note_id 笔记id
     * @return mixed
     */
    public function favoritesNote($note_id)
    {
        return $this->call('POST', '/bdc/learning_note/', ['note_id' => $note_id]);
    }

    /**
     * 删除笔记
     * @param $note_id 笔记id
     * @return mixed
     */
    public function deleteNote($note_id)
    {
        return $this->call('DELETE', '/bdc/note/' . $note_id);
    }

}