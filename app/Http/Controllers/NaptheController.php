<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Nick;
use App\Models\Gallery;
use App\Models\Thenap;
use Illuminate\Support\Facades\Auth;
class NaptheController extends Controller
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
            'title' => 'max:255',
            'category_id' => '',
            'status' => '',
            'description' => '',
            'price' => '',
            ],

            [
                
            ]
        );


        $users = User::find(Auth::user()->id); 
        if($users==null){

        }

        $card = Thenap::where('seri',$data['price'])->where('mathe',$data['title'])->where('status',0)-> first(); 
        if($card != null){
        $users->money = $card->menhgia + $users->money;
        $card -> status = 1;
        $card -> user_id = Auth::user()->id;
        $card -> save();
        $users->save();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        echo "<script>";
        echo "alert('Nap thành công thẻ mệnh giá'+ {{$card->menhgia}})";
        echo "</script>";
        return view('pages.home', compact('category','slider','blog_aboutus'));
    }

        // $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        // $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        // $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        echo "<script>";
        echo "alert('Thông tin thẻ cào không chính xác');";
        echo "</script>";
        return view('pages.napthe', compact('category','slider','blog_aboutus'));
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
