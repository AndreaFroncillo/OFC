<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lesson\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 1. Controllo Amministratore
        if ($user->isAdmin()) {
            // La query deve recuperare: 
            // Le prossime 5 lezioni future della palestra che sono ancora programmate, ordinate dalla più vicina alla più lontana, caricando anche il trainer associato e le prenotazioni per mostrare il numero di partecipanti e lo stato di occupazione della lezione.

            $nextLessons = Lesson::query();
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
