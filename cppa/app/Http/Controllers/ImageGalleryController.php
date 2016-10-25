<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use Illuminate\Http\Request;
use App\Http\Requests;

class ImageGalleryController extends Controller
{
    public function index()
    {
        return view('admin.partials.gallery.index');
    }

    public function getPage($page)
    {
        $limit=15;
        $all=ImageGallery::count();
        $pages=ceil($all/$limit);
        $offset=$limit*$pages;
        $data=ImageGallery::offset($offset)->limit($limit)->get();
        $res=[];
        for($i=0; $i<$pages; $i++){
            $res[]=$i;
        }
        return response()->json(['images'=>$data,'pages'=>$res]);
    }

    public function UploadImage(Request $request)
    {


        $data=$request->all();
//        print_r($data->getClientOriginalName());
//        print_r($file[0]);
//        $data=request()->file('file');
        print_r($data);
//        if (isset($file['file']))
//        {
//            $file=$file['file'];
//        }
//        return response()->json([$file,$data,$request->file('files'),$file->getClientOriginalName()]);
    }
}
