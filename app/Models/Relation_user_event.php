<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation_user_event extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'user_id',
        'point_id',
        'event_id',
    ];

    public function userjoin()
    {   
        return $this->hasOne(User::class,'id','user_id');
    }

    public function pointuser()
    {
        
    }
}
