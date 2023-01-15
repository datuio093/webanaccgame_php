<div class="c-layout-page" style="margin-top: 150px">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box">
       <div id="slider" class="owl-theme section section-cate slideshow_full_width ">
          <div id="slide_banner" class="owl-carousel">
             @foreach($slider as $key => $slie)
             <div class="item" >
                <a href="/" alt="{{$slie->title}}">
                <img src="{{asset('uploads/slider/'.$slie->image)}}" width="100%" height="420px"  alt="{{$slie->title}}">
                </a>
             </div>
             @endforeach
       
          </div>
       </div>
    </div>