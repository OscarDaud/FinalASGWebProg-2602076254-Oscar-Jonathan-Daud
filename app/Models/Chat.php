<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    protected $fillable = [
        'chat_room_id',
        'user_id',
        'content',
        'default'
    ];

    public function chat_room(): BelongsTo
    {
        return $this->belongsTo(ChatSecond::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
