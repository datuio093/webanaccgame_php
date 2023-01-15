<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thenap;

class ThenapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thenap = Thenap::orderBy('id','desc')->paginate(10);
        return view('admin.thenap.index', compact('thenap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.thenap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
            'seri' => 'required|unique:thenap|max:255',
 
            'mathe'=>'required|unique:thenap|max:255',
            'menhgia'=> 'bail|required|numeric|gt:0',
            'status'=> '',

            ],

            [
                'seri.unique' => 'Seri đã bị trùng',
                'seri.required' => 'Seri không được để trống',
                'mathe.unique' => 'Mã Thẻ đã bị trùng',
                'mathe.required' => 'Mã Thẻ không được để trống',
                
            ]
        );
      
        $thenap = new TheNap(); 
        $thenap->seri = $data['seri'];
     
        $thenap->mathe  = $data['mathe'];
        $thenap->menhgia  = $data['menhgia'];

        $thenap->status = $data['status'];

        $thenap->save();
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
        $thenap = TheNap::find($id);
        return view('admin.thenap.edit' , compact('thenap'));
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
            'seri' => 'required|max:255',
 
            'mathe'=>'required|max:255',
            'menhgia'=> 'bail|required|numeric|gt:0',
            'status'=> '',

            ],

            [
               
                'seri.required' => 'Seri không được để trống',
     
                'mathe.required' => 'Mã Thẻ không được để trống',
                
            ]
        );
      
        $thenap =  TheNap::find($id); 
        $thenap->seri = $data['seri'];
     
        $thenap->mathe  = $data['mathe'];
        $thenap->menhgia  = $data['menhgia'];

        $thenap->status = $data['status'];

        $thenap->save();
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
        $thenap = TheNap::find($id);
   

        $thenap->delete();
        return redirect()->back();
    }
}
