<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionRelation;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminQuestionsController extends Controller
{
    public function index()
    {
        return view('admin.partials.question.index');
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
}
