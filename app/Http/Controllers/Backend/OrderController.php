<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $users=User::orderBy('id','desc')->get();
        
        $transactionHistory = TransactionHistory::orderBy('id', 'desc')->get()->load('user','property');
        return view('backend.order.index',compact('users','transactionHistory'));
    }

}
