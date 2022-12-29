<?php
/**
 * User: tongWZ
 * Date: 2022/12/21
 * Time: 10:31
 */
namespace App\Http\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

/** 这里继承Illuminate\Foundation\Auth\User 才能进行框架内部用户验证与自己设计表格相配合 */
class UserModel extends Authenticatable
{
    protected $table = "user";
    protected $fillable = [
        'username', 'password', 'salt', 'is_delete'
    ];
    protected $hidden = ['password'];
}
