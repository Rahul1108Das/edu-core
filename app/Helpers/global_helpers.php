<?php 


use App\Models\Cart;

/** convert minutes to hours */

if(!function_exists('convertMinutesToHours')) {
    function convertMinutesToHours(int $minutes) : string {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        return sprintf('%dh %02dm', $hours, $minutes);
    }
}

if(!function_exists('user')) {
    function user() {
        return auth('web')->user();
    }
}

if(!function_exists('adminUser')) {
    function adminUser() {
        return auth('admin')->user();
    }
}

if(!function_exists('cartTotal')) {
    function cartTotal() {
        $total = 0;

        $cart = Cart::where('user_id', user()->id)->get();

        foreach($cart as $item) {
            if($item->course->discount > 0) {
                $total += $item->course->discount;
            }else {
                $total += $item->course->price;
            }
        }
    
    return $total;
    }
}