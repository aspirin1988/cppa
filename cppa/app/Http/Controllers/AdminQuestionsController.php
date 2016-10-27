<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminQuestionsController extends Controller
{
    public function index()
    {
        return view('admin.partials.question.index');
    }
}
