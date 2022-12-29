<?php
/**
 * User: tongWZ
 * Date: 2022/12/21
 * Time: 11:03
 */
namespace App\Http\Common;

class CommonFunc
{
    /**
     * @notes: 生产一个唯一值
     * @param string $string
     * @return false|string
     * @author tongwz
     * @date: 2022年12月21日11:06:28
     */
    public static function getUniqueId(string $string)
    {
        return substr(md5(uniqid($string). time()), 0, 16);
    }
}
