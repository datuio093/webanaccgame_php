@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Cập Nhật Danh Sách Game</div>
       
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="{{route('video.index')}}" class="btn btn-success"> Liệt Kê Video</a>
                <a href="{{route('video.create')}}" class="btn btn-success"> Thêm Video</a>
                <form action="{{route('video.update', $video->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control" id="" aria-describedby="emailHelp" value="{{($video->title)}}">
                   
                    </div>

                    <div class="form-group">
                      <label for="">Slug</label>
                      <input type="text" name="slug" class="form-control" id="" aria-describedby="emailHelp" value="{{($video->slug)}}">
                   
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" id="" aria-describedby="emailHelp" placeholder="Image">
                        <img height="150px" width="150px" src="{{asset('uploads/video/'.$video->image)}}" alt="">
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                         <textarea class="form-control" name="description" placeholder="..."> {{$video->description}} </textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Link</label>
                         <textarea class="form-control" name="link" placeholder="..."> {{$video->link}} </textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            @if ($video->status==1)
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