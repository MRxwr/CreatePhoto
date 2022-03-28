<?php

namespace Sbhadra\Coupons\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Coupons\Models\Coupon;
use Sbhadra\Photography\Models\Booking;
use Juzaweb\Models\Taxonomy;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class MainAction extends Action
{
    /**
     * Execute the actions.
     *
     * @return void
     */
    public function handle()
    {
        $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerCoupons']);
        // $this->addAction(self::JUZAWEB_INIT_ACTION, [$this, 'registerBooking']);
         $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'doProcessDiscountCoupon']);
         $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'getDiscountCouponTheme']);
         $this->addAction(Action::FRONTEND_CALL_ACTION, [$this, 'checkCouponCode']);
    }

    public function registerCoupons()
    {
        HookAction::registerPostType('coupons', [
            'label' => trans('sbco::app.coupons'),
            'model' => Coupon::class,
            'menu_position' => 43,
            'menu_icon' => 'fa fa-list',
        ]);
    }

    
    public function getDiscountCouponTheme(){

        add_action('theme.coupon.fields', function() {
            $html = '<div class="col-xxl-8 pb-3">
            <label>'.trans('sbco::app.coupon').'</label>
                <input type="hidden"  id="discount_value" name="discount_value">
                <input type="text" class="border"  id="coupon_code" name="coupon_code">
            </div><div class="col-xxl-4 pb-3">
              <a class="btn btn-sm btn-light fs18 radius30" id="apply_code">'.trans('sbco::app.apply').'</a>
            </div>';
           echo  $html;
        }, 10, 1);

        add_action('theme.footer', function() {
            $html = '<script>
            $("body").on("click", "#apply_code", function(e) {
                var total_price = localStorage.getItem("total_price");
                var coupon_code = $("#coupon_code").val();
                //alert(coupon_code);
                if(coupon_code!=""){
                 
                   $.ajax({
                       type: "GET",
                       url: "?ajaxpage=checkCouponAjax",
                       data: "coupon_code=" + coupon_code +"&total_price=" + total_price,
                       success : function(res){
                        var obj = jQuery.parseJSON(res);
                           if (obj.status == "success"){
                               setTimeout(() => {
                                //alert(obj.discount)
                                var nerprice = total_price - obj.discount;
                                var pt = "<strike>"+ total_price +"KD</strike> <span>"+nerprice+"KD</span>";
                                $("#totalprice").html(pt);
                                //$("#discountprice").text("(Discount : "+ obj.discount + "KD)");
                                $("#discount_value").val( obj.discount);
                                
                               }, 1000); 
                           }else{
                             alert("invalid coupon code");
                           }
                       }
                   });
                }else{
                 alert("Please Enter Coupon Code");
                }
               });
               </script>';
           echo  $html;
        }, 20, 1);
    }

    public function checkCouponCode(){
        if(isset($_REQUEST['ajaxpage']) && $_REQUEST['ajaxpage'] =='checkCouponAjax' ){
            if(isset($_REQUEST['coupon_code'])){
                $coupon = Coupon::where('coupon_code',$_REQUEST['coupon_code'])->whereDate('validity_from', '<=', date("Y-m-d"))
                ->whereDate('validity_to', '>=', date("Y-m-d"))
                ->first();
                if(!empty($coupon)){
                $booking =  Booking::where('coupon_code',$_REQUEST['coupon_code'])->where('status','Yes')->count();
                    //dd($coupon->coupon_discount);
                    if($booking==0){
                        $discount=0;
                        if($coupon->coupon_type==1){
                            $discount = (intval($coupon->coupon_discount)*$_REQUEST['total_price'])/100;
                        }else{
                            $discount =intval($coupon->coupon_discount);
                        }
                        echo json_encode(
                                array(
                                    'status'=>'success',
                                    'discount'=>$discount,
                                )
                            );
                    }else{
                        echo json_encode(
                            array(
                                'status'=>'error',
                                'discount'=>0,
                            )
                        );
                       
                    }
                }
            }
        exit;
       }
    }

    public function doProcessDiscountCoupon(){
        add_action('theme.booking.extra', function($payment_data) {
            $booking = Booking::find($payment_data['booking_id']);
            if(isset($payment_data['coupon_code'])){;
                $booking->coupon_code =  $payment_data['coupon_code'];
            }
            if(isset($payment_data['discount_value'])){;
                $booking->discount_value =  $payment_data['discount_value'];
            }
            $booking->save();
        }, 12, 1);
    }
    
}
