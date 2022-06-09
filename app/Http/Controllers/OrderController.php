<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $page_title = "لیست فاکتور های ما";
        $orders = Order::orderBy('id' , 'DESC')->get();
        return view('orders' , compact('page_title' , 'orders'));
    }
}
