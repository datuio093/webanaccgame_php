@extends('layout')
@section('content')

<div class="c-layout-page" style="margin-top: 150px">
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
       <div class="container">
          <div class="c-page-title c-pull-left">
             <h3 class="c-font-uppercase c-font-sbold"><a href="/blog" title="Blog tin tức">Blog tin tức</a></h3>
          </div>
          <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
             <li><a href="/">Trang chủ</a></li>
             <li>/</li>
             <li>
                <a href="/blog">
                   <h1>Blog tin tức</h1>
                </a>
             </li>
          </ul>
       </div>
    </div>
    <div class="c-content-box c-size-md">
       <div class="container">
          <form class="form-horizontal form-find m-b-20" role="form" method="get" data-hs-cf-bound="true">
             <div class="row">
                <div class="col-md-4">
                   <input type="text" class="form-control c-square c-theme" name="key" autocomplete="off" autofocus="" placeholder="Nhập từ khóa..." value="" style="width: 100%">
                </div>
                <div class="col-md-4">
                   <input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                   <a class="btn c-btn-square m-b-10 btn-danger" href="https://nick.vn/blog">Tất cả</a>
                </div>
             </div>
          </form>
          <div class="row">
             <div class="col-md-9">
                <div class="art-list">
                    @foreach($blog_huongdan as $key => $blg)
                   <div class="a-item">
                      <div class="thumbnail-image img-thumbnail"><a href=""><img src="{{asset('uploads/blog/'.$blg->image)}}" alt="png-image"></a></div>
                      <div class="info">
                         <div class="article_title ">
                            <h2><a href="{{route('blogs_detail',[$blg->slug])}}" style="text-transform: initial;">{{$blg->title}}</a></h2>
                         </div>
                         <div class="article_cat_date">
                            <div style="display: inline-block;margin-right: 15px"><i class="fa fa-calendar" aria-hidden="true"></i> 25/01/2022</div>
                            <div style="display: inline-block"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <a href="/blog/huong-dan" title="Hướng Dẫn">
                   
                                  Hưỡng Dẫn
                            
                           </a></div>
                         </div>
                         <div class="article_description hidden-xs">{!!$blg->description!!}</div>
                      </div>
                   </div>
                     @endforeach
                </div>
                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                   {{-- <ul class="pagination pagination-sm">
                      <li class="page-item disabled"><span class="page-link">«</span></li>
                      <li class="page-item active"><span class="page-link">1</span></li>
                      <li class="page-item"><a class="page-link" href="https://nick.vn/blog?page=2">2</a></li>
                      <li class="page-item"><a class="page-link" href="https://nick.vn/blog?page=3">3</a></li>
                      <li class="page-item disabled hidden-xs"><span class="page-link">...</span></li>
                      <li class="page-item hidden-xs"><a class="page-link" href="https://nick.vn/blog?page=41">41</a></li>
                      <li class="page-item"><a class="page-link" href="https://nick.vn/blog?page=2" rel="next">»</a></li>
                   </ul> --}}
                   {{$blog_huongdan->links('pagination::bootstrap-4')}}
                </div>
             </div>
             <div class="col-md-3">
                <div class="c-content-ver-nav">
                   <div class="c-content-title-1 c-theme c-title-md c-margin-t-40">
                      <h3 class="c-font-bold c-font-uppercase">Danh mục</h3>
                      <div class="c-line-left c-theme-bg"></div>
                   </div>
                   <ul class="c-menu c-arrow-dot1 c-theme">
                
                    <li><a href="{{route('blogs')}}">Tất cả ({{count($blog)}})</a></li>
                    <li><a href="">Uy Tín Của Nick.vn (1)</a></li>
                    <li><a href="">Bài Ghim (4)</a></li>
                    <li><a href="{{route('blogs_tin_game')}}">Tin Game ({{count($blog_tingame)}})</a></li>
                    <li><a href="{{route('blogs_huong_dan')}}">Hướng Dẫn ({{count($blog_huongdan)}})</a></li>   
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>

 </div>
 @endsection