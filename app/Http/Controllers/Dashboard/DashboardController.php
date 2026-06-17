<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\AdminDashboardService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(AdminDashboardService $adminDashboardService)
    {
        $user = Auth::user();

        // 1. Controllo Amministratore
        if ($user->isAdmin()) {

            $nextLessons = $adminDashboardService->getNextLessons();

            return view('dashboard.admin.admin', compact('nextLessons'));
        }

        // 2. Controllo Trainer
        if ($user->isTrainer()) {
            return view('dashboard.trainer.trainer');
        }

        // 3. Default: Cliente/Customer
        return view('dashboard.customer.customer');
    }
}
