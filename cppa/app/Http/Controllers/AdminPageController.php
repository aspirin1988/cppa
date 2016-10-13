<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Page;

use App\Http\Requests;

class AdminPageController extends Controller
{
    public function index()
    {
        return view('admin.partials.pages.index');
    }

    public function getPages()
    {
        return response()->json(Page::get());
    }

    public function addPage()
    {
        $data=Page::create(['title'=>'','slug'=>'']);
        return redirect('/admin/page/edit/' . $data->id);
    }

    public function editPage($id)
    {
        $data=Page::where('id',$id)->first();
        return view('admin.partials.page.edit',['data'=>$data]);
    }
}
