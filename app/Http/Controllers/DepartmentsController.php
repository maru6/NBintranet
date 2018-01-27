<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Department;

class DepartmentsController extends Controller
{
    public function show(Department $department)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $notices = Notice::where('Department_id', $department->id)->paginate(20);
        // 传参变量话题和分类到模板中
        return view('notices.index', compact('notices', 'department'));
    }
}
