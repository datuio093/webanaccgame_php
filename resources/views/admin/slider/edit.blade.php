@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Cập Nhật Danh Sách Slide</div>
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

                <a href="{{route('slider.index')}}" class="btn btn-success"> Liệt Kê Danh Mục Slide</a>
                <a href="{{route('slider.create')}}" class="btn btn-success"> Thêm Danh Mục Slide</a>
                <form action="{{route('slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control" id="" aria-describedby="emailHelp" value="{{($slider->title)}}">
                   
                    </div>

          

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" id="" aria-describedby="emailHelp" placeholder="Image">
                        <img height="150px" width="150px" src="{{asset('uploads/slider/'.$slider->image)}}" alt="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                           <textarea class="form-control" name="description" id="des_slide"> {{$slider->description}} </textarea> 
                      </div>
                  
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            @if ($slider->status==1)
                            <option value="1" selected>Hiển Thị</option>
                            <option value="0">Không Hiển Thị</option>
                            @else
                            <option value="1">Hiển Thị</option>
                            <option value="0" selected>Không Hiển Thị</option>
                            @endif
                   
                   
                        </select>
                      </div>

                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
   
@endsection