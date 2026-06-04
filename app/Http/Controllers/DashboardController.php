<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Controllo Amministratore
        if ($user->isAdmin()) {
            return view('dashboard.admin');
        }

        // 2. Controllo Trainer
        if ($user->isTrainer()) {
            return view('dashboard.trainer');
        }

        // 3. Default: Cliente/Customer
        return view('dashboard.customer');
    }
}
