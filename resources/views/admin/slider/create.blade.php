@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Thêm Slider</div>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
                
            @else
                
            @endif
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('slider.index')}}" class="btn btn-success"> Liệt Kê Slider Game</a>
                <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data" class="col-12">
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control"   placeholder="Title">
      
                    </div>
                    
                   
                    
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" id="" placeholder="Image">
                     
                      </div>  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                         <textarea class="form-control" name="description"> </textarea> 
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                          <option value="1">Hiển Thị</option>
                          <option value="0">Không Hiển Thị</option>
                   
                        </select>
                      </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
   
@endsection