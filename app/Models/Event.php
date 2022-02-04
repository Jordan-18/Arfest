<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id_user',
        'id_point',
        'Nama',
        'url',
        'desk',
        'date_execution',
        'status'
    ];

    public function PointCompetition()
    {
        return $this->hasMany(point::class,'point_id','id');
    }
    public function UserCompetition()
    {
        return $this->hasMany(User::class,'user_id','id');
    }
}
