<?php
/**
 * User: tongWZ
 * Date: 2022/12/29
 * Time: 10:24
 */
namespace Tongwz\Composers;

class DoIt
{
    protected $name = "tongWz";
    public static function name()
    {
        echo "My name is tongWz";
    }

    public function get()
    {
        echo $this->name;
    }
    
    public function set($name = "")
    {
        $this->name = $name;
    }
}