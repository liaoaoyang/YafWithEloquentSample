<?php
/**
 * Created by PhpStorm.
 * User: iay
 * Date: 17/7/31
 * Time: 下午5:00
 */

namespace not\ns\models\Test;

class Psr4test
{
    public static function sayMyName()
    {
        echo __METHOD__ . "\n";
    }
}