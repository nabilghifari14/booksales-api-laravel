<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
                ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resource",
            "data" => $transactions
        ]);
    }
}
