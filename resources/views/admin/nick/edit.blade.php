@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Cập Nhật Danh Sách Nick Game </div>
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

                <a href="{{route('nick.index')}}" class="btn btn-success"> Liệt Kê Danh Mục Nick</a>
                <a href="{{route('nick.create')}}" class="btn btn-success"> Thêm Danh Mục Nick</a>
                <form action="{{route('nick.update', $nick->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control" id="" aria-describedby="emailHelp" value="{{($nick->title)}}">
                   
                    </div>

                    <div class="form-group">
                      <label for="">Tài Khoản</label>
                      <input type="text" name="taikhoan" class="form-control" value="{{($nick->taikhoan)}}">
      
                    </div>

                    <div class="form-group">
                      <label for="">Mật Khẩu</label>
                      <input type="text" name="matkhau" class="form-control" value="{{Crypt::decryptString($nick->matkhau)}}">
      
                    </div>

                   <div class="form-group">
                      <label for="">Price</label>
                      <input type="number" name="price" class="form-control" value="{{($nick->price)}}" >
    
                    </div>

             
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                         <textarea class="form-control" name="description"  id="des_blog"> {!!$nick->description!!}  </textarea> 
                    </div>

                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" class="form-control" name="image" id=""  aria-describedby="emailHelp" placeholder="Image">
                      <img height="150px" width="150px" src="{{asset('uploads/nicks/'.$nick->image)}}" alt="">
                    </div>
               
                   
                     
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            @if ($nick->status==1)
                            <option value="1" selected>Hiển Thị</option>
                            <option value="0">Không Hiển Thị</option>
                            @else
                            <option value="1">Hiển Thị</option>
                            <option value="0" selected>Không Hiển Thị</option>
                            @endif
                   
                   
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Thuộc Game</label>
                        <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                       
                          @foreach ($category as $key => $cates)
                          <option {{$cates->id == $nick->category_id ? 'selected' : ''}} value="{{$cates->id}}"> {{$cates->title}}</option>
                          @endforeach
                        </select>
                     </div>

                    <div class=""> 
                      <label for="exampleFormControlSelect1">Thuộc Game</label>
                      <input type="text" name="attribute" class="form-control" id="" aria-describedby="emailHelp" value="{{($nick->attribute)}}">
                    </div>  


                     
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
   
@endsection