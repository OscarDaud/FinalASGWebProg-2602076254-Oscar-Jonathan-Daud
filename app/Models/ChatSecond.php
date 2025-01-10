<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatSecond extends Model
{
    protected $fillable = [
        'user1_id',
        'user2_id',
    ];

    public function user1(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function user2(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }
}
