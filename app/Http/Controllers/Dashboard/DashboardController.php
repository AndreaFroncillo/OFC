<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Controllo Amministratore
        if ($user->isAdmin()) {
            return view('dashboard.admin.admin');
        }

        // 2. Controllo Trainer
        if ($user->isTrainer()) {
            return view('dashboard.trainer.trainer');
        }

        // 3. Default: Cliente/Customer
        return view('dashboard.customer.customer');
    }
}
