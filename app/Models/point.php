<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'user_id',
        'jarak',
        'jenis_busur',
        'rambahan',
        'jumAP',
        'total'
    ];
    public function userpoint(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
