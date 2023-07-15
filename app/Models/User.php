<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'address',
    //     'phone',
    //     'password',
    //     'role',
    //     'blokir',
    // ];

    protected $table = 'users';
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //  public function getfoto()
    // {
    //     if(!$this->foto){
    //         return asset('public/foto_user/user-default.png');
    //     }
    //     return asset('public/foto_user/'.$this->foto);
    // }

public function getfoto()
{
    if (!$this->foto || !file_exists(public_path('foto_user/' . $this->foto))) {
        $defaultImageUrl = $this->foto;
        return $defaultImageUrl;
    } else {
        return asset('public/foto_user/' . $this->foto);
    }
}


}
