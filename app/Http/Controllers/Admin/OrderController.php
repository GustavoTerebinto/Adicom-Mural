<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Service;
use App\Models\User;

class OrderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.orders');
    }

    public function destroy($id)
    {
        $pedido = Order::findOrFail($id);
        $pedido->delete();

        return redirect()->route('admin.orders');
    }
}