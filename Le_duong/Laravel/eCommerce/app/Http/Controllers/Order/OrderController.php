<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
class OrderController extends Controller
{
    public function index()
    {
        $userPurchases = Customers::all();
        return view('pages.manageOrder.order_index',[
          'userPurchases' => $userPurchases
        ]);
    }
}
