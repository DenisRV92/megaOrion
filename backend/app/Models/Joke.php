<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Joke extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'joke', 'user_id', 'updated_at', 'created_at'
    ];

    public function author()
    {
        return $this->hasMany(User::class,'id', 'user_id');
    }
}
