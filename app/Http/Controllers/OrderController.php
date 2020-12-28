<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Tariff;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Route;

class OrderController extends Controller
{
    public function index(){
        $tariffs = new Tariff;
        $tomorrow = Carbon::tomorrow('Europe/Moscow')->format('Y-m-d');

        return view('welcome', [
            'tariffs' => $tariffs->all(),
            'tomorrow' => $tomorrow
        ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => ['required', 'numeric'],
            'tariff' => 'required',
            'day' => 'required',
            'address' => 'required'
        ]);

        $customer = \DB::table('customers')->where('number', $request->get('number'))->first();

        if ($customer == null)
        {
            $newCustomer = new Customer;
            $newCustomer->name = $request->get('name');
            $newCustomer->number = $request->get('number');
            $newCustomer->save();
        }

        $newOrder = new Order;
        $newOrder->customer_number = $request->get('number');
        $newOrder->tariff_id = $request->get('tariff');
        $newOrder->order_date = $request->get('day');
        $newOrder->address = $request->get('address');
        $newOrder->save();

        return back()->with('message', 'Ваша заявка принята');
    }
}
