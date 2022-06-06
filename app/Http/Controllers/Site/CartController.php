<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Cart;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $request->validate(['qty' => 'nullable|numeric|min:1']);
        $qty = $request->qty ?? 1;
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            if (isset($cart[$product->id])) {
                $cart[$product->id]['qty'] = $qty;
                $cart[$product->id]['price'] = $product->price;
            } else {
                $cart[$product->id] = [
                    'id' => $product->id,
                    'qty' => $qty,
                    'price' => $product->price
                ];
            }
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'qty' => $qty,
                'price' => $product->price
            ];
        }
        session()->put('cart', $cart);

        if ($request->has('type') && $request->type === 'json') return response_json(true, $this->getCart());
        return redirect()->back()->with('success', __('Added Successfully'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        //return response_json(true, __('Deleted Successfully'));
        return redirect('/cart')->with('success', __('Deleted Successfully'));
    }

    public function cart()
    {
        return inertia('Store/Cart', ['cart' => $this->getCart(), 'delivery_cost' => getSetting('delivery_cost')]);
    }

    public function getCart()
    {
        $cart = session()->has('cart') ? session('cart') : [];
        if (count($cart) > 0) {
            $result = [];
            foreach ($cart as $single) {
                $single['product'] = Product::with('subCategory')->findOrFail($single['id']);
                // dd($single['product']);
                $result[] = $single;
            }
            $cart = $result;
        }
        return $cart;
    }

    public function checkCoupon(Request $request)
    {
        $request->validate(['code' => 'required|max:191']);
        $coupon = Coupon::where([['code', $request->code], ['expire_at', '>=', Carbon::now()]])->first();
        if ($coupon) return response_json(true, $coupon->value);
        return response_json(false, __('Coupon is not exists'));
    }

    public function finishCart(Request $request)
    {
        $request->validate(['total' => 'required|numeric']);
        $data = [
            'shipping_fees' => 0,
            'coupon_discount' => $request->discount ?? 0,
            'coupon_val' => $request->discount_val ?? 0,
            'total' => $request->total,
            'delivery_cost' => $request->delivery ?? 0
        ];
        if (!is_null($request->code)) {
            $coupon = Coupon::where('code', $request->code)->first();
            $data['coupon_id'] = $coupon->id ?? null;
        }
        $cart = Cart::updateOrCreate(['user_id' => auth()->id(), 'status' => 'created'], $data);

        // insert cart items
        $items = $this->getCart();
        foreach ($items as $item) {
            $cart->items()->create([
                'product_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
            ]);
        }

        return redirect()->route('cart.delivery', $cart->id)->with('success', __('Added Successfully'));
    }

    public function cancelCart(Cart $cart)
    {
        $cart->update(['status' => 'cancelled']);
        return redirect()->route('user.carts')->with('success', __('Successfully'));
    }

    public function deliveryInfo(Cart $cart)
    {
        $cart->load(['user', 'items.product.subCategory']);
        return inertia('Store/Delivery', ['cart' => $cart, 'areas' => Area::all()]);
    }

    public function updateDelivery(Request $request, Cart $cart)
    {
        $cart->update($request->all());
        return response_json(true, __('Updated Successfully'));
    }

    public function payment(Cart $cart)
    {
        $cart->load(['user', 'items.product.subCategory']);
        return inertia('Store/Payment', ['cart' => $cart]);
    }

    public function submitCart(Request $request, Cart $cart)
    {
        $request->validate(['payment_type' => 'required|in:cash,visa']);
        $cart->update(['status' => 'new', 'payment' => $request->payment_type]);
        session()->forget('cart');
        return redirect()->route('user.cart', $cart->id)->with('success', __('Added Successfully'));
    }

    public function cities($id)
    {
        return response_json(true, City::whereAreaId($id)->get());
    }
}
