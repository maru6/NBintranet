<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Notice;

class NoticePolicy extends Policy
{
    public function update(User $user, Notice $notice)
    {
       return $user->isAuthorOf($notice);
    }

    public function destroy(User $user, Notice $notice)
    {
       return $user->isAuthorOf($notice);
    }
}
