<?php

namespace Sbhadra\Coupons\Actions;

use Illuminate\Support\Arr;
use Juzaweb\Abstracts\Action;
use Juzaweb\Facades\HookAction;
use Sbhadra\Coupons\Models\Coupon;
use Illuminate\Support\Facades\DB;
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
        // $this->addAction(self::BACKEND_CALL_ACTION, [$this, 'getCalenderHooksAdmin']);
    
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
