<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

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
        $offset=$limit*$page;
        $data=ImageGallery::limit($limit)->offset($offset)->get();
        $res=[];
        for($i=0; $i<$pages; $i++){
            $res[]=$i;
        }
        return response()->json(['images'=>$data,'pages'=>$res]);
    }

    public function UploadImage($id,$to,Request $request)
    {
        $plural=false;
        $data=$request->all();
        if (isset($data['file'])) {
            $plural = false;
            $data=$data['file'][0];
        }
        else {
            if ($data['files']) {
                $plural = true;
                $data=$data['files'];
            }
        }
        $res=false;
        if ($plural){
            foreach ($data as $item)  {
                $res[]=($this->uploadPrivate($id, $to, $item)? true : false);
            }
        }
        else{
            $res[]=($this->uploadPrivate($id, $to, $data)? true : false);
        }
        return response()->json($res);
    }

    public function remove($id)
    {
        $data=ImageGallery::where('id',$id)->first();
        $count=ImageGallery::where('url',$data->url)->count();
        if ($count==1){
            $res['file1']=Storage::disk('uploads')->delete($data->path);
            $res['file2']=Storage::disk('uploads')->delete($data->path_small);
            $res['file3']=Storage::disk('uploads')->delete($data->path_middle);
        }
        $res['result']=ImageGallery::where('id',$id)->delete();
        return response()->json(['res'=>$res,'count'=>$count]);
    }

    public function edit($id, Request $request)
    {
        $data=$request->all();
        unset($data['id']);
        $res=ImageGallery::where('id',$id)->update($data);
        return response()->json($res);
    }

    function uploadPrivate($id, $to, $file) {
        $fileName = $file->getClientOriginalName();
        $filePath = '/sitefiles/'. $to .'/'. $id . '/' . $fileName;
        Storage::disk('uploads')->put($filePath, file_get_contents($file->getRealPath()));
        $filePathThumbnail1 = '/sitefiles/thumbnail/'. $to .'/'. $id . '/' . 'thumbnail-'.$fileName;
        $filePathThumbnail2 = '/sitefiles/thumbnail/'. $to .'/'. $id . '/150x150thumbnail-'.$fileName;
        $manager = new ImageManager(array('driver' => 'imagick'));
        $thumbnail1 =$manager->make($file->getRealPath());
        $thumbnail2 =$manager->make($file->getRealPath());

        $with=$thumbnail1->width();
        $height=$thumbnail1->height();
        if ($with<$height){
            $_whit=ceil($with/300);
            $with=300;
            $height=ceil($height/$_whit);
            $filePathThumbnail1 = '/sitefiles/thumbnail/'. $to .'/'. $id . '/'.$with.'x'.$height . 'thumbnail-'.$fileName;
        }
        else{
            $_height=ceil($height/300);
            $height=300;
            $with=ceil($with/$_height);
            $filePathThumbnail1 = '/sitefiles/thumbnail/'. $to .'/'. $id . '/' .$with.'x'.$height . 'thumbnail-'.$fileName;
        }
        $thumbnail1->resize($with, $height);
        $thumbnail1->save($file->getRealPath());
        Storage::disk('uploads')->put($filePathThumbnail1,file_get_contents($file->getRealPath()));

        $thumbnail2->resize(150, 150);
        $thumbnail2->save($file->getRealPath());
        Storage::disk('uploads')->put($filePathThumbnail2,file_get_contents($file->getRealPath()));
        $user=Auth::user()->id;
        $returnID = ImageGallery::create([
            'parent_id' => $id,
            'parent_type' => $to,
            'path'=>$filePath,
            'path_middle'=>$filePathThumbnail1,
            'path_small'=>$filePathThumbnail2,
            'url' => '/uploads' . $filePath,
            'url_middle' => '/uploads' .$filePathThumbnail1,
            'url_small' => '/uploads' .$filePathThumbnail2,
            'user_upload' => $user,
            'title' => '',
            'alt' => '',
            'description' => '',
            'visible' => false,
        ]);

        return $returnID;
    }
}


