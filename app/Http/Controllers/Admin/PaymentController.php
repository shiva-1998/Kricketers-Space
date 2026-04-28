<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function index()
    {
        // Get all payments with player and tournament
        $payments = Payment::with(['player', 'tournament'])
            ->latest()
            ->paginate(10);

        return view('back.payments.index', compact('payments'));
    }
}
