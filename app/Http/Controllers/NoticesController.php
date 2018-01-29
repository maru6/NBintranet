<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Department;
use Auth;
use App\Handlers\ImageUploadHandler;

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
        $departments = department::all();
		return view('notices.create_and_edit', compact('notice', 'departments'));
	}

	public function store(NoticeRequest $request, Notice $notice)
	{
		$notice->fill($request->all());
        $notice->user_id = Auth::id();
        $notice->save();
		return redirect()->route('notices.show', $notice->id)->with('message', '成功创建公告！');
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

		return redirect()->route('notices.show', $notice->id)->with('message', '更新成功！');
	}

	public function destroy(Notice $notice)
	{
		$this->authorize('destroy', $notice);
		$notice->delete();

		return redirect()->route('notices.index')->with('message', '成功删除！');
	}

        public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'notices', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }
}
