<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Noticereply;

class NoticeReplied extends Notification
{
    use Queueable;

    public $noticereply;

    public function __construct(Noticereply $noticereply)
    {
        // 注入回复实体，方便 toDatabase 方法中的使用
        $this->noticereply = $noticereply;
    }

    public function via($notifiable)
    {
        // 开启通知的频道
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        $notice = $this->noticereply->notice;
        $link =  $notice->link(['#noticereply' . $this->noticereply->id]);

        // 存入数据库里的数据
        return [
            'noticereply_id' => $this->noticereply->id,
            'noticereply_content' => $this->noticereply->content,
            'user_id' => $this->noticereply->user->id,
            'user_name' => $this->noticereply->user->name,
            'user_avatar' => $this->noticereply->user->avatar,
            'notice_link' => $link,
            'notice_id' => $notice->id,
            'notice_title' => $notice->title,
        ];
    }
}
