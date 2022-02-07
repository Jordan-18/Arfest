<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'url',
        'deskripsi',
        'date_execution',
        'status'
    ];

    public function pointevent()
    {
        return $this->hasMany(point::class,'point_id','id');
    }
    public function userevent()
    {
        return $this->hasMany(User::class,'user_id','id');
    }
}
