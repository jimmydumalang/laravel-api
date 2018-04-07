<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Resources\OrderCollection;

class OrderController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        $orders = Order::where('user_id', $user->id)->paginate();
        return (new OrderCollection($orders));
    }

    public function store(Request $request){
        return "created";
    }
}
