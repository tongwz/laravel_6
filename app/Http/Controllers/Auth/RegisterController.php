<?php

namespace App\Http\Controllers\Auth;

use App\Http\Common\CommonFunc;
use App\Http\Common\CommonJson;
use App\Http\Controllers\Controller;
use App\Http\Model\UserModel;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Util\Json;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view("login/register");
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],[
            "username" => "twz用户名异常",
            "password" => "twz密码异常",
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return UserModel
     */
    protected function create(array $data)
    {
        $salt = CommonFunc::getUniqueId("");
        return UserModel::create([
            "username" => $data["username"],
            "password" => Hash::make($data["password"]. $salt),
            "salt" => $salt,
        ]);
    }

    /**
     * @notes: 注册
     * @param Request $request
     * @param UserModel $model
     * @return JsonResponse
     * @author tongwz
     * @date: 2022年12月21日13:28:09
     */
    public function createUser(Request $request, UserModel $model): JsonResponse
    {
        $data = $request->toArray();
        $this->validator($data);
        $info = $model->where(["username" => $data["username"]])->first();
        if ($info) {
            return CommonJson::jsonReturn(-1, "已存在相同数据！");
        }
        $re = $this->create($data);
        if ($re) {
            return CommonJson::jsonReturn(0, "操作完成！");
        } else {
            return CommonJson::jsonReturn(-1, "操作失败！");
        }
    }
}
