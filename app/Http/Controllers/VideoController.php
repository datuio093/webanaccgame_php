<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::orderBy('id','DESC')->paginate(5);
        return view('admin.video.index', compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
         $data = $request->all(); 
        $video = new Video(); 
        $video->title = $data['title'];
        $video->slug  = $data['slug'];
        $video->link  = $data['link'];
        $video->description  = $data['description'];
    

        $get_image = $request->image;
        $path = 'uploads/video';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path, $new_image);

        $video->image = $new_image;
       

        $video->status = $data['status'];

        $video->save();
        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin.video.edit' , compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();    
      

        $video = Video::find($id); 

        $video->title = $data['title'];
        $video->slug = $data['slug'];
        $video->description  = $data['description'];
        $video->status = $data['status'];
        $video->link = $data['link'];
        $get_image = $request->image;
        if($get_image) {
        $path_unlink = 'uploads/video/'.$video->image;   // bỏ hình ảnh cũ
        if(file_exists($path_unlink)) {
            unlink($path_unlink);
        }

        // thêm ảnh mới
        $path = 'uploads/video/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path, $new_image);
        $video->image = $new_image;
    }

        $video->save();
        return redirect()->back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id); 
      
        $path_unlink = 'uploads/video/' .$video->image;   // bỏ hình ảnh cũ
        if(file_exists($path_unlink)) {
            unlink($path_unlink);
        }

        $video->delete();
        return redirect()->back(); 
    }
}
