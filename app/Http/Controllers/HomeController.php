<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class homeController extends Controller
{
    public function index(Request $request, Notice $notice)
	{
		$notices = $notice->withOrder($request->order)->paginate(10);
		return view('home.index', compact('notices'));
	}
}
