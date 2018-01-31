<?php

namespace App\Models;

class Noticereply extends Model
{
    protected $fillable = ['content'];

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
