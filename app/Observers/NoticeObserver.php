<?php

namespace App\Observers;

use App\Models\Notice;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class NoticeObserver
{
    public function saving(Notice $notice)
    {
        $notice->body = clean($notice->body, 'user_notice_body');
        $notice->excerpt = make_excerpt($notice->body);
    }

    public function deleted(Notice $notice)
    {
        \DB::table('noticereplies')->where('notice_id', $notice->id)->delete();
    }
}
