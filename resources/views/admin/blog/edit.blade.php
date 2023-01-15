@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Cập Nhật Danh Sách Blog</div>
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

                <a href="{{route('blog.index')}}" class="btn btn-success"> Liệt Kê Danh Mục Blog</a>
                <a href="{{route('blog.create')}}" class="btn btn-success"> Thêm Danh Mục Blog</a>
                <form action="{{route('blog.update', $blog->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" onkeyup="ChangeToSlug()" class="form-control" id="" aria-describedby="emailHelp" value="{{($blog->title)}}">
                   
                    </div>

                    <div class="form-group">
                      <label for="">Slug</label>
                      <input type="text" name="slug" class="form-control" id="" aria-describedby="emailHelp" value="{{($blog->slug)}}">
                   
                    </div>

                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" id="" aria-describedby="emailHelp" placeholder="Image">
                        <img height="150px" width="150px" src="{{asset('uploads/blog/'.$blog->image)}}" alt="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                           <textarea class="form-control" name="description" id="des_blog"> {{$blog->description}} </textarea> 
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Content</label>
                           <textarea class="form-control" name="content" id="content_blog">  {{$blog->content}} </textarea> 
                      </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            @if ($blog->status==1)
                            <option value="1" selected>Hiển Thị</option>
                            <option value="0">Không Hiển Thị</option>
                            @else
                            <option value="1">Hiển Thị</option>
                            <option value="0" selected>Không Hiển Thị</option>
                            @endif
                   
                   
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Kind Of Blog</label>
                        <select class="form-control" name="kindofblog" id="exampleFormControlSelect1">
                            @if ($blog->kind_of_blog=='huongdan')
                            <option value="blogs">Blog</option>
                            <option selected value="huongdan">Hưỡng Dẫn</option>
                            <option value="aboutus">About Us</option>
                            @elseif($blog->kind_of_blog=='blogs')
                            <option selected value="blogs">Blog (Tin Game)</option>
                            <option value="huongdan">Hưỡng Dẫn</option>
                            <option value="aboutus">About Us</option>
                            @else
                            <option  value="blogs">Blog (Tin Game)</option>
                            <option value="huongdan">Hưỡng Dẫn</option>
                            <option selected value="aboutus">About Us</option>
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