<?php

namespace App\Models;

class Notice extends Model
{
    protected $fillable = ['title', 'body', 'department_id', 'excerpt', 'slug'];

    public function noticereplies()
    {
        return $this->hasMany(Noticereply::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch($order) {
          case 'recentReplied':
              $query = $this->recentReplied();
              break;

          default:
              $query = $this->recent();
              break;
      }
        // 预加载防止 N+1 问题
        return $query->with('user', 'department');
    }

    public function scopeRecentReplied($query)
    {
      // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
      // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
      return $query->orderBy('sticky_post', 'desc')
                   ->orderBy('updated_at', 'desc');
    }

    public function scopeRecent($query)
    {
      return $query->orderBy('sticky_post', 'desc')
                   ->orderBy('created_at', 'desc');
    }

    public function link($params = [])
    {
        return route('notices.show', array_merge([$this->id, $this->slug],$params));
    }
}
