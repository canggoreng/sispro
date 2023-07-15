<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
// --------------------
    protected $table = 'gallery';
    protected $guarded = [];

    protected $primaryKey = 'id_gallery';
// --------------------
public function getimage()
{
    if(!$this->image){
        return asset('public/gallery/image.png');
    }
    return asset('public/gallery/'.$this->image);
}
// --------------------
}
