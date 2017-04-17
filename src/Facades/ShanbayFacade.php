<?php

/**
 * Created by PhpStorm.
 * User: MrCong <i@cong5.net>
 * Date: 2017/3/1
 * Time: 9:27
 */
namespace Cong5\Shanbay\Facades;



use Illuminate\Support\Facades\Facade;

class ShanbayFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'shanbay';
    }

}