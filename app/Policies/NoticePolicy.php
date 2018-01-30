<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notice;

class NoticePolicy extends Policy
{
    public function update(User $user, Notice $notice)
    {
        return $notice->user_id == $user->id;
    }

    public function destroy(User $user, Notice $notice)
    {
        return true;
    }
}
