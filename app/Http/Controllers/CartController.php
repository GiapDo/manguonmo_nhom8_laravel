<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Surfsidemedia\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function index(){
        $items = Cart::instance('cart')->content();
        return view('cart', compact('items'));
    }

    public function add_to_cart(Request $request){
        Cart::instance('cart')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function inscrease_cart_quantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function decrease_cart_quantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        dd(Cart::instance('cart'));
        return redirect()->back();
    }

    public function remove_item($rowId){
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function empty_cart(){
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

    public function apply_coupon_code(Request $request){
        $coupon_code = $request->coupon_code;
        if(isset($coupon_code)){
            $subtotal = Cart::instance('cart')->subtotal(); // Lấy tổng phụ giỏ hàng, ví dụ "14,990,000.00"
            $subtotal = str_replace(',', '', $subtotal);  // Loại bỏ dấu phẩy
            $subtotal = (float)$subtotal;  // Ép kiểu thành float

            $coupon = Coupon::where('code', $coupon_code)
            ->where('expiry_date', '>=', Carbon::today())
            ->where('cart_value', '<=', $subtotal)->first();

            if(!$coupon){
                return redirect()->back()->with("error", "Invalid coupon code1!");
            }else{
                Session::put('coupon', [
                    'code' => $coupon->code,
                    'type' => $coupon->type,
                    'value' => $coupon->value,
                    'cart_value' => $coupon->cart_value
                ]);
                $this->calculateDiscount();
                return redirect()->back()->with('success', 'Coupon has been applied!');
            }
        }else{
            return redirect()->back()->with("error", "Invalid coupon code2!");
        }
    }

    public function calculateDiscount(){
        $discount = 0;
        $subtotal = Cart::instance('cart')->subtotal(); // Lấy tổng phụ giỏ hàng, ví dụ "14,990,000.00"
        $subtotal = str_replace(',', '', $subtotal);  // Loại bỏ dấu phẩy
        $subtotal = (float)$subtotal;  // Ép kiểu thành float
        if(Session::has('coupon')){
            if(Session::get('coupon')['type'] == 'fixed'){
                $discount = Session::get('coupon')['value'];
            }else{
                $discount = ( $subtotal * Session::get('coupon')['value'])/100;
            }

            $subtotalAfterDiscount =  $subtotal - $discount;
            $taxAfterDiscount = ($subtotalAfterDiscount * config('cart.tax'))/100;
            $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;

            Session::put("discounts", [
                'discount' => number_format(floatval($discount), 0, '', ','),  // Định dạng discount không có phần thập phân
                'subtotal' => number_format(floatval($subtotalAfterDiscount), 0, '', ','),  // Định dạng subtotal
                'tax' => number_format(floatval($taxAfterDiscount), 0, '', ','),  // Định dạng thuế
                'total' => number_format(floatval($totalAfterDiscount), 0, '', ',')  // Định dạng tổng
            ]);
        }
    }
    
    public function remove_coupon_code(){
        Session::forget('coupon');
        Session::forget('discounts');
        return back()->with('success', 'Coupon has been removed!');
    }
}
