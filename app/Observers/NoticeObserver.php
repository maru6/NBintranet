<?php

namespace App\Observers;

use App\Models\Notice;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class NoticeObserver
{
    public function saving(Notice $notice)
    {
        $notice->excerpt = make_excerpt($notice->body);
    }

}
