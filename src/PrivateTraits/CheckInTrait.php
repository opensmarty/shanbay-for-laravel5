<?php
/**
 * Created by PhpStorm.
 * User: MrCong
 * Date: 2017/4/17
 * Time: 12:18
 */

namespace Cong5\Shanbay\PrivateTraits;


trait CheckInTrait
{

    /**
     * 抓取打卡记录
     * @param string $year
     * @param string $month
     * @return mixed
     */
    public function getLastCheckIn($year = '', $month = '')
    {
        if (empty(cache('shanbayCookie'))) {
            $this->login();
        }
        $checkInYear = !empty($year) ? $year : date('Y');
        $checkInMonth = !empty($month) ? $month : date('m');
        $uri = sprintf("/checkin/user/%s/?v=2&year=%s&month=%s&_=%s", $this->getUserId(), $checkInYear, $checkInMonth, $this->getTimestamp());
        return $this->call('GET', $uri);
    }


}