<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Nick;
use App\Models\Gallery;
use App\Models\Thenap;
use Illuminate\Support\Facades\Auth;
class ChuyenTienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = $request->validate(
            [
            'user_id' => 'max:255',
            'price' => 'numeric|min:0|not_in:0',
   
            ],

            [
                
            ]
        );


        $users = User::find(Auth::user()->id); 
        if($users!=null && $users->id != $data['user_id'] ){
            if($users->money >= $data['price']) {

            $usersnhan = User::where('id',$data['user_id'])-> first(); 
            if($usersnhan != null){
            $users->money =  $users->money - $data['price'];
            $users->save();
            $usersnhan->money = $usersnhan->money + $data['price'];
            $usersnhan->save();
            $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
            $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
            $category = Category::orderBy('id','DESC')->where('status',1)->get();
            return view('pages.home', compact('category','slider','blog_aboutus'));

            }
        }
   
    }

        // $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        // $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        // $category = Category::orderBy('id','DESC')->where('status',1)->get();
        echo "<script>";
        echo "alert('Thông tin người nhận không chính xác hoặc tài khoản không đủ tiền');";
        echo "</script>";
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.chuyentien', compact('category','slider','blog_aboutus'));
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
