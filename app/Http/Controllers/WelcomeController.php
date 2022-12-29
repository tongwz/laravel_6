<?php
/**
 * User: tongWZ
 * Date: 2022/12/21
 * Time: 17:40
 */
namespace App\Http\Controllers;

use Tongwz\Composers\DoIt;

class WelcomeController extends Controller
{
    public function index()
    {
        view("welcome");
    }

    public function showDo()
    {
        $do = new DoIt();
        $do->get();
    }

    public function myEcho()
    {
        echo DoIt::name();
    }
}
