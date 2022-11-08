<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id','DESC')->paginate(5);
        return view('admin.category.index' , compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
      
        $category = new Category(); 
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description  = $data['description'];

        $get_image = $request->image;
        $path = 'uploads/category';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path, $new_image);

        $category->image = $new_image;
       

        $category->status = $data['status'];

        $category->save();
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
        $category = Category::find($id);
        return view('admin.category.edit' , compact('category'));
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
        $category = Category::find($id); 
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->description  = $data['description'];
        $category->status = $data['status'];
        $get_image = $request->image;
        if($get_image) {
        $path_unlink = 'uploads/category/' .$category->image;   // bỏ hình ảnh cũ
        if(file_exists($path_unlink)) {
            unlink($path_unlink);
        }

        // thêm ảnh mới
        $path = 'uploads/category/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path, $new_image);
        $category->image = $new_image;
    }

        $category->save();
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
      
        $category = Category::find($id); 
      
        $path_unlink = 'uploads/category/' .$category->image;   // bỏ hình ảnh cũ
        if(file_exists($path_unlink)) {
            unlink($path_unlink);
        }

        $category->delete();
        return redirect()->back(); 
    }
}

