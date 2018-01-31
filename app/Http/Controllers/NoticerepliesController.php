<?php

namespace App\Http\Controllers;

use App\Models\Noticereply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticereplyRequest;
use Auth;

class NoticerepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function store(NoticereplyRequest $request, Noticereply $noticereply)
	{
		$noticereply->content = $request->content;
        $noticereply->user_id = Auth::id();
        $noticereply->notice_id = $request->notice_id;
        $noticereply->save();

		return redirect()->to($noticereply->notice->link())->with('message', '创建成功！');
	}

	public function destroy(Noticereply $noticereply)
	{
		$this->authorize('destroy', $noticereply);
		$noticereply->delete();

		return redirect()->to($noticereply->notice->link())->with('message', '删除成功！');
	}
}
