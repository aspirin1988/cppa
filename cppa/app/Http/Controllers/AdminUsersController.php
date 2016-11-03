<?php

namespace App\Http\Controllers;

use App\User;
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
}
