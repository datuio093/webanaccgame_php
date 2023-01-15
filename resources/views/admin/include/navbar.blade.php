<div class="container">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{url('/')}}">Trang Chủ</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Admin Home</a>
                  </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('category.index')}}">List Game</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('slider.index')}}">Slider</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('video.index')}}">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('blog.index')}}">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('accessories.index')}}">Accessories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('nick.index')}}">Nick</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('thenap.index')}}">Thẻ Nạp</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('user.index')}}">User</a>
              </li>

              
              
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li> --}}
        
      
          </div>
        </div>
      </nav>
</div>