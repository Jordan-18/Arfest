<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class competition extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'id_user',
        'id_point',
        'Nama',
        'url',
        'Desk'
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
