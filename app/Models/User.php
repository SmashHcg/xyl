<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account',  'password', 'avatar', 'name','college','class',
        'gra_year','ero_year','phone','email','age','gender',
        'city','profession',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];
    //指明一个用户拥有多条微博
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
    //将当前用户发布过的所有微博从数据库中取出，并根据创建时间来倒序排序。在后面我们为用户增加关注人的功能之后，将使用该方法来获取当前用户关注的人发布过的所有微博动态
    public function feed()
    {
        return $this->statuses()
                    ->orderBy('created_at', 'desc');
    }
}
