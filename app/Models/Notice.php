<?php

namespace App\Models;

class Notice extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'department_id', 'reply_count', 'view_count', 'last_reply_user_id', 'order', 'excerpt', 'slug'];
}
