@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Nick</div>
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

                <a href="{{route('nick.index')}}" class="btn btn-success"> Liệt Kê Danh Sách Nick</a>
                <form action="{{route('nick.store')}}" method="POST" enctype="multipart/form-data" class="col-12">
                    @csrf
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Title">
      
                    </div>

                    {{-- <div class="form-group">
                      <label for="">Mã Số</label>
                      <input type="text" name="maso" class="form-control" placeholder="Mã Số">
      
                    </div> --}}

               

                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="number" name="price" class="form-control" placeholder="Price">
      
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                         <textarea class="form-control" name="description" id="des_blog">  </textarea> 
                    </div>

                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" class="form-control" name="image" id="" aria-describedby="emailHelp" placeholder="Image">
                   
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
                      <select class="choose_category form-control" name="category_id" id="exampleFormControlSelect1">
                        <option value="0"> --Chọn game cần thêm-- </option>
                        @foreach ($category as $key => $cates)
                        <option value="{{$cates->id}}"> {{$cates->title}}</option>
                        @endforeach
                      </select>
                   </div>
       
                          
               


                   <span id="show_attribute"> </span>
                     
                
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
   
@endsection