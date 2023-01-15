@extends('layout')
@section('content')
@endsection


<div class="c-layout-page" style="margin-top: 150px">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="m-t-20 visible-sm visible-xs"></div>
    <center style="max-width:1140px; margin: 0 auto;" class="hidden-xs">
       <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url({{asset('fe/images/anhbia.png')}});background-position: center;width:100%;height: 350px;background-repeat: no-repeat;background-position: center;background-size: cover;">
          <div class="container">
             <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">&nbsp;</h3>
             </div>
          </div>
       </div>
    </center>
    <div class="container c-size-md ">
       <div class="col-md-12">
          <div class="text-center" style="margin-top: -128px;">
             <center>
                <img class="img-responsive img-thumbnail hidden-xs" width="256" height="256" src="{{asset('fe/images/avatar.jpg')}}" alt="png-image">
                <h2 class="c-font-bold c-font-28">ID Web:  {{Auth::user()->id}}</h2>
                <h2 class="c-font-bold c-font-28">
                    {{Auth::user()->name}}
                </h2>
                <h2 class="c-font-22">{{Auth::user()->role == "1" ? "Admin": "Thành Viên"}}</h2>
                <h2 class="c-font-22">{{Auth::user()->email}}</h2>
                <h2 class="c-font-22 c-font-red"> {{number_format(Auth::user()->money,0,',','.')}}đ</h2>
             </center>
          </div>
       </div>
    </div>
    <div class="c-layout-page" style="margin-top: 20px;">
       <div class="container">
          <div class="c-layout-sidebar-menu c-theme ">
             <div class="row">
                <div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
                   <!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
                   <div class="c-content-title-3 c-title-md c-theme-border">
                      <h3 class="c-left c-font-uppercase">Menu tài khoản</h3>
                      <div class="c-line c-dot c-dot-left "></div>
                   </div>
                   <div class="c-content-ver-nav">
                      <ul class="c-menu c-arrow-dot c-square c-theme">
                         <li><a href="/user/profile" class="active">Thông tin tài khoản</a></li>
                         <li><a href="{{route('nickofuser')}}" class="p-quantity ">Nick đã mua
                            <span id="quantity_noti" class="quantity">{{$nicks->count()}}</span>
                            </a>
                         </li>

                         <li><a href="{{route('thenapofuser')}}" class="p-quantity ">Thẻ Đã Nạp
                           <span id="quantity_noti" class="quantity">{{$thenap->count()}}</span>
                           </a>
                        </li>
               
                      </ul>
                   </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-6 m-t-15">
                   <div class="c-content-title-3 c-title-md c-theme-border">
                      <h3 class="c-left c-font-uppercase">Menu giao dịch</h3>
                      <div class="c-line c-dot c-dot-left "></div>
                   </div>
                   <div class="c-content-ver-nav m-b-20">
                      <ul class="c-menu c-arrow-dot c-square c-theme">
                         <li><a href="" class=""><b>Nạp thẻ </b></a></li>
                   
                         <li><a href="" class="">Chuyển tiền</a></li>
                      </ul>
                   </div>
                </div>
             </div>
          </div>
          <div class="c-layout-sidebar-content ">
             <!-- BEGIN: PAGE CONTENT -->
             <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
             <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
                <div class="c-line-left"></div>
             </div>
             <table class="table table-striped">
                <tbody>
                   <tr>
                      <th scope="row">ID của bạn:</th>
                      <th><span class="c-font-uppercase"> {{Auth::user()->id}}</span></th>
                   </tr>
                   <tr>
                      <th scope="row">Tên tài khoản:</th>
                      <th>     {{Auth::user()->name}}</th>
                   </tr>
                   <tr>
                      <th scope="row">Số dư tài khoản:</th>
                      <td><b class="text-danger"> {{number_format(Auth::user()->money,0,',','.')}}đ</b></td>
                   </tr>
                   <!--                <tr>
                      <th scope="row">Địa chỉ Email:</th>
                      <td>Tanmk1191@gmail.com (<a href="/user/email.html">Cài đặt</a>)</td>
                      </tr>-->
                   {{-- <tr>
                      <th scope="row">Bảo mật ODP:</th>
                      <td><a href="/user/phone.html"><b><i class="text-danger">Thêm số điện thoại</i></b></a></td>
                   </tr> --}}
                   <tr>
                      <th scope="row">Nhóm tài khoản:</th>
                      <td> {{Auth::user()->role == "1" ? "Admin": "Thành Viên"}}</td>
                   </tr>
                   <tr>
                      <th scope="row">Ngày tham gia:</th>
                      <td>
                        {{Auth::user()->created_at}}
                      </td>
                   </tr>
                   {{-- <tr>
                      <th scope="row">Mật khẩu:</th>
                      <td><a href="/user/change-password"><b><i class="text-danger">****** (Đổi mật khẩu)</i></b></a></td>
                   </tr> --}}
                </tbody>
             </table>
             <!-- END: PAGE CONTENT -->
          </div>
       </div>
    </div>
    <!-- END: PAGE CONTENT -->
 </div>
