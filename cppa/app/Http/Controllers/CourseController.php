<?php

namespace App\Http\Controllers;

use App\CoursePost;
use App\CourseRelation;
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

    public function editPost($id)
    {
        return view('admin.partials.course.post.edit',['id'=>$id]);
    }

    public function Posts()
    {
        return view('admin.partials.course.post.index');
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

    public function getPosts($page)
    {
        $limit=15;
        $all=CoursePost::count();
        $pages=ceil($all/$limit);
        $offset=$limit*$page;
        $data=CoursePost::limit($limit)->offset($offset)->get();
        $res=[];
        for($i=0; $i<$pages; $i++){
            $res[]=$i;
        }
        return response()->json(['courses'=>$data,'pages'=>$res]);
    }

    public function addCoursePost(Request $request)
    {
        $data = $request->all();
        if (!isset($data['test_id']))
            $data['test_id']=0;
        if (!isset($data['date_end']))
            $data['date_end']=date("Y-m-d H:i:s");
        $data = CoursePost::create($data);
        return response()->json($data);
    }

    public function updateCoursePost($id ,Request $request)
    {
        $data = $request->all();
        if ($data['test_id']=='')
            $data['test_id']=0;
        unset($data['updated_at']);
        $data=CoursePost::where('id',$id)->update($data);
        return response()->json($data);
    }

    public function getCoursePost($id)
    {
        $data = CoursePost::where('id',$id)->first();
        return response()->json($data);
    }

    public function getCoursePostGallery($id)
    {
        $data = CoursePost::where('id',$id)->first();
        return response()->json($data->getImageGallery());
    }

    public function getCourseP($id)
    {
        $issetP=CourseRelation::select('post_id')->where('course_id',$id)->get();
        $noselect=[];
        foreach ($issetP->toArray() as $item){
            $noselect[]=$item['post_id'];
        };
        $data=CoursePost::select('id','title')->whereNotIn('id', $noselect)->get();
        return response()->json($data);
    }

    public function getThisPosts($id)
    {
        $data = CourseRelation::select('post_id as id')->where('course_id',$id)->orderBy('order')->get();
        $data=$data->toArray();
        foreach ($data as $key=>$value){
            $data[$key]['title']=CoursePost::where('id',$value['id'])->first()->title;
        }
        return response()->json($data);
    }

    public function saveRelation($id,Request $request)
    {
        $data = $request->all();
        $res=[];
        foreach ($data as $key=>$value){
            $count = CourseRelation::where('course_id',$id)->where('post_id',$value['id'])->count();
            if ($count){
                CourseRelation::where('course_id',$id)->where('post_id',$value['id'])->update(['order'=>$key]);
                $res[$key]='update';
            }
            else{
//                return response()->json($value['id']);
                CourseRelation::create(['course_id'=>$id,'post_id'=>$value['id'],'order'=>$key]);
                $res[$key]='create';
            }
        }
        return response()->json($res);
    }

    public function removeRelation($id, Request $request)
    {
        $data= $request->all();
        $data = CourseRelation::where('course_id',$id)->where('post_id',$data['id'])->delete();
        return response()->json($data);
    }

    public function removeCoursePost($id)
    {
        $data = CoursePost::where('id',$id)->delete();
        $data = CourseRelation::where('post_id',$id)->delete();
        return response()->json($data);
    }

    public function getCourseList()
    {
        $data = Course::get();
        return response()->json($data);
    }
    
}
