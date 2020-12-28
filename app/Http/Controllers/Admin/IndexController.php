<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class IndexController extends Controller
{
    public function index(){
        $orders = Order::all();

        return view('admin.index', ['orders' => $orders]);
    }
}
