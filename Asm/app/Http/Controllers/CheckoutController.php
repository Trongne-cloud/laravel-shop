<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Hiển thị form
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
        }
        return view('checkout');
    }

    // Xử lý đặt hàng
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
        }

        // Tính tổng tiền
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Tạo đơn hàng
        $order = Order::create([
            'customer_name' => $request->name,
            'customer_phone' => $request->phone,
            'customer_address' => $request->address,
            'total' => $total,
            'status' => 'pending',
        ]);

        // Tạo chi tiết đơn hàng
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Xóa giỏ hàng
        session()->forget('cart');

        // Chuyển đến trang cảm ơn
        return redirect()->route('thank.you')->with('success', 'Cảm ơn bạn đã đặt hàng!');
    }

    // Trang cảm ơn
    public function thankYou()
    {
        return view('thank-you');
    }
}