<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.side');
    }

    public function index()
    {

        return view('admin.partials.index');
    }
}
