@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Cập Nhật Danh Sách accessories</div>
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

                <a href="{{route('accessories.index')}}" class="btn btn-success"> Liệt Kê Danh Mục accessories</a>
                <a href="{{route('accessories.create')}}" class="btn btn-success"> Thêm Danh Mục accessories</a>
                <form action="{{route('accessories.update', $accessories->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control" id="" aria-describedby="emailHelp" value="{{($accessories->title)}}">
                   
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Thuộc Game</label>
                      <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                    
                        @foreach ($category as $key => $cates)
                           <option {{ $cates->id==$accessories->category_id ? 'selected' : ' ' }}   value={{$cates->id}}> {{$cates->title}}</option>
                        @endforeach
                      </select>
                   </div>
                   
                     
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            @if ($accessories->status==1)
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