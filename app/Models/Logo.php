<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
// --------------------
    protected $table = 'logo';
    protected $guarded = [];

    protected $primaryKey = 'id';
// --------------------
public function getlogo()
{
    if(!$this->logo){
        return asset('public/files/bg-psit.png');
    }
    return asset('public/files/'.$this->logo);
}
// --------------------
}
