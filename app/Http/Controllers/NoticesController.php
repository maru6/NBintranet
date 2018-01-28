<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;

class NoticesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request, Notice $notice)
	{
		$notices = $notice->withOrder($request->order)->paginate(15);
		return view('notices.index', compact('notices'));
	}

    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

	public function create(Notice $notice)
	{
		return view('notices.create_and_edit', compact('notice'));
	}

	public function store(NoticeRequest $request)
	{
		$notice = Notice::create($request->all());
		return redirect()->route('notices.show', $notice->id)->with('message', 'Created successfully.');
	}

	public function edit(Notice $notice)
	{
        $this->authorize('update', $notice);
		return view('notices.create_and_edit', compact('notice'));
	}

	public function update(NoticeRequest $request, Notice $notice)
	{
		$this->authorize('update', $notice);
		$notice->update($request->all());

		return redirect()->route('notices.show', $notice->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Notice $notice)
	{
		$this->authorize('destroy', $notice);
		$notice->delete();

		return redirect()->route('notices.index')->with('message', 'Deleted successfully.');
	}
}
