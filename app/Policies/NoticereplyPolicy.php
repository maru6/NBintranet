<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Noticereply;

class NoticereplyPolicy extends Policy
{
    public function destroy(User $user, Noticereply $noticereply)
    {
        return $user->isAuthorOf($noticereply) || $user->isAuthorOf($noticereply->notice);
    }
}
