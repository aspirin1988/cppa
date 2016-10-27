<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Test;
use Illuminate\Support\Facades\Auth;

class AdminTestController extends Controller
{
    public function index()
    {
        return view('admin.partials.test.index');
    }

    public function addTest(Request $request)
    {
        $data=$request->all();
        $data['user']=Auth::user()->id;
        $data=Test::create($data);
        return response()->json($data);
    }

    public function get($id)
    {
        $data=Test::where('id',$id)->first();
        return response()->json($data);
    }

    public function edit($id)
    {
        return view('admin.partials.test.edit',['id'=>$id]);
    }

    public function getTestPage($page)
    {
        $limit=15;
        $all=Test::count();
        $pages=ceil($all/$limit);
        $offset=$limit*$page;
        $data=Test::limit($limit)->offset($offset)->get();
        $res=[];
        for($i=0; $i<$pages; $i++){
            $res[]=$i;
        }
        return response()->json(['tests'=>$data,'pages'=>$res]);
    }
}
