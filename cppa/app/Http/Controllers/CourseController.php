<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('admin.partials.course.index');
    }

    public function edit($id)
    {
        return view('admin.partials.course.edit',['id'=>$id]);
    }

    public function getCourse($id)
    {
        $data=Course::where('id',$id)->first();
        return response()->json($data);
    }

    public function getCourses($page)
    {
        $limit=15;
        $all=Course::count();
        $pages=ceil($all/$limit);
        $offset=$limit*$page;
        $data=Course::limit($limit)->offset($offset)->get();
        $res=[];
        for($i=0; $i<$pages; $i++){
            $res[]=$i;
        }
        return response()->json(['courses'=>$data,'pages'=>$res]);
    }

    public function addCourses(Request $request)
    {
        $data=$request->all();
        $data = Course::create($data);
        return response()->json($data);
    }

    public function saveCourses($id,Request $request)
    {
            $data=$request->all();
        unset($data['id']);
        unset($data['updated_at']);
        $data=Course::where('id',$id)->update($data);
        return response()->json($data);
    }
    
}
