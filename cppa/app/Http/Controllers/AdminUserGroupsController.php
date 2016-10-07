<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUserGroupsController extends Controller
{
    public function index()
    {
        return view('admin.partials.user_groups.index');
    }
}
