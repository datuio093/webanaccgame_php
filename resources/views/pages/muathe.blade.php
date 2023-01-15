      
      @extends('layout')
      @section('content')
      @endsection 
      
      
      <div style="margin-top: 150px" class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
      <div class="container">
      </div>
      <div class="text-center" style="margin-bottom: 50px;">
         <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">DỊCH VỤ MUA THẺ </h2>
      </div>
      <form method="POST" action="https://nick.vn/mua-the" accept-charset="UTF-8" class="" enctype="multipart/form-data" data-hs-cf-bound="true">
         <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
         <div class="container detail-service">
            <div class="row">
               <div class="col-md-8" style="margin-bottom:20px;">
                  <div class="service-info">
                     <div class="col-md-5 hidden-xs hidden-sm">
                        <div class="">
                           <div class="news_image">
                              <img height="250px"  src="{{asset('fe/images/muathe.jpg')}}" alt="png-image">
                           </div>
                        </div>
                     </div>   
                     <div class="col-md-7">
                        <span class="mb-15 control-label bb">Chọn nhà mạng:</span>
                        <div class="mb-15">
                           <select name="telecom_key" id="telecom_key" class="server-filter form-control t14" style="">
                              <option value="VIETTEL">Viettel</option>
                              <option value="SOHACOIN">SohaCoin</option>
                              <option value="VINAPHONE">Vinaphone</option>
                              <option value="MOBIFONE">Mobifone</option>
                              <option value="CARROT">Thẻ Carot (Team)</option>
                              <option value="ZING">Zing Card( Vina Game)</option>
                              <option value="VCOIN">Vcoin (VTC Online)</option>
                              <option value="GATE">Gate (FPT Online)</option>
                              <option value="GARENA">Garena</option>
                              <option value="SCOIN">Scoin ( VTC Mobile)</option>
                              <option value="APPOTA">Appota</option>
                              <option value="VIETNAMOBILE">Vietnamobile</option>
                              <option value="FUNCARD">Funcard</option>
                              <option value="GOSU">Gosu</option>
                           </select>
                        </div>
                        <span class="mb-15 control-label bb">Mệnh giá:</span>
                        <div class="mb-15">
                           <select name="amount" id="amount" class="server-filter form-control t14" style="">
                              <option r-default="0" value="10000" rel-ratio="100.0">10,000 VNĐ - 0%</option>
                              <option r-default="0" value="20000" rel-ratio="100.0">20,000 VNĐ - 0%</option>
                              <option r-default="0" value="50000" rel-ratio="97.0">50,000 VNĐ - 3%</option>
                              <option r-default="0" value="100000" rel-ratio="97.0">100,000 VNĐ - 3%</option>
                              <option r-default="0" value="200000" rel-ratio="97.0">200,000 VNĐ - 3%</option>
                              <option r-default="0" value="500000" rel-ratio="97.0">500,000 VNĐ - 3%</option>
                           </select>
                        </div>
                        <span class="mb-15 control-label bb">Số lượng:</span>
                        <div class="mb-15">
                           <select name="quantity" id="quantity" class="server-filter form-control t14" style="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class=" emply-btns text-center">
                           <a id="txtPrice" style="font-size: 20px;font-weight: bold" class="">Tổng: 10,000 VNĐ</a>
                           {{-- <a style="font-size: 20px;" class="followus" href="" title=""><i class="fa fa-key" aria-hidden="true"></i>  Thanh toán</a> --}}
                           <div id="smart-button-container" style="margin-top: 80px">
                              <div style="text-align: center;">
                                <div id="paypal-button-container"></div>
                              </div>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="row box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none" alt="png-image"></div>
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                     <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Xác nhận thông tin thanh toán</h4>
                  </div>
                  <div class="modal-body">
                     <p> Bạn thực sự muốn thanh toán?</p>
                  </div>
                  <div class="modal-footer">
                     <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Đăng nhập</a>
                     <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <div id="smart-button-container">
         <div style="text-align: center;">
           <div id="paypal-button-container"></div>
         </div>
       </div>
   </div>
   <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
   <script>
  
     
   </script>

   
   <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
   <script>
       var total;
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
      
               total=(amount-sale) *quantity;
              
              $('#txtPrice').html('Tổng: ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
              $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                  $(this).removeClass();
              });
      
          }
          function initPayPalButton() {
      // console.log(total);
       paypal.Buttons({
         style: {
           shape: 'rect',
           color: 'gold',
           layout: 'vertical',
           label: 'paypal',
           
         },
 
         createOrder: function(data, actions) {
         //  total = total / 24000;
        var money =  Math.round(total / 22000);
           return actions.order.create({
             purchase_units: [{"amount":{"currency_code":"USD","value":money}}]
           });
         },
 
         onApprove: function(data, actions) {
           return actions.order.capture().then(function(orderData) {
             
             // Full available details
             console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
 
             // Show a success message within this page, e.g.
             const element = document.getElementById('paypal-button-container');
             element.innerHTML = '';
             element.innerHTML = '<h3>Thank you for your payment!</h3>';
 
             // Or go to another URL:  actions.redirect('thank_you.html');
             
           });
         },
         
         onError: function(err) {
           console.log(err);
         }
       }).render('#paypal-button-container');
     }
     initPayPalButton();
     
      
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