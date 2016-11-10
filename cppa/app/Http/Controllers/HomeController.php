<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function CoursesArchive()
    {
        $meta = ["meta_title"=>"Список курсов",
	    "meta_description"=>"На данной странице представлен список курсов проводимых CPPA"];
        $meta = json_encode($meta);
        $meta = json_decode($meta);
        return view('site.pages.course_archive',['meta_data'=>$meta]);
    }
}
