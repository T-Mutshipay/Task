<?php

namespace App\Models;
use app\Models\User;
use Illuminate\Database\Eloquent\Model;
 
class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}