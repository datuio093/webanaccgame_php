@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách accessories</div>
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

                <a href="{{route('accessories.index')}}" class="btn btn-success"> Liệt Kê Danh Sách accessories</a>
                <form action="{{route('accessories.store')}}" method="POST" enctype="multipart/form-data" class="col-12">
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Title">
      
                    </div>

           

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                          <option value="1">Hiển Thị</option>
                          <option value="0">Không Hiển Thị</option>
                   
                        </select>
                     </div>

                     
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Thuộc Game</label>
                      <select class="form-control" name="category_id" id="exampleFormControlSelect1">
                    
                        @foreach ($category as $key => $cates)
                        <option value="{{$cates->id}}"> {{$cates->title}}</option>
                        @endforeach
                      </select>
                   </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
   
@endsection