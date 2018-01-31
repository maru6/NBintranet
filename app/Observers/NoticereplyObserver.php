<?php

namespace App\Observers;

use App\Models\Noticereply;
use App\Notifications\Noticereplied;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class NoticereplyObserver
{
    public function created(Noticereply $noticereply)
    {
        $notice = $noticereply->notice;
        $notice->increment('reply_count', 1);

        if( ! $noticereply->user->isAuthorOf($notice)) {
            $notice->user->notify(new NoticeReplied($noticereply));
        }
    }

    public function creating(Noticereply $noticereply)
    {
        $noticereply->content = clean($noticereply->content, 'user_notice_body');
    }

    public function deleted(Noticereply $noticereply)
    {
        $noticereply->topic->decrement('reply_count', 1);
    }

}
