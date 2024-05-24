<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'status',
        'user_id',
        'room_id',
        'parent_id'
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function chatRooms(): MorphToMany
    {
        return $this->morphedByMany(ChatRoom::class, 'commentable');
    }
}