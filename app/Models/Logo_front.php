<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo_front extends Model
{
    use HasFactory;
// --------------------
    protected $table = 'logo_front';
    protected $guarded = [];

    protected $primaryKey = 'id';
// --------------------
public function getlogo()
{
    if(!$this->logo){
        return asset('public/files/logo.png');
    }
    return asset('public/files/'.$this->logo);
}
// --------------------
}
