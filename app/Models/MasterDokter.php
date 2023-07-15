<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterDokter extends Model
{
    use HasFactory;    
// --------------------
    protected $table = 'master_dokter';
    protected $guarded = [];

    protected $primaryKey = 'id_dokter';
// --------------------

}
