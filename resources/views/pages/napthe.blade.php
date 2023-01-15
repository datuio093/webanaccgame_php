      
      @extends('layout')
      {{-- @section('content')
      @endsection --}}
      
      
      <div style="margin-top: 150px" class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
      <div class="container">
      </div>
      <div class="text-center" style="margin-bottom: 50px;">
         <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">DỊCH VỤ NẠP THẺ </h2>
      </div>
      <form onsubmit="return confirm('Bạn Có Chắc Chắn Nạp Thẻ?');" action="{{route('napthe123.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
         @method('PUT')
         @csrf
         <div class="container detail-service">
      
         <div  class="form-group row">
            <div class="">
                <div class="">
                   <div class="news_image">
                      <img  class="col-md-5 hidden-xs hidden-sm" src="{{asset('fe/images/napthe.png')}}" alt="png-image">
                   </div>
                </div>
             </div>
             <div class="col-md-7 hidden-xs hidden-sm">
                <div class="">
                    <input  type="text" name="price" class="form-control col-md-7" placeholder="Seri" >
                    <input  style="margin-top: 20px"  type="text" name="title" class="form-control col-md-7" placeholder="Mã Thẻ" >
                   
                       <button style="margin-top: 20px" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 "  type="submit" >Nạp ngay</button>
                </div>
                
             </div>
         

         </div>
   
 

    
       
      
        </div>
       </form>
   </div>
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <script>
      $(document).ready(function () {
          $('#btnPurchase').click(function () {
      
              $('#homealert').modal('show');
          });
      
      
      
          GetAmount();
          $("#telecom_key").on('change', function () {
              GetAmount();
      
          });
      
          $("#amount").on('change', function () {
              UpdatePrice();
          });
      
          $("#quantity").on('change', function () {
              UpdatePrice();
          });
      
          function GetAmount(){
      
              var telecom_key= $("#telecom_key").val();
              var getamount = $.get( "/mua-the/get-amount?telecom_key="+telecom_key, function(data,status) {
      
                  $("#amount").find('option').remove();
                  $("#amount").html(data).val($("#amount option:first").val());
                  UpdatePrice();
              }).done(function() {
                alert( "Xong" );
              }).fail(function() {
                alert( data );
                  alert( "Không tìm thấy mệnh giá phù hợp" );
              })
          }
          function UpdatePrice(){
              var amount=$("#amount").val();
              var ratio=$('#amount option:selected').attr('rel-ratio');
              var quantity=$("#quantity").val();
      
              if(amount=='' ||amount==null || ratio=='' ||ratio==null   || quantity=='' ||quantity==null){
      
                  $('#txtPrice').html('Tổng: ' + 0 + ' VNĐ');
                  $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                      $(this).removeClass();
                  });
                  console.log('amount:'+amount);
                  console.log('ratio:'+ratio);
                  console.log('quantity:'+quantity);
                  return;
              }
      
      
      
              if(ratio<=0 || ratio=="" || ratio==null){
                  ratio=100;
              }
      
              var sale=amount-(amount*ratio/100);
      
              var total=(amount-sale) *quantity;
              $('#txtPrice').html('Tổng: ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
              $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                  $(this).removeClass();
              });
      
          }
      
      });
      
      
      
      
   </script>
   <script>
      $(document).ready(function () {
          $('.load-modal').each(function (index, elem) {
              $(elem).unbind().click(function (e) {
                  e.preventDefault();
                  e.preventDefault();
                  var curModal = $('#LoadModal');
                  curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                  curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
              });
          });
      });
   </script>
   <!-- END: PAGE CONTENT -->
</div>