@extends('layouts.app')
@section('content')
@section('navbar')
    @include('admin.include.navbar')
@endsection
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Liệt Kê Danh Sách Thẻ Nạp</div>
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

                <a href="{{route('thenap.index')}}" class="btn btn-success"> Liệt Kê Danh Sách Thẻ Nạp</a>
                <form action="{{route('thenap.store')}}" method="POST" enctype="multipart/form-data" class="col-12">
                    @csrf


                    <div class="form-group">
                      <label for="">Seri</label>
                      <input  type="text" name="seri" class="form-control"  id="slug"  placeholder="Seri">
      
                    </div>
                    <div class="form-group">
                      <label for="">Mã Thẻ</label>
                      <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="mathe" class="form-control" aria-describedby="emailHelp" >
                   
                    </div>

                    <div class="form-group">
                      <label for="">Mệnh Giá</label>
                      <input type="text" name="menhgia" class="form-control" aria-describedby="emailHelp" >
                   
                    </div>
   
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Trạng Thái</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                          <option value="1">Đã Nạp</option>
                          <option value="0">Chưa Nạp</option>
                   
                        </select>
                     </div>

              

                 
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
</div>
        
   
@endsection