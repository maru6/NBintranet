<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;
use auth;

class TopicPolicy extends Policy
{
    public function store(User $user, Topic $topic)
    {
        return Auth::user()->is_admin && $user->isAuthorOf($topic);
    }

    public function update(User $user, Topic $topic)
    {
        return Auth::user()->is_admin || $user->isAuthorOf($topic);
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }
}
