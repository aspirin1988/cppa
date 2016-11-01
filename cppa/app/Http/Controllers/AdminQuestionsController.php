<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionCategory;
use App\QuestionRelation;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminQuestionsController extends Controller
{
    public function index()
    {
        return view('admin.partials.question.index');
    }

    public function category()
    {
        return view('admin.partials.question.category');
    }

    public function edit($id)
    {
        return view('admin.partials.question.edit',['id'=>$id]);
    }

    public function getTestQ($id)
    {
        $issetQ=QuestionRelation::select('question_id')->where('test_id',$id)->get();
        $noselect=[];
        foreach ($issetQ->toArray() as $item){
            $noselect[]=$item['question_id'];
        };
        $data=Question::select('id','name')->whereNotIn('id', $noselect)->get();
        return response()->json($data);
    }

    public function get($id)
    {
        $data = Question::where('id',$id)->first();
        $data['answer']=json_decode($data['answer']);
        return response()->json($data);
    }

    public function getCategory()
    {
       $data= QuestionCategory::get();
        return response()->json($data);
    }

    public function getPage($page)
    {
        $limit=15;
        $all=Question::count();
        $pages=ceil($all/$limit);
        $offset=$limit*$page;
        $data=Question::limit($limit)->offset($offset)->get();
        $res=[];
        for($i=0; $i<$pages; $i++){
            $res[]=$i;
        }
        return response()->json(['question'=>$data,'pages'=>$res]);
    }

    public function addQuestion(Request $request)
    {
        $data=$request->all();
        $data['answer']=json_encode($data['answer']);
        $data=Question::create($data);
        return response()->json($data);
    }

    public function addCategory(Request $request)
    {
        $data=$request->all();
        $data = QuestionCategory::create($data);
        return response()->json($data);
    }

    public function updateQuestion($id, Request $request)
    {
        $data=$request->all();
        unset($data['updated_at']);
        unset($data['id']);
        $data['answer']=json_encode($data['answer']);
        $data=Question::where('id',$id)->update($data);
        return response()->json($data);
    }

    public function remove($id)
    {
        $data = Question::where('id',$id)->delete();
        return response()->json($data);

    }
}
