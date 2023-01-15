<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Video;
use App\Models\Nick;
use App\Models\Gallery;
use App\Models\Thenap;
class IndexController extends Controller
{
    public function home(){
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
     
        return view('pages.home', compact('category','slider','blog_aboutus'));
    }
    public function homepage(){
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
     
        return view('pages.home', compact('category','slider','blog_aboutus'));
    }
    public function dich_vu(){
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.services',compact('slider','blog_aboutus'));
    }
    public function dich_vu_con($slug){
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.sub_services' , compact('slug','slider','blog_aboutus'));
    }
    public function danh_muc($slug){
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.category', compact('slug','slider','blog_aboutus') );
    }
    public function danh_muc_con($slug){    /// bam trang home -> danh muc con
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
 
        $category = Category::where('slug', $slug ) -> first();
        $nicks_count = Nick::where('category_id',$category->id )->where('status',1)->count() ;

        return view('pages.category' , compact('slug','slider','blog_aboutus','category','nicks_count') );
    }
    
    public function danh_muc_game($slug){  /// bam trang danh muc con -> chi tiet acc game
        $category = Category::where('slug',$slug )->first();
        $nicks = Nick::where('category_id',$category->id )->where('status',1)->paginate(4) ;
        
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.sub_category' , compact('slug','slider','blog_aboutus', 'nicks','category') );
    }

    public function accgame($ms){  /// chi tiet acc

      

         $nicks = Nick::where('ms',$ms )->first();
         $category = Category::where('id',$nicks->category_id)->first();

         $category_dt = Category::where('slug',$category->slug )->first();
         $nicks_dt = Nick::where('category_id',$category_dt->id )->where('id', '!=' ,$nicks->id)->where('status',1)->paginate(8) ;

         $gallery = Gallery::where('nick_id',$nicks->id)->get();

        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.detailaccgame' , compact('slider','blog_aboutus', 'nicks','category','gallery','nicks_dt') );
    }

    public function video_highlight(){
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $video = Video::orderBy('id','DESC')->where('status',1)->paginate(10);
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.video' , compact('slider','video','blog_aboutus') );
    }

    public function show_video(Request $request){
        $data = $request->all(); 
        
        $video = Video::find($data['id']);
        $output['video_title'] = $video->title;
        $output['video_description'] = $video->description;
        $output['video_link'] = $video->link;

        echo json_encode($output);

    }

    public function blogs(){
        $blog_tingame = Blog::orderBy('id','DESC')->where('kind_of_blog','blogs')->where('status',1)->paginate(10);
        $blog_huongdan = Blog::orderBy('id','DESC')->where('kind_of_blog','huongdan')->where('status',1)->paginate(10);
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $blog = Blog::orderBy('id','DESC')->where('kind_of_blog','blogs')->orwhere('kind_of_blog','huongdan')->where('status',1)->paginate(10);
        return view('pages.blog' ,compact('slider','blog','blog_aboutus','blog_huongdan','blog_tingame') );
    }

    public function blogs_huong_dan(){
        $blog_tingame = Blog::orderBy('id','DESC')->where('kind_of_blog','blogs')->where('status',1)->paginate(10);
        $blog = Blog::orderBy('id','DESC')->where('kind_of_blog','blogs')->orwhere('kind_of_blog','huongdan')->where('status',1)->paginate(10);
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $blog_huongdan = Blog::orderBy('id','DESC')->where('kind_of_blog','huongdan')->where('status',1)->paginate(10);
        return view('pages.blog_huongdan' , compact('slider','blog_huongdan','blog_aboutus','blog','blog_tingame') );
    }

    public function blogs_tin_game(){
        $blog_huongdan = Blog::orderBy('id','DESC')->where('kind_of_blog','huongdan')->where('status',1)->paginate(10);
        $blog = Blog::orderBy('id','DESC')->where('kind_of_blog','blogs')->orwhere('kind_of_blog','huongdan')->where('status',1)->paginate(10);
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus')->get();
        $blog_tingame = Blog::orderBy('id','DESC')->where('kind_of_blog','blogs')->where('status',1)->paginate(10);
        return view('pages.blog_tingame' ,compact('slider','blog_tingame','blog_aboutus','blog','blog_huongdan') );
    }
 
    public function blogs_detail($slug){
        $blog_aboutus = Blog::where('kind_of_blog','aboutus' )->get();
        $blog = Blog::where('slug',$slug)->first();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.detail_blog' ,compact('slider','blog','blog_aboutus') );
    }

    public function profile(){
        if(Auth::user()==null){
            return view('auth.login' );
        }
        $nicks = Nick::where('user_id',Auth::user()->id) -> get();
        $thenap = Thenap::where('user_id',Auth::user()->id) -> get();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus' )->get();
        // $blog = Blog::where('slug',$slug)->first();
    
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.profile' ,compact('slider','blog_aboutus','nicks','thenap') );
    }

    public function napthe(){
        if(Auth::user()==null){
            return view('auth.login' );
        }
        $blog_aboutus = Blog::where('kind_of_blog','aboutus' )->get();
        // $blog = Blog::where('slug',$slug)->first();
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
     
        return view('pages.napthe' ,compact('slider','blog_aboutus') );
        
    }

    public function nickofuser() {
        if(Auth::user()==null){
            return view('auth.login' );
        }
        $nicks = Nick::where('user_id',Auth::user()->id) -> get();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus' )->get();
     
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.nickofuser' ,compact('slider','blog_aboutus','nicks') );
    }

    public function thenapofuser() {
        $thenap = Thenap::where('user_id',Auth::user()->id) -> get();
        $blog_aboutus = Blog::where('kind_of_blog','aboutus' )->get();

        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.thenapofuser' ,compact('slider','blog_aboutus','thenap') );
    }

    public function chuyentien(){
        if(Auth::user()==null){
            return view('auth.login' );
        }
        $blog_aboutus = Blog::where('kind_of_blog','aboutus' )->get();
     
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.chuyentien' ,compact('slider','blog_aboutus',) );
    }

    public function muathe(){
        if(Auth::user()==null){
            return view('auth.login' );
        }
        $blog_aboutus = Blog::where('kind_of_blog','aboutus' )->get();
     
        $slider = Slider::orderBy('id','DESC')->where('status',1)->get();
        return view('pages.muathe' ,compact('slider','blog_aboutus',) );
    }


}
