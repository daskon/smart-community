<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'price',
        'description',
        'image'
    ];

    public function user ()
    {
        $this->belongsTo(User::class);
    }

    public function chatMessages ()
    {
        $this->hasMany(ChatMessage::class);
    }
}
