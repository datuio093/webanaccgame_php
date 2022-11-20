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
        </div>
    </div>
</div>
        
   
@endsection