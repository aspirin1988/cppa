<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminUsersController extends Controller
{
    public function index()
    {
        return view('admin.partials.users.index');
    }

    public function getAll()
    {
        return response()->json(User::get());
    }
}
