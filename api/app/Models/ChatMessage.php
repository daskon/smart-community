<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    /** @use HasFactory<\Database\Factories\ChatMessageFactory> */
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'sender_id',
        'receiver_id',
        'message',
    ];

    public function listing ()
    {
        $this->belongsTo(Listing::class);
    }
}
