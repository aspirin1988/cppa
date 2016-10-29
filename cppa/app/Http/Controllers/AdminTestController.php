<?php

namespace App\Http\Controllers;

use App\QuestionRelation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Question;
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

        $question=QuestionRelation::select('question_id')->where('test_id',$id)->get();
        $select=[];
        foreach ($question->toArray() as $item){
            $select[]=$item['question_id'];
            $question=Question::select('id','name')->whereIn('id', $select)->get();
        };
        return response()->json(['data'=>$data,'question'=>$question]);
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

    public function save($id,Request $request)
    {
        $data=$request->all();
        unset($data['id']);
        unset($data['updated_at']);
        $data=Test::where('id',$id)->update($data);
        return response()->json($data);
    }

    public function removeQuestion($id, Request $request)
    {
        $data=$request->all();
        $data = QuestionRelation::where('test_id',$id)->where('question_id',$data['question_id'])->delete();
        return response()->json($data);
    }

    public function addQuestion($id, Request $request)
    {
        $data=$request->all();
        $data['test_id']=$id;
        $data = $data = QuestionRelation::create($data);
        return response()->json($data);
    }

    public function testInit ($id)
    {
        $data = QuestionRelation::select('question_id')->where('test_id',$id)->orderByRaw("RAND()")->limit(2)->get();
        return response()->json($data);
    }


}
