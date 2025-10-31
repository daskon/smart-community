<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhoods extends Model
{
    /** @use HasFactory<\Database\Factories\NeighborhoodsFactory> */
    use HasFactory;

    protected $fillable = ['name','code'];

    public function user ()
    {
        $this->hasMany(User::class);
    }
}
