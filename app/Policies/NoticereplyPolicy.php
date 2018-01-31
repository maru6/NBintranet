<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Noticereply;

class NoticereplyPolicy extends Policy
{
    public function update(User $user, Noticereply $noticereply)
    {
        // return $noticereply->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Noticereply $noticereply)
    {
        return true;
    }
}
