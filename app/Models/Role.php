<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    //  public function user()
    // {
    //     return $this->belongsTo(RoleUser::class);
    // }

     public function user()
    {
        return $this->hasMany(User::class);
    }
}
