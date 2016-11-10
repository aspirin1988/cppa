<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminUsersController extends Controller
{
    public function index()
    {
        return view('admin.partials.users.index');
    }

    public function getAll()
    {
        $data = User::get();
        for($i=0; $i<count($data); $i++){
            $data[$i]->user_group_data=$data[$i]->getUserGroup();
            $data[$i]->course_data=$data[$i]->getUserCourseData();
            for($j=0; $j<count($data[$i]->course_data); $j++){
                $data[$i]->course_data[$j]['data_course']=json_decode($data[$i]->course_data[$j]['data_course'],true);

            }
    }
        return response()->json($data);
    }

    public function activate($token)
    {
        $data=User::where('activate_token',$token)->first();
        if ($data) {
            $data=$data->update(['activate_token' => '', 'valid_email' => true]);
            if ($data){
                $attr=[
                    'title'=>'Спасибо за регистрацию !',
                    'message1'=>'Регистрация завершена !!!',
                    'message2'=>'Теперь Вы можете войти используя свой логин и пароль.',
                ];
                exit(view('auth.no_valid_email',$attr));
            }else{

            }
        }
        $attr=[
            'title'=>'Спасибо за регистрацию !',
            'message1'=>'Регистрация завершена !!!',
            'message2'=>'Теперь Вы можете войти используя свой логин и пароль.',
        ];
        exit(view('auth.no_valid_email',$attr));
    }

    public function save(Request $request)
    {
        $data=$request->all();
        unset($data['user_group_data']);
        unset($data['id']);
        return response()->json($data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getCourseData($id)
    {
        $data = User::where('id',$id)->first();
        return response()->json();
    }

    public function addCourse(Request $request)
    {
        $data = $request->all();
        $course = Course::where('id',$data['course'])->first();
        $course->posts = $course->getPosts();
        $course_data['user_id'] = $data['user'];
        $course_data['course_id'] = $data['course'];
        $course_data['date_end'] = date("Y-m-d H:i:s",time()+($course->duration*86400));
        $course_data['data_course']['title'] = $course->title;
        $course_data['data_course']['content'] = $course->content;
        foreach ($course->posts as $key=>$item){
            $item->data = $item->getPost();
            $course_data['data_course']['lessons'][$key]['id'] = $item->id;
            $course_data['data_course']['lessons'][$key]['title'] = $item->data->title;
            $course_data['data_course']['lessons'][$key]['open_date'] = time()+($key*86400);
            $course_data['data_course']['lessons'][$key]['open_date'] =date("Y-m-d", time()+($key*86400));
            $course_data['data_course']['lessons'][$key]['open'] = false;
            if ($item->data->test_id) {
                $course_data['data_course']['lessons'][$key]['test'] = $item->data->test_id;
            }
        }
        $course_data['data_course']= json_encode($course_data['data_course']);
        $data = UserData::create($course_data);
        return response()->json($data);
    }
}
