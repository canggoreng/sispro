<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;    
// --------------------
    protected $table = 'log';
    protected $guarded = [];

    protected $primaryKey = 'id_log';
// --------------------
     public function getfoto()
    {
        if(!$this->foto){
            return asset('public/foto_user/user-default.png');
        }
        return asset('public/foto_user/'.$this->foto);
    }
}
