@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách gallery</div>
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
              <a href="{{route('nick.index')}}" class="btn btn-success"> Nick Game</a>
        
                <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data" class="col-12">
                    <input type="hidden" name="nick_id" value="{{Request::segment(3)}}">
                    @csrf


                 
                    <div class="form-group">
                      <label for="">Image</label>
                      <input type="file" class="form-control"request multiple name="image[]" id="" aria-describedby="emailHelp" placeholder="Image">
            
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>

            <table class="table table-striped" id="myTable">
              <tr>
                <th>ID</th>
           
                <th>Thuộc Nick</th>
                <th>Hình Ảnh</th> 
                <th>Quản Lý</th>
                <th></th>
           
              </tr>

              @foreach ($gallery as $key => $cate)
              <tr>
                  <td>{{$key}}</td>
               
                  <td>{{$nick->ms}}</td>
                 
                  {{-- <td>
                     @if ($cate->status == 0)
                         Không Hiển Thị
                     @else
                          Hiển Thị
                     @endif
                         
                  </td> --}}

                  <td> <img height="150px" width="150px" src="{{asset('uploads/gallery/'.$cate->image)}}" alt=""> </td>
             
          
                  <td> 
                      <form action="{{route('gallery.destroy',[$cate->id] )}}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button onclick="return confirm('Bạn Có Muốn Xóa Danh Mục Này Không ?');" class="btn btn-danger">Xóa </button>
                      </form> 
                     
                </tr>
              @endforeach
       
            </table>
        </div>
    </div>
</div>
        
   
@endsection