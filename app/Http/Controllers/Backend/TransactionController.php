<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        $transactionHistory = TransactionHistory::orderBy('id', 'desc')->get()->load('user','property');

        return view('backend.transaction.index',compact('transactionHistory'));

    }

}
