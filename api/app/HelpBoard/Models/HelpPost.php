<?php

namespace App\HelpBoard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpPost extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'type',
        'location',
        'status',
        'user_id'
    ];
}
