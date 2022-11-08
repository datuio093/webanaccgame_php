@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Blog</div>
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

                <a href="{{route('blog.index')}}" class="btn btn-success"> Liệt Kê Danh Sách Blog</a>
                <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data" class="col-12">
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control" onkeyup="ChangeToSlug()" id="slug"  placeholder="Title">
      
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Kind Of Blog</label>
                      <select class="form-control" name="kindofblog" id="exampleFormControlSelect1">
                        <option value="blogs">Blog</option>
                        <option value="huongdan">Hưỡng Dẫn</option>
                        <option value="aboutus">About Us</option>
                 
                      </select>
                   </div>

                    <div class="form-group">
                      <label for="">Slug</label>
                      <input type="text" name="slug" class="form-control"  placeholder="Title">
      
                    </div>
                    
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" name="image" id="" placeholder="Image">
                     
                      </div>  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                         <textarea class="form-control" name="description" id="des_blog"> </textarea> 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Content</label>
                         <textarea class="form-control" name="content" id="content_blog"> </textarea> 
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