<?php

namespace App\Http\Controllers;

use App\Models\Noticereply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticereplyRequest;

class NoticerepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function store(ReplyRequest $request, Reply $reply)
	{
		// $reply->content = $request->content;
        // $reply->user_id = Auth::id();
        // $reply->notice_id = $request->notice_id;
        // $reply->save();
        //
		// return redirect()->to($reply->notice->link())->with('message', '创建成功！');
	}

	public function destroy(Reply $reply)
	{
		// $this->authorize('destroy', $reply);
		// $reply->delete();
        //
		// return redirect()->to($reply->notice->link())->with('message', '删除成功！');
	}
}
