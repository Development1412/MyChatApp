<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ChatRoom extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(ChatRoomUser::class);
    }

    public function messages(): MorphToMany
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }

    public function lastMessage()
    {
        return $this->morphToMany(Comment::class, 'commentable')->latest()->take(1);
    }
}
