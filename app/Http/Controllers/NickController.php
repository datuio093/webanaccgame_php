<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nick;
use App\Models\Category;
use App\Models\Accessories;
class NickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nicks = Nick::with('category')->orderBy('id','desc')->paginate(10);
        return view('admin.nick.index', compact('nicks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.nick.create' ,compact('category') );
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
        //     'title' => 'required|unique:nicks|max:255',
        //     'category_id' => 'required',
        //     'status' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     ],

        //     [
        //         'title.unique' => 'Tên danh mục đã bị trùng xin chọn tên khác',
        //         'title.required' => 'Tên danh mục không được để trống',
        //         'category_id.required' => 'category_id không được để trống',
        //         'status.required' => 'Status không được để trống',
        //     ]
        // );
        $attribute = [];
        foreach($data['attribute'] as $key => $attri){
            foreach($data['name_attribute'] as $key2 => $name_attri){
                if($key == $key2){
                    $attribute[] = $name_attri.': '.$attri;
                }
            }
        }
      
        $nicks = new Nick(); 
        $nicks->title = $data['title'];
        $nicks->ms = random_int( 100000 , 999999);
        $nicks->attribute = json_encode($attribute, JSON_UNESCAPED_UNICODE); 
        $nicks->status = $data['status'];
        $nicks->description = $data['description'];
        $nicks->price = $data['price'];
        $nicks->category_id = $data['category_id'];


        $get_image = $request->image;
        $path = 'uploads/nicks';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image -> move($path, $new_image);

        $nicks->image = $new_image;

        $nicks->save();
      
        return redirect()->route('nick.index'); 
    }

    public function choose_category(Request $request){
        $data = $request->all();
        // dd($data);
        $access = Accessories::where('category_id', $data['category_id'])->where('status',1)->get();
        $output="";
        foreach($access as $key => $acce){
            $output.='<div class="form-group">
            <label for="exampleFormControlSelect1">'.$acce->title.'</label>
            <input type="hidden" value="'.$acce->title.'" name="name_attribute[]">
            <input type="text" name="attribute[]" class="form-control" placeholder="Title">
         </div>';
        }

        echo $output;
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
        $nick = Nick::find($id);
        $category = Category::orderBy('id','DESC')->get();
        return view('admin.nick.edit', compact('nick','category'));
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
        // $data = $request->validate(
        //     [
        //     'title' => 'required|unique:nicks|max:255',
        //     'category_id' => 'required',
        //     'status' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     ],

        //     [
        //         'title.unique' => 'Tên danh mục đã bị trùng xin chọn tên khác',
        //         'title.required' => 'Tên danh mục không được để trống',
        //         'category_id.required' => 'category_id không được để trống',
        //         'status.required' => 'Status không được để trống',
        //     ]
        // );
   
      
        $nicks = Nick::find($id); 
        $nicks->title = $data['title'];
        $nicks->ms =  $nicks->ms;
        // $nicks->attribute = json_encode($attribute, JSON_UNESCAPED_UNICODE); 
        $nicks->status = $data['status'];
        $nicks->description = $data['description'];
        $nicks->price = $data['price'];
        $nicks->category_id = $data['category_id'];
        $nicks->attribute = $data['attribute'];


        $get_image = $request->image;
        if($get_image){
          
            $path = 'uploads/nicks';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move($path, $new_image);
    
            $nicks->image = $new_image;
        }
       

        $nicks->save();
      
        return redirect()->route('nick.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nick = Nick::find($id)->delete();

        return redirect()->route('nick.index'); 
    }
}
