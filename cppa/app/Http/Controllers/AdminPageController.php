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

    public function edit($id)
    {
        return view('admin.partials.pages.edit',['id'=>$id]);
    }

    public function update($id, Request $request)
    {
        $data=$request->all();
        unset($data['id']);

        return response()->json(Page::where('id',$id)->update($data));
    }

    public function remove($id)
    {
        return response()->json(Page::where('id',$id)->delete());
    }

    public function addImage($id,Request $request)
    {
        $data=$request->all();
        $page=Page::where('id',$id)->first();
        return response()->json($page->addImage($data));
    }

    public function getPages()
    {
        return response()->json(Page::select('id','title','slug')->get());
    }

    public function getPage($id)
    {
        return response()->json(Page::where('id',$id)->first());
    }

    public function newPage()
    {
        return view('admin.partials.pages.new');
    }

    public function IssetPage(Request $request)
    {
        $data=$request->all();
        Page::where('slug',$data['slug'])->count();
        return response()->json(['res'=>(Page::where('slug',$data['slug'])->count()>0? true:false)]);
    }

    public function addPage(Request $request)
    {
        $data = $request->all();
        $data['date_end']=date('Y-m-d H:i:s');
        $data=Page::create($data);
        return response()->json($data); //redirect('/admin/page/edit/' . $data->id);
    }

    public function editPage($id)
    {
        $data=Page::where('id',$id)->first();
        return view('admin.partials.page.edit',['data'=>$data]);
    }
}
