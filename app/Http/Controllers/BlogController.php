<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::orderBy('id','DESC')->paginate(5);
        return view('admin.blog.index' , compact('blog') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.blog.create' );
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
        // $data = $request->validate(
        //     [
        //     'title' => 'required|unique:categories|max:255',
        //     'slug' => 'required',
        //     'description'=>'required|max:255',

        //     'image'=> 'required|image|mines:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        //     'status' => 'required',
        //     ],

        //     [
        //         'title.unique' => 'Tên danh mục đã bị trùng xin chọn tên khác',
        //         'title.required' => 'Tên danh mục không được để trống',
        //         'image.required' => 'Hình ảnh không được để trống',
        //         'status.required' => 'Status không được để trống',
        //     ]
        // );
      
        $blog = new blog(); 
        $blog->title = $data['title'];
        $blog->slug  = $data['slug'];
        $blog->kind_of_blog  = $data['kindofblog'];
        $blog->description  = $data['description'];
        $blog->content  = $data['content'];

        $get_image = $request->image;
        $path = 'uploads/blog';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path, $new_image);

        $blog->image = $new_image;
       

        $blog->status = $data['status'];

        $blog->save();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
