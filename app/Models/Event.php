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
        'user_id',
        'url',
        'deskripsi',
        'date_execution',
        'status'
    ];

    public function userevent()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
