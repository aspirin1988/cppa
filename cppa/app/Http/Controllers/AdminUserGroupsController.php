<?php

namespace App\Http\Controllers;

use App\UserGroup;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUserGroupsController extends Controller
{
    public function index()
    {
        return view('admin.partials.user_groups.index');
    }

    public function getAll()
    {
        $data = UserGroup::get();
        return response()->json($data);
    }

    public function add(Request $request)
    {
        $data = $request->all();
        $data = UserGroup::create($data);
        return response()->json($data);
    }
}
